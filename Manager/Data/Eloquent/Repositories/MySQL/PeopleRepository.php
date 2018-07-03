<?php declare(strict_types = 1);

namespace Manager\Data\Eloquent\Repositories\MySQL;
use Manager\Data\Eloquent\Models\MobileUser;
use Manager\Domain\Boundary\Repositories\PeopleRepositoryInterface;
use Manager\Domain\Entities\User;
use Mockery\Exception;

class PeopleRepository implements PeopleRepositoryInterface
{
    /**
     * @var user
     */
    public $userM;

    /**
     * @var MobileUser
     */
    private $mobileUser;

    /**
     * PeopleRepository constructor.
     *
     * @param MobileUser $mobileUser
     */
    public function __construct(MobileUser $mobileUser)
    {

        $this->mobileUser = $mobileUser;
    }


    /**
     * @param array $credentials
     * @return User
     * @throws \Exception
     */
    public function getUser(array $credentials) : User
    {
        $email = trim($credentials['email']);

        try{
            $request = $this->mobileUser->where("email","=",$email)
                ->where("status","=", "A")
                ->first();

        }catch (\Exception $e){

            throw $e;
        }

        return $this->mapPeopleToUser($request);
    }


    /**
     * @param $request
     * @return User
     */
    private function mapPeopleToUser($request) : User
    {

        $user = new User();

        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        //$user->role = $request->user_type

        return $user;
    }


    /**
     * @param $data
     * @param null $id
     * @return array|User
     */
    public function insertPeople($data,$id = null)
    {
        app('db')->beginTransaction();

        if($id != ''){
            $userM = $this->mobileUser->find($id);
        }else{
            $userM = new MobileUser();
        }
        try{
            $userM->name = $data['name'];
            $userM->phone = $data['phone'];
            $userM->dob = $data['dob'];
            $userM->email = $data['email'];
            $userM->password =  md5($data['password']);
            $userM->image = $data['image'];
            $userM->status = $data['status'];
            $userM->view_status = $data['viewStatus'];

            $userM->save();

            app('db')->commit();

            return ['status' => 'success',
                'code' => '200'
            ];
        }catch (Exception $exception){

            app('db')->rollback();

            return ['error' => $exception->getMessage(),
                'code' => '200'];
        }
    }
}
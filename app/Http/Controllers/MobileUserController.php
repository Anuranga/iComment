<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/6/2018
 * Time: 10:17 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Pickme\Lib\RestHandler\RestHandler;
use Manager\Domain\UseCases\Authenticator\Authenticator;
use Manager\Domain\Boundary\Repositories\PeopleRepositoryInterface;
use Manager\Domain\Boundary\Globals\Session;

class MobileUserController extends Controller
{
    /**
     * @var PeopleRepositoryInterface
     */
    private $peopleRepository;

    /**
     * MobileUserController constructor.
     * @param Authenticator $auth
     * @param RestHandler $restHandler
     * @param PeopleRepositoryInterface $peopleRepository
     */
    public function __construct(Authenticator $auth,
                                RestHandler $restHandler,
                                PeopleRepositoryInterface $peopleRepository,
                                Session $session
    )
    {
        $this->auth = $auth;
        $this->restHandler = $restHandler;
        $this->peopleRepository = $peopleRepository;
        $this->session = $session;
    }

    public function insertMobileUser(Request $request, $id = null)
    {
        $data = $request->all();

        $validationRules = [
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required',
            'status' => 'required',
            'viewStatus' => 'required',
        ];

        $this->validate($request, $validationRules);

        return $this->peopleRepository->insertPeople($data, $id);
    }


    public function insertUserComment(Request $request, $id)
    {
        $data = $request->all();
        $id = $this->session->getUserId();

        $validationRules = [
            'lat' => 'required',
            'lon' => 'required|numeric'
        ];
        $this->validate($request, $validationRules);

        return $this->peopleRepository->insertUserComment($data, $id);
    }

    public function getUserComment($lat, $lon)
    {
        return $this->peopleRepository->getUserComment($lat, $lon);
    }
}
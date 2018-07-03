<?php declare(strict_types = 1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Pickme\Lib\RestHandler\RestHandler;
use Manager\Domain\UseCases\Authenticator\Authenticator;

class AuthController extends Controller
{
    /**
     * @var Authenticator
     */
    private $auth;

    /**
     * @var RestHandler
     */
    private $restHandler;


    /**
     * AuthController constructor.
     *
     * @param Authenticator $auth
     * @param RestHandler $restHandler
     */
    public function __construct(Authenticator $auth,
                                RestHandler $restHandler
    )
    {
        $this->auth = $auth;
        $this->restHandler = $restHandler;
    }


    /**
     * Authenticate and generate a session token.
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request) : Response
    {
        // basic validation
        $validationRules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $this->validate($request, $validationRules);

        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        return $this->restHandler->toItem([
            'token' => $this->auth->login($credentials)
        ])->toJson(Response::HTTP_OK);
    }


    /**
     * Logout and invalidate the token.
     *
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request) : Response
    {
        $this->auth->logout();

        return $this->restHandler->toJson(Response::HTTP_NO_CONTENT);
    }


    /**
     * @param Request $request
     * @return Response
     * @throws \Pickme\Lib\RestHandler\Exception\RestHandlerException
     */
    public function refresh(Request $request) : Response
    {
        // basic validation
        $validationRules = [
            'device' => 'required|string',
        ];

        $this->validate($request, $validationRules);

        $token = $request->bearerToken();
        $credentials = $request->only('device');

        return $this->restHandler->toItem([
            'token' => $this->auth->refreshToken($token, $credentials)
        ])->toJson(Response::HTTP_OK);
    }
}
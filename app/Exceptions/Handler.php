<?php declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Pickme\Lib\Exceptions\DomainException;
use Pickme\Lib\RestHandler\RestHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * @var RestHandler
     */
    private $restHandler;


    /**
     * Handler constructor.
     *
     * @param RestHandler $restHandler
     */
    public function __construct(RestHandler $restHandler)
    {
        $this->restHandler = $restHandler;
    }


    /**
     * Report or log an exception.
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e) : void
    {
        parent::report($e);
    }


    /**
     * Render exception.
     *
     * @param Request $request
     * @param Exception $e
     * @return Response
     */
    public function render($request, Exception $e) : Response
    {
        $ren = new \Pickme\Lib\Exceptions\ExceptionHandler();

        if ($e instanceof DomainException)
        {
            return $this->restHandler->toCollection($ren->render($e), 'errors')->toJson(Response::HTTP_BAD_REQUEST);
        }

        if($e instanceof ValidationException)
        {
            $messages = (array)$e->validator->getMessageBag()->jsonSerialize();

            return $this->restHandler->withErrors($messages)->toJson(Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->restHandler->toCollection($ren->render($e), 'errors')->toJson(
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}

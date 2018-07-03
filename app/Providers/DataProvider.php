<?php declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            \Manager\Domain\Boundary\Repositories\AuthTokenRepositoryInterface::class,
            \Manager\Data\Eloquent\Repositories\MySQL\AuthTokenRepository::class
        );

        $this->app->bind(
            \Manager\Domain\Boundary\Repositories\PeopleRepositoryInterface::class,
            \Manager\Data\Eloquent\Repositories\MySQL\PeopleRepository::class
        );

    }

}
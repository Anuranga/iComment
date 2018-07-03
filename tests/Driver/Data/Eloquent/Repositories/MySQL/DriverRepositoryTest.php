<?php declare(strict_types = 1);

namespace Tests\Driver\Data\Eloquent\Repositories\MySQL;

use Tests\DataTestCase;

use Driver\Domain\Entities\Driver;
use Driver\Domain\Repositories\DriverRepository as DriverRepositoryInterface;
use Driver\Data\Eloquent\Repositories\MySQL\DriverRepository;
use Driver\Data\Eloquent\Models\People;

class DriverRepositoryTest extends DataTestCase
{
    public function testIsOfTypeDriverRepository()
    {
        $repository = app(DriverRepository::class);

        $this->assertTrue($repository instanceof DriverRepositoryInterface);
    }

    public function testGetDriverWillReturnNullWhenDriverNotExists()
    {
        $model = app(People::class);
        $repository = app(DriverRepository::class);

        $model->truncate();

        $driver = $repository->getDriver([
            'phone' => 123456789,
            'password' => "test"
        ]);

        $this->assertTrue(is_null($driver));
    }

    public function testGetDriverWillReturnDriverWhenDriverExists()
    {
        $model = app(People::class);
        $repository = app(DriverRepository::class);

        $model->truncate();

        $model->create([
            'name' => "Testuser",
            'email' => "test@pickme.lk",
            'password' => "",
            'status' => 'A',
            'phone' => 123456789,
            'org_password' => "test",
            'user_type' => 'D',
            'hashed_password' => "",
            'password_hashed_bc' => '$2y$10$ZYYNzmKMy35Ly7qUabNI.uDU4QxehS0KCWs3/9meJArXvUZX0ZqcO'
        ]);

        $driver = $repository->getDriver([
            'phone' => 123456789,
            'password' => "test"
        ]);

        $this->assertTrue($driver instanceof Driver);
    }
}
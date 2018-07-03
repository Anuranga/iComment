<?php declare(strict_types = 1);

namespace Tests\Driver\Data\Eloquent\Repositories\MySQL;

use Tests\DataTestCase;

use Driver\Domain\Entities\Heartbeat;
use Driver\Domain\Repositories\HeartbeatRepository as HeartbeatRepositoryInterface;
use Driver\Data\Eloquent\Repositories\MySQL\HeartbeatRepository;
use Driver\Data\Eloquent\Models\Driver;

class HeartbeatRepositoryTest extends DataTestCase
{
    public function testIsOfTypeHeartbeatRepository()
    {
        $repository = app(HeartbeatRepository::class);

        $this->assertTrue($repository instanceof HeartbeatRepositoryInterface);
    }

    public function testGetHeartbeatByDriverIdWillReturnHeartbeat()
    {
        $model = app(Driver::class);
        $repository = app(HeartbeatRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => 0001,
            'latitude' => 0.0,
            'longitude' => 0.0,
            'status' =>  Heartbeat::DRIVER_STATUS_FREE,
            'shift_status' => Heartbeat::SHIFT_STATUS_IN,
            'travel_status' => Heartbeat::TRIP_STATUS_NOT_COMPLETE,
            'login_status' => Heartbeat::DRIVER_LOGIN_STATUS_YES,
            'directional_hire_enable' => Heartbeat::DIRECTIONAL_HIRE_DISABLE,
            'current_trip' => null,
            'trip_assigned_at' => null
            ]);

        $heartbeat = $repository->getByDriverId(0001);

        $this->assertTrue($heartbeat instanceof Heartbeat);

        $model->truncate();
    }

    public function testSetAsActiveActivatesHeartbeat()
    {
        $model = app(Driver::class);
        $repository = app(HeartbeatRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => 1000,
            'latitude' => 0.0,
            'longitude' => 0.0,
            'status' =>  Heartbeat::DRIVER_STATUS_ACTIVE,
            'shift_status' => Heartbeat::SHIFT_STATUS_OUT,
            'travel_status' => Heartbeat::TRIP_STATUS_CONFIRMED,
            'login_status' => Heartbeat::DRIVER_LOGIN_STATUS_NO,
            'directional_hire_enable' => Heartbeat::DIRECTIONAL_HIRE_DISABLE,
            'current_trip' => 2000,
            'trip_assigned_at' => '2017-01-01'
        ]);

        $repository->setAsActive(1000);

        $heartbeat = $model->where('driver_id', '=', 1000)->first();

        $this->assertTrue($heartbeat->status === Heartbeat::DRIVER_STATUS_FREE);
        $this->assertTrue($heartbeat->login_status === Heartbeat::DRIVER_LOGIN_STATUS_YES);
        $this->assertTrue($heartbeat->shift_status === Heartbeat::SHIFT_STATUS_IN);
        $this->assertTrue($heartbeat->travel_status === Heartbeat::TRIP_STATUS_NOT_COMPLETE);
        $this->assertTrue($heartbeat->current_trip === null);
        $this->assertTrue($heartbeat->trip_assigned_at === null);

        $model->truncate();
    }

    public function testSetAsIdleDeactivatesHeartbeat()
    {
        $model = app(Driver::class);
        $repository = app(HeartbeatRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => 1000,
            'latitude' => 0.0,
            'longitude' => 0.0,
            'status' =>  Heartbeat::DRIVER_STATUS_ACTIVE,
            'shift_status' => Heartbeat::SHIFT_STATUS_IN,
            'travel_status' => Heartbeat::TRIP_STATUS_CONFIRMED,
            'login_status' => Heartbeat::DRIVER_LOGIN_STATUS_YES,
            'directional_hire_enable' => Heartbeat::DIRECTIONAL_HIRE_DISABLE,
            'current_trip' => 2000,
            'trip_assigned_at' => '2017-01-01'
        ]);

        $repository->setAsIdle(1000);

        $heartbeat = $model->where('driver_id', '=', 1000)->first();

        $this->assertTrue($heartbeat->login_status === Heartbeat::DRIVER_LOGIN_STATUS_NO);
        $this->assertTrue($heartbeat->shift_status === Heartbeat::SHIFT_STATUS_OUT);

        $model->truncate();
    }

    public function testSetShiftStatusWillChangeOutToIn()
    {
        $model = app(Driver::class);
        $repository = app(HeartbeatRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => 1000,
            'latitude' => 0.0,
            'longitude' => 0.0,
            'shift_status' => Heartbeat::SHIFT_STATUS_OUT,
            'current_trip' => null,
            'trip_assigned_at' => null
        ]);

        $repository->setShiftStatus(1000, Heartbeat::SHIFT_STATUS_IN);

        $heartbeat = $model->where('driver_id', '=', 1000)->first();

        $this->assertTrue($heartbeat->shift_status === Heartbeat::SHIFT_STATUS_IN);

        $model->truncate();
    }

    public function testSetShiftStatusWillChangeInToOut()
    {
        $model = app(Driver::class);
        $repository = app(HeartbeatRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => 1000,
            'latitude' => 0.0,
            'longitude' => 0.0,
            'shift_status' => Heartbeat::SHIFT_STATUS_IN,
            'current_trip' => null,
            'trip_assigned_at' => null
        ]);

        $repository->setShiftStatus(1000, Heartbeat::SHIFT_STATUS_OUT);

        $heartbeat = $model->where('driver_id', '=', 1000)->first();

        $this->assertTrue($heartbeat->shift_status === Heartbeat::SHIFT_STATUS_OUT);

        $model->truncate();
    }

    public function testSetTripStatusWillChangeTripStatus()
    {
        $model = app(Driver::class);
        $repository = app(HeartbeatRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => 1000,
            'latitude' => 0.0,
            'longitude' => 0.0,
            'travel_status' => Heartbeat::TRIP_STATUS_NOT_COMPLETE,
            'current_trip' => null,
            'trip_assigned_at' => null
        ]);

        $repository->setTripStatus(1000, Heartbeat::TRIP_STATUS_IN_PROGRESS);

        $heartbeat = $model->where('driver_id', '=', 1000)->first();

        $this->assertTrue($heartbeat->travel_status === Heartbeat::TRIP_STATUS_IN_PROGRESS);

        $model->truncate();
    }
}
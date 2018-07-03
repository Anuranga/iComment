<?php declare(strict_types = 1);

namespace Tests\Domain\UseCases\Authenticator;

use Tests\TestCase;

use Driver\Domain\UseCases\Authenticator\Authenticator;
use Driver\Domain\Boundary\Globals\Session;
use Driver\Domain\Entities\Driver;
use Driver\Domain\Entities\Heartbeat;
use Driver\Domain\Boundary\Adapters\TokenAdapter;
use Driver\Domain\Boundary\Adapters\HashAdapter;
use Driver\Domain\Repositories\AuthTokenRepository;
use Driver\Domain\Repositories\DriverRepository;
use Driver\Domain\Repositories\HeartbeatRepository;

class AuthenticatorTest extends TestCase
{
    public function testLoginWithValidCredentialsWillGiveToken()
    {
        $tokenAdapter = $this->getMockBuilder(TokenAdapter::class)->getMock();

        $tokenAdapter->method('createToken')
                     ->willReturn("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJkcml2ZXJfYXBpX3YyIiwic3ViIjoxMCwianRpIjoiMTAxNTEwMDM2MjQxIiwiaWF0IjoxNTEwMDM2MjQxLCJleHAiOjE1MTAxMjI2NDEsImRhdGEiOnsib25lIjoxfX0.xNvgkeq-sOpPa9ezDt9p2N5ABhvmK-zAQqXY4USMlBI");

        $tokenAdapter->method('decodeToken')
                     ->willReturn([
                          'iss' => "driver_api_v2",
                          'sub' => 10,
                          'jti' => "101510036241",
                          'iat' => 1510036241,
                          'exp' => 1510122641,
                          'data' => [
                              'one' => 1
                          ]
                     ]);

        $hashAdapter = $this->getMockBuilder(HashAdapter::class)->getMock();
        $hashAdapter->method('verify')
                    ->willReturn(true);

        $session = $this->getMockBuilder(Session::class)->getMock();

        $authTokenRepository = $this->getMockBuilder(AuthTokenRepository::class)->getMock();

        $driver = $this->createDriverEntity();
        $driverRepository = $this->getMockBuilder(DriverRepository::class)->getMock();
        $driverRepository->method('getDriver')
                         ->willReturn($driver);

        $heartbeat = $this->createHeartbeatEntity($driver);
        $heartbeatRepository = $this->getMockBuilder(HeartbeatRepository::class)->getMock();
        $heartbeatRepository->method('getByDriverId')
                            ->willReturn($heartbeat);

        $auth = new Authenticator($tokenAdapter,
                                  $hashAdapter,
                                  $session,
                                  $authTokenRepository,
                                  $driverRepository,
                                  $heartbeatRepository
        );

        $credentials = [
            "phone" => 000000000,
            "password" => ""
        ];

        $token = $auth->login($credentials);

        $this->assertTrue(is_string($token));
    }


// _____________________________________________________________________________________________________________ Private

    private function createDriverEntity()
    {
        $driver = new Driver();

        $driver->id = 10;
        $driver->phoneNumber = 000000000;
        $driver->salutation = "Mr";
        $driver->firstName = "Firstname";
        $driver->lastName = "Lastname";
        $driver->gender = Driver::GENDER_MALE;
        $driver->email = "testdriver@pickme.lk";
        $driver->deviceId = 0000000;
        $driver->password = '$2y$10$ZYYNzmKMy35Ly7qUabNI.uDU4QxehS0KCWs3/9meJArXvUZX0ZqcO';
        $driver->createdTime = "2017-01-01";
        $driver->updatedTime = date('Y-m-d H:i:s');
        $driver->lastLoginTime = date('Y-m-d H:i:s');
        $driver->status = Driver::STATUS_ACTIVE;

        return $driver;
    }


    private function createHeartbeatEntity($driver)
    {
        $heartbeat = new Heartbeat();

        $heartbeat->driverId = $driver->id;
        $heartbeat->driverCurrentStatus = $driver->status;
        $heartbeat->driverProfileStatus->setProfileStatus("111111");
        $heartbeat->driverLocation->setLocation("", 79.8904, 6.85998);
        $heartbeat->shiftStatus = Heartbeat::SHIFT_STATUS_OUT;
        $heartbeat->shiftStartTime = date('Y-m-d H:i:s');
        $heartbeat->tripId = null;
        $heartbeat->tripStatus = Heartbeat::TRIP_STATUS_NOT_COMPLETE;
        $heartbeat->tripAssignedTime = null;
        $heartbeat->vehicleModel = 1;
        $heartbeat->vehicleBearing = 0;
        $heartbeat->loginStatus = Heartbeat::DRIVER_LOGIN_STATUS_NO;
        $heartbeat->directionalHireStatus = Heartbeat::DIRECTIONAL_HIRE_DISABLE;
        $heartbeat->updateTime = date('Y-m-d H:i:s');

        return $heartbeat;
    }
}
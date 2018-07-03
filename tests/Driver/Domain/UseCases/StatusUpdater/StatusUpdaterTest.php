<?php declare(strict_types = 1);

namespace Tests\Domain\UseCases\StatusUpdater;

use Tests\TestCase;

use Driver\Domain\UseCases\ShiftStatusUpdater\ShiftStatusUpdater;
use Driver\Domain\UseCases\ShiftStatusUpdater\ShiftStatusUpdaterException;
use Driver\Domain\UseCases\DriverValidator\DriverValidator;
use Driver\Domain\UseCases\DriverValidator\DriverValidatorException;
use Driver\Domain\Boundary\Globals\Session;
use Driver\Domain\Repositories\HeartbeatRepository;

class StatusUpdaterTest extends TestCase
{
    public function testShiftInFailsForADifferentDriver()
    {
        $session = $this->getMockBuilder(Session::class)->getMock();
        $session->method('getUserId')
                ->willReturn(10);

        $driverValidator = new DriverValidator($session);

        $heartbeatRepository = $this->getMockBuilder(HeartbeatRepository::class)->getMock();

        $statusUpdater = new ShiftStatusUpdater($driverValidator,
                                           $heartbeatRepository
        );

        $error = null;

        try
        {
            $statusUpdater->setShiftIn(100);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof DriverValidatorException);
        $this->assertEquals(40001, $error->getCode());

    }

    public function testShiftOutFailsForADifferentDriver()
    {
        $session = $this->getMockBuilder(Session::class)->getMock();
        $session->method('getUserId')
            ->willReturn(10);

        $driverValidator = new DriverValidator($session);

        $heartbeatRepository = $this->getMockBuilder(HeartbeatRepository::class)->getMock();

        $statusUpdater = new ShiftStatusUpdater($driverValidator,
                                           $heartbeatRepository
        );

        $error = null;

        try
        {
            $statusUpdater->setShiftOut(100);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof DriverValidatorException);
        $this->assertEquals(40001, $error->getCode());

    }
}
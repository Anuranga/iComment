<?php declare(strict_types = 1);

namespace Tests\Domain\UseCases\DriverValidator;

use Tests\TestCase;

use Driver\Domain\UseCases\DriverValidator\DriverValidator;
use Driver\Domain\UseCases\DriverValidator\DriverValidatorException;
use Driver\Domain\Boundary\Globals\Session;

class DriverValidatorTest extends TestCase
{
    public function testValidationFailsForADifferentDriver()
    {
        $session = $this->getMockBuilder(Session::class)->getMock();
        $session->method('getUserId')
            ->willReturn(10);

        $driverValidator = new DriverValidator($session);

        $error = null;

        try
        {
            $driverValidator->validate(100);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof DriverValidatorException);
        $this->assertEquals(40001, $error->getCode());

    }

    public function testValidationPassesForTheSameDriver()
    {
        $session = $this->getMockBuilder(Session::class)->getMock();
        $session->method('getUserId')
            ->willReturn(10);

        $driverValidator = new DriverValidator($session);

        $error = null;

        try
        {
            $driverValidator->validate(10);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(is_null($error));
    }

}
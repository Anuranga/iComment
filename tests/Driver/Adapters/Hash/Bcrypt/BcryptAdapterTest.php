<?php declare(strict_types = 1);

namespace Tests\Driver\Adapters\Hash\Bcrypt;

use Tests\TestCase;

use Driver\Adapters\Hash\Bcrypt\BcryptAdapter;
use Driver\Adapters\Hash\Bcrypt\BcryptAdapterException;
use Driver\Domain\Boundary\Adapters\HashAdapter;

class BcryptAdapterTest extends TestCase
{
    private $configDefault = [
        'cost' => null
    ];

    private $configCustom = [
        'cost' => 10
    ];


    public function testIsOfTypeHashAdapterForDefaultConfig()
    {
        $adapter = new BcryptAdapter($this->configDefault);

        $this->assertTrue($adapter instanceof HashAdapter);
    }

    public function testIsOfTypeHashAdapterForCustomConfig()
    {
        $adapter = new BcryptAdapter($this->configCustom);

        $this->assertTrue($adapter instanceof HashAdapter);
    }

    public function testInvalidConfigWillThrowError()
    {
        $invalidConfig = [
            'cost' => 'invalid'
        ];

        $error = null;

        try
        {
            $adapter = new BcryptAdapter($invalidConfig);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof BcryptAdapterException);
        $this->assertEquals(2001, $error->getCode());
    }

    public function testHashWillReturnString()
    {
        $adapter = new BcryptAdapter($this->configDefault);

        $hash = $adapter->hash("teststring");

        $this->assertTrue(is_string($hash));
        $this->assertNotEmpty($hash);
    }

    public function testVerifyHashWithOriginalString()
    {
        $adapter = new BcryptAdapter($this->configDefault);

        $testString = "teststring";
        $hash = $adapter->hash($testString);

        $this->assertTrue($adapter->verify($testString, $hash));
    }

}

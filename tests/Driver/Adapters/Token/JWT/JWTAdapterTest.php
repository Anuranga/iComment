<?php declare(strict_types = 1);

namespace Tests\Driver\Adapters\Token\JWT;

use Tests\TestCase;

use Driver\Adapters\Token\JWT\JWTAdapter;
use Driver\Adapters\Token\JWT\JWTAdapterException;
use Driver\Adapters\DateTime\Generic\GenericDateTimeAdapter as DateTimeAdapter;
use Driver\Domain\Boundary\Adapters\TokenAdapter;

class JWTAdapterTest extends TestCase
{
    private $config = [
        'token_secret_key' => 'secretkey',
        'app_name' => 'app_name',
        'token_lifespan' => 86500
    ];

    private $dateTimeConfig = [
        'time_zone' => 'Asia/Colombo'
    ];


    public function testIsOfTypeTokenAdapter()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $this->assertTrue($adapter instanceof TokenAdapter);
    }

    public function testProperConfigValuesNotGiven()
    {
        $error = null;

        try
        {
            $adapter = new JWTAdapter([],
                                      new DateTimeAdapter($this->dateTimeConfig));
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof JWTAdapterException);
        $this->assertEquals(1004, $error->getCode());
    }

    public function testTokenLifetimeValueSetAsZero()
    {
        $config = $this->config;

        $config['token_lifespan'] = 0;

        $error = null;

        try
        {
            $adapter = new JWTAdapter($config,
                                      new DateTimeAdapter($this->dateTimeConfig));
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof JWTAdapterException);
        $this->assertEquals(1003, $error->getCode());
    }

    public function testTokenLifetimeValueSetAsNegative()
    {
        $config = $this->config;

        $config['token_lifespan'] = -10;

        $error = null;

        try
        {
            $adapter = new JWTAdapter($config,
                                      new DateTimeAdapter($this->dateTimeConfig));
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof JWTAdapterException);
        $this->assertEquals(1003, $error->getCode());
    }

    public function testValidTokenCreated()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $token = $adapter->createToken(1);

        $this->assertTrue(is_string($token));
        $this->assertTrue(!empty($token));

        $error = null;

        try
        {
            $tokenData = $adapter->decodeToken($token);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(is_string($token));
        $this->assertTrue(is_null($error));
    }

    public function testValidTokenDecoded()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $givenPayload = [
            'one' => 1,
            'two' => 2,
            'three' => 3
        ];

        $token = $adapter->createToken(1, $givenPayload);
        $tokenData = null;
        $error = null;

        try
        {
            $tokenData = $adapter->decodeToken($token);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(is_null($error));
        $this->assertTrue(is_array($tokenData));
    }

    public function testInvalidTokenDecoded()
    {
        $token = 'vfnjkbnbxcjkvnkxcvkzhZhixxc.hcxkcnxcjnxkcjkxcjkvxcjkvhxcvj.jxcvhxjkvvguvjk';

        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));
        $error = null;

        try
        {
            $tokenData = $adapter->decodeToken($token);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof JWTAdapterException);
        $this->assertEquals(1002, $error->getCode());
    }

    public function testEmptyTokenDecoded()
    {
        $token = '';

        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));
        $error = null;

        try
        {
            $tokenData = $adapter->decodeToken($token);
        }
        catch(\Exception $e)
        {
            $error = $e;
        }

        $this->assertTrue(!is_null($error));
        $this->assertTrue($error instanceof JWTAdapterException);
        $this->assertEquals(1001, $error->getCode());
    }

    public function testGetPayloadOfTokenWhenThereIsAPayload()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $givenPayload = [
            'one' => 1,
            'two' => 2,
            'three' => 3
        ];

        $token = $adapter->createToken(1, $givenPayload);

        $retrievedPayload = $adapter->getTokenPayload($token);

        $this->assertTrue(is_array($retrievedPayload));
        $this->assertTrue(!empty($retrievedPayload));
        $this->assertEquals($givenPayload, $retrievedPayload);
    }

    public function testGetPayloadOfTokenWhenThereIsNoPayload()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $givenPayload = [];

        $token = $adapter->createToken(1, $givenPayload);

        $retrievedPayload = $adapter->getTokenPayload($token);

        $this->assertTrue(is_array($retrievedPayload));
        $this->assertTrue(empty($retrievedPayload));
    }

    public function testWhetherTokenIdExists()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $givenPayload = [];

        $token = $adapter->createToken(1, $givenPayload);

        $tokenData = $adapter->decodeToken($token);

        $this->assertTrue(isset($tokenData['jti']));
        $this->assertTrue(!empty($tokenData['jti']));
    }

    public function testGetUserIdOfToken()
    {
        $adapter = new JWTAdapter($this->config,
                                  new DateTimeAdapter($this->dateTimeConfig));

        $givenPayload = [];

        $token = $adapter->createToken(1, $givenPayload);

        $userId = $adapter->getUserId($token);

        $this->assertEquals(1,$userId);
    }
}

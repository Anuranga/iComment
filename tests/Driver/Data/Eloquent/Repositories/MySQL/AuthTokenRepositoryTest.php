<?php declare(strict_types = 1);

namespace Tests\Driver\Data\Eloquent\Repositories\MySQL;

use Tests\DataTestCase;

use Driver\Domain\Repositories\AuthTokenRepository as AuthTokenRepositoryInterface;
use Driver\Data\Eloquent\Repositories\MySQL\AuthTokenRepository;
use Driver\Data\Eloquent\Models\AuthToken;

class AuthTokenRepositoryTest extends DataTestCase
{
    public function testIsOfTypeAuthTokenRepository()
    {
        $repository = app(AuthTokenRepository::class);

        $this->assertTrue($repository instanceof AuthTokenRepositoryInterface);
    }

    public function testSaveAToken()
    {
        $id = 0;
        $tokenId = "0000000";
        $token = 'testsavetoken';

        $model = app(AuthToken::class);
        $repository = app(AuthTokenRepository::class);

        $model->truncate();

        $repository->saveToken($id, $tokenId, $token);

        $tokenRecord = $model->where('driver_id', '=', $id)->get()->first();

        $this->assertTrue($tokenRecord instanceof AuthToken);

        $this->assertEquals(
            [$id, $tokenId, $token],
            [$tokenRecord->driver_id, $tokenRecord->token_id, $tokenRecord->token]
        );
    }

    public function testDeleteAToken()
    {
        $id = 0;
        $tokenId = "0000000";
        $token = 'testdeletetoken';

        $model = app(AuthToken::class);
        $repository = app(AuthTokenRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => $id,
            'token_id' => $tokenId,
            'token' => $token
        ]);

        $repository->deleteToken($id, $tokenId);

        $tokenRecord = $model->where('driver_id', '=', $id)->get()->first();

        $this->assertTrue(is_null($tokenRecord));
    }

    public function testIsTokenExists()
    {
        $id = 0;
        $tokenId = "0000000";
        $token = 'testtokenexists';

        $model = app(AuthToken::class);
        $repository = app(AuthTokenRepository::class);

        $model->truncate();

        $model->create([
            'driver_id' => $id,
            'token_id' => $tokenId,
            'token' => $token
        ]);

        $tokenRecord = $model->where('driver_id', '=', $id)
                             ->where('token_id', '=', $tokenId)
                             ->get()->first();

        $this->assertEquals(!is_null($tokenRecord), $repository->isTokenExists($id, $tokenId));

        $tokenRecord->delete();

        $this->assertFalse($repository->isTokenExists($id, $tokenId));
    }
}
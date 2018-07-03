<?php declare(strict_types = 1);

namespace Manager\Data\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class AuthToken extends Model
{
    const TABLE = 'user_auth_token';
    const UPDATED_AT = null;

    protected $table = self::TABLE;
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'token_id',
        'token',
        'created_at'
    ];

}
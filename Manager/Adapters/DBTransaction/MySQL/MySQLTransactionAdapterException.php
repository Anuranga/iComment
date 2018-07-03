<?php declare(strict_types = 1);

namespace Manager\Adapters\DBTransaction\MySQL;

use Manager\Domain\Exceptions\AdapterException;

class MySQLTransactionAdapterException extends AdapterException
{
    const ERR_PREFIX = parent::ERR_PREFIX_DB_TRANS;

    public static function unknown($previous = null)
    {
        throw new MySQLTransactionAdapterException('unknown', self::ERR_PREFIX + 1, $previous);
    }

}
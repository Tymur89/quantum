<?php declare(strict_types=1);

namespace App\Constants;

class StorageTypes
{
    public const DATABASE = 'database';
    public const FILE = 'file';

    public const LIST = [
        self::DATABASE,
        self::FILE,
    ];
}

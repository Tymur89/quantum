<?php declare(strict_types=1);

namespace App\Services;

use App\Constants\StorageTypes;
use App\Contracts\StorageInterface;

class StorageFactory
{
    public static function create($type): StorageInterface
    {
        switch ($type) {
            case StorageTypes::DATABASE:
                return new DatabaseStorage();
            case StorageTypes::FILE:
                return new FileStorage();
            default:
                throw new \InvalidArgumentException("Unsupported storage type: {$type}");
        }
    }
}

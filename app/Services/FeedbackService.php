<?php declare(strict_types=1);

namespace App\Services;

use App\Constants\StorageTypes;

class FeedbackService
{
    public function processFeedback($request): void
    {
        $storageType = $request->input('storage_type', StorageTypes::DATABASE);

        $storage = StorageFactory::create($storageType);

        $storage->save($request->only(['name', 'phone', 'message']));
    }
}

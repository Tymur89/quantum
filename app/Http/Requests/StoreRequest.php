<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Constants\StorageTypes;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string',
            'storage_type' => [
                'nullable',
                Rule::in(StorageTypes::LIST)
            ],
        ];
    }
}

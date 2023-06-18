<?php

namespace App\Http\Requests\Api;

class StarUpdateRequest extends StarBaseRequest
{
    public function rules(): array
    {
        return [
            ...parent::rules(),
            'image' => ['nullable', 'file'],
        ];
    }
}

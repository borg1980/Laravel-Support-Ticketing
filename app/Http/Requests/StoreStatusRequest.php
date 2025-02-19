<?php

namespace App\Http\Requests;

use App\Models\Status;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}

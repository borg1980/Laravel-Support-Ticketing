<?php

namespace App\Http\Requests;

use App\Models\Priority;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePriorityRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('priority_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

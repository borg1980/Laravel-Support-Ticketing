<?php

namespace App\Http\Requests;

use App\Models\Priority;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPriorityRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('priority_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:priorities,id',
        ];
    }
}

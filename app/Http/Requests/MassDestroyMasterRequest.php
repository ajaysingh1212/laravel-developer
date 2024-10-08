<?php

namespace App\Http\Requests;

use App\Models\Master;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMasterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('master_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:masters,id',
        ];
    }
}

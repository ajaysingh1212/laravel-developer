<?php

namespace App\Http\Requests;

use App\Models\Websetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWebsettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('websetting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:websettings,id',
        ];
    }
}

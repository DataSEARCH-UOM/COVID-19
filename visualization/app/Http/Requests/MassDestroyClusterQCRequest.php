<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyClusterQCRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abort_if(Gate::denies('cluster_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cluster_q_c_s,id',
        ];
    }
}

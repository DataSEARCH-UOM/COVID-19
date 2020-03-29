<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClusterQCRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('cluster_create');
    }

    public function rules()
    {
        return [
            'cluster_name' => [
                'required',
            ],
            'lat' => [
                'required',
            ],
            'long' => [
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Gate::allows('patient_create');
    }

    public function rules()
    {
        return [
//            'hospital' => [
//                'required',
//            ],
//            'state' =>[
//                'required'
//            ],
        ];
    }
}

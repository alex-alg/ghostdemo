<?php

namespace App\Http\Requests\Feature;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeature extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'feature.name'               => 'required',
            'feature.price'              => 'required|numeric',
        ];
    }
}

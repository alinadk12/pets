<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestForPuppy extends FormRequest
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
            'breed_id' => 'required',
            'gender' => 'required',
            'age_month' => 'numeric',
            'max_price' => 'numeric',
            'comments' => 'string|max:2000000',
        ];
    }
}

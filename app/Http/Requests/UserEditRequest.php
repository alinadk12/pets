<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'surname' => 'required|max:45:string',
            'name' => 'required|max:45:string',
            'patronymic' => 'max:45:string',
            'phone_number' => 'required|numeric',
            'picture' => 'image',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DogRequest extends FormRequest
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
            'name_ru' => 'required|string|max:30',
            'name_en' => 'required|string|max:30',
            'color_ru' => 'required|string|max:45',
            'color_en' => 'required|string|max:45',
            'description_ru' => 'required|string|max:65000,',
            'description_en' => 'required|string|max:65000,',
            'picture' => 'image',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuppyRequest extends FormRequest
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
            'color_ru' => 'required|string|max:45',
            'color_en' => 'required|string|max:45',
            'notes_ru' => 'string|max:16000000',
            'notes_en' => 'string|max:16000000',
            'picture' => 'image',
            'price' => 'required|max:15',
        ];
    }
}

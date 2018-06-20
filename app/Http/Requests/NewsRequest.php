<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title_ru' => 'required|string|max:100',
            'title_en' => 'required|string|max:100',
            'text_ru' => 'required|string|max:16000',
            'text_en' => 'required|string|max:16000',
            'picture' => 'image',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'main-image' => 'required|file',
            'image-1' => 'nullable|file',
            'image-2' => 'nullable|file',
            'image-3' => 'nullable|file',
            'image-4' => 'nullable|file',
            'image-5' => 'nullable|file',
        ];
    }
}

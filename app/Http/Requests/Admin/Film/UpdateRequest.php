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
            'main_image' => 'nullable|file',
            'image_1' => 'nullable|file',
            'image_2' => 'nullable|file',
            'image_3' => 'nullable|file',
            'image_4' => 'nullable|file',
            'image_5' => 'nullable|file',
            'trailer_link' => 'required|string',
            'type_3d' => 'nullable|boolean',
            'type_2d' => 'nullable|boolean',
            'type_imax' => 'nullable|boolean',
            'release' => 'nullable|boolean',
            'seo_url' => 'required|string',
            'seo_title' => 'required|string',
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
        ];
    }
}

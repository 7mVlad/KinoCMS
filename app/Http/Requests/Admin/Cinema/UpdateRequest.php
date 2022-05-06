<?php

namespace App\Http\Requests\Admin\Cinema;

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
            'deleteImg' => 'nullable|array',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'conditions' => 'nullable|string',
            'logo_image' => 'nullable|file',
            'top_banner' => 'nullable|file',
            'images' => 'nullable|array',
            'seo_url' => 'required|string',
            'seo_title' => 'required|string',
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
        ];
    }
}

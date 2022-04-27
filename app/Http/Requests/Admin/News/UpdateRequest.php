<?php

namespace App\Http\Requests\Admin\News;

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
            'status' => 'nullable|boolean',
            'title' => 'required|string',
            'date' => 'nullable|date',
            'content' => 'required|string',
            'main_image' => 'nullable|file',
            'images' => 'nullable|array',
            'video_link' => 'required|string',
            'seo_url' => 'required|string',
            'seo_title' => 'required|string',
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
        ];
    }
}

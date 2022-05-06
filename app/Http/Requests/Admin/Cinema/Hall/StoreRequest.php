<?php

namespace App\Http\Requests\Admin\Cinema\Hall;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'hall_number' => 'required|string',
            'description' => 'nullable|string',
            'hall_scheme' => 'nullable|file',
            'top_banner' => 'nullable|file',
            'images' => 'nullable|array',
            'seo_url' => 'required|string',
            'seo_title' => 'required|string',
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
        ];
    }
}

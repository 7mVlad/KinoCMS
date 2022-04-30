<?php

namespace App\Http\Requests\Admin\Page\Main;

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
            'status' => 'nullable|boolean',
            'phone_one' => 'nullable|string',
            'phone_two' => 'nullable|string',
            'seo_text' => 'nullable|string',
            'seo_url' => 'required|string',
            'seo_title' => 'required|string',
            'seo_keywords' => 'required|string',
            'seo_description' => 'required|string',
        ];
    }
}

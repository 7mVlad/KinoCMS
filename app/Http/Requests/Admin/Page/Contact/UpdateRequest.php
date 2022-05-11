<?php

namespace App\Http\Requests\Admin\Page\Contact;

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
            'cinema_id' => 'nullable|array',
            'address' => 'nullable|array',
            'coordinates' => 'nullable|array',
            'logo_image' => 'nullable|array',
            'seo_url' => 'nullable|string',
            'seo_title' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ];
    }
}

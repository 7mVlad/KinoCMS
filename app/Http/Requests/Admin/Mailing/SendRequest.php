<?php

namespace App\Http\Requests\Admin\Mailing;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
            'users' => 'nullable|array',
            'user' => 'nullable|string',
            'html' => 'nullable|file',
            'template' => 'nullable|string',
        ];
    }
}

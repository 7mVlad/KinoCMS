<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => 'nullable|string',
            'email' => 'nullable|string|email|unique:users,email,' . $this->user_id,
            'password' => 'nullable|string',
            'user_id' => 'nullable|integer|exists:users,id',
            'role' => 'nullable|integer',
            'last_name' => 'nullable|string',
            'pseudonym' => 'nullable|string',
            'address' => 'nullable|string',
            'card_number' => 'nullable|integer',
            'language' => 'nullable|string',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'birthday' => 'nullable|date',
            'city' => 'nullable|string',
        ];
    }
}

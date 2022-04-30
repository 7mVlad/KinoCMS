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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'password' => 'nullable|string',
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'nullable|integer',
            'last_name' => 'required|string',
            'pseudonym' => 'nullable|string',
            'address' => 'nullable|string',
            'card_number' => 'nullable|integer',
            'language' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'birthday' => 'nullable|date',
            'city' => 'nullable|string',
        ];
    }
}

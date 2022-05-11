<?php

namespace App\Http\Requests\Admin\Schedule;

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
            'cinema_id' => 'nullable|string',
            'hall_id' => 'nullable|string',
            'film_id' => 'nullable|integer',
            'cost' => 'nullable|integer',
            'date' => 'nullable|date',
            'time' => 'nullable',
        ];
    }
}

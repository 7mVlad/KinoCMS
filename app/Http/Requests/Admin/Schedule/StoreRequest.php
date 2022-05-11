<?php

namespace App\Http\Requests\Admin\Schedule;

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
            'cinema_id' => 'required|string',
            'hall_id' => 'required|string',
            'film_id' => 'required|integer',
            'cost' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
        ];
    }
}

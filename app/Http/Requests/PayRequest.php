<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sum' => 'integer:required|min:2000',
            'currency' => 'string:required',
        ];
    }
    public function messages()
    {
        return [
            'sum.min' => 'Минимальная сумма пополнения 2000'
        ];
    }
}

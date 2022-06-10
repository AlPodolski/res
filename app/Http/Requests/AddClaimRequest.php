<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClaimRequest extends FormRequest
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
            'email' => 'string:required:email',
            'name' => 'string:required',
            'text' => 'integer:required',
            'city_id' => 'integer:required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'name' => 'string:required',
            'phone' => 'string:required',
            'rost' => 'integer:required',
            'ves' => 'integer:required',
            'breast_size' => 'integer:required',
            'age' => 'integer:required',
            'price' => 'integer:required',
            'about' => 'string:required',
            'service' => 'array',
            'metro' => 'array',
            'rayon' => 'array',
            'time' => 'array',
            'national_id' => 'integer',
            'intim_hair_color_id' => 'integer',
            'hair_color_id' => 'integer',
            'avatar' => 'mimes:jpg,bmp,png',
            'gallery.*' => 'mimes:jpg,bmp,png',
            'user_id' => 'exists:users,id',
            'city_id' => 'exists:cities,id',
            'tarif_id' => 'exists:tarifs,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['user_id' => auth()->id()]);
    }

}
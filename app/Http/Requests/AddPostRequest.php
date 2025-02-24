<?php

namespace App\Http\Requests;

use App\Models\Post;
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
            'age' => 'integer:required:min:18',
            'price' => 'integer:required',
            'fake' => 'integer:required',
            'about' => 'string:required',
            'service' => 'array',
            'metro' => 'array',
            'rayon_id' => 'integer',
            'time' => 'array',
            'national_id' => 'integer',
            'intim_hair_color_id' => 'integer',
            'hair_color_id' => 'integer',
            'add_more' => 'integer',
            'avatar' => 'mimes:jpg',
            'gallery.*' => 'mimes:jpg',
            'user_id' => 'exists:users,id',
            'city_id' => 'exists:cities,id',
            'tarif_id' => 'exists:tarifs,id',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => auth()->id(),
            'fake' => Post::POST_REAL,
            //'publication_status' => Post::POST_ON_MODERATION
        ]);
    }

}

<?php

namespace App\Http\Requests\Cinema;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'movie_ids' => ['required', 'array', 'min:2'],
            'movie_ids.*' => ['required', 'numeric', 'exists:movies,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()->all()], 422));
    }
}

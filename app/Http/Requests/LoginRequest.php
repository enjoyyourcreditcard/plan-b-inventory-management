<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email' => 'required',
            'password' => 'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'code' => 400,
            'msg' => 'Bad Request',
            'data' => $validator->errors()
        ];

        throw new HttpResponseException(response()->json($response, 400));
    }
}

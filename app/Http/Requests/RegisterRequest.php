<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|unique:users,name|between:2,10',
            'age' => 'required|integer|min:19',
            'email' => 'required|email:rfc,dns|unique:users,id',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => '유저명을 입력해주세요(2~10 글자 내)',
            'username.between' => '유저명을 2~10 글자 내로 작성해주세요.',
            'username.between' => '유저명을 2~10 글자 내로 작성해주세요.',
            'email.required' => '이메일을 입력해주세요',
            'password.required' => 'Password is required',
            'password.same' => '패스워드가 서로 일치하지 않습니다.'
        ];
    }
}

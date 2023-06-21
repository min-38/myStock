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
            'country' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,id',
            'phone' => 'required|regex:/^01([016789]?)-?([0-9]{3,4})-?([0-9]{4})$/|min:11|unique:users,phone',
            'password' => 'required|regex:/^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/|min:8',
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
            'username.required' => '유저명을 입력해주세요.(2~10 글자 내)',
            'username.between' => '유저명을 2~10 글자 내로 작성해주세요.',
            'username.unique' => '이미 존재하는 닉네임입니다.',
            'age.required' => '나이를 입력해주세요',
            'age.min' => '이 서비스는 19세 미만 사용을 금지하고 있습니다.',
            'country.required' => '거주 중인 국가를 선택해주세요.',
            'phone.requried' => '핸드폰 번호를 입력해주세요.',
            'phone' => '핸드폰 번호 형식이 아닙니다.',
            'email.required' => '이메일을 입력해주세요.',
            'email' => '이메일 형식이 아닙니다',
            'password.required' => '패스워드를 입력해주세요.',
            'password' => '8~16자의 이상의 영문, 숫자, 특수문자를 포함해야 합니다.',
            'password_confirmation.required' => '패스워드를 입력해주세요.',
            'password.same' => '패스워드가 서로 일치하지 않습니다.'
        ];
    }
}

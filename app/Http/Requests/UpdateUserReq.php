<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserReq extends FormRequest
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
            "username" => "required|regex: /^[A-Za-z][a-z]{5,15}[\d]{1,5}$/",
            "pass" =>  "nullable|regex:/^[\d\w]{5,13}$/",
            "mail" => "required|email"
        ];
    }

    public function messages(){
        return [
            "username.required" => "Enter username.",
            "username.regex" => "Username must contain at least 6 characters and at least 1 number.",
            "pass.regex" =>  "Invalid password.",
            "mail.required" =>  "Enter your password.",
            "mail.email" =>  "Invalid email address.",
            ];
    }
}

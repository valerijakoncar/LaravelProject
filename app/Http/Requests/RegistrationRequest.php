<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            "pass" =>  "required|regex:/^[\d\w]{5,13}$/",
            "pass1" =>  "required|same:pass",
            "email" => "required|email",
            "tel" => "required|regex:/^06[\d]\-[\d]{3}\-[\d]{3,4}$/",
            "town" => "nullable|regex:/^[A-Z][a-z]{3,}(\s[A-Z][a-z]{2,})*$/",
            "selectedGender" => "required",
            "sendViaMail" => "nullable"
        ];
    }

    public function messages(){
        return [
            "username.required" => "Enter your username.",
            "username.regex" => "Username must contain at least 6 characters and at least 1 number.",
            "pass.required" =>  "Enter your password.",
            "pass.regex" => "Invalid password.",
            "pass1.required" =>  "Repeat your password.",
            "pass1.same" => "Invalid repeated password.",
            "email.required" => "Email is required.",
            "email.email" => "Email is not in valid format",
            "tel.required" =>  "Enter your phone number.",
            "tel.regex" => "Invalid phone number format.",
            "town.regex" => "Town is not in valid format.",
            "selectedGender.required" =>  "Choose gender.",
        ];
    }
}

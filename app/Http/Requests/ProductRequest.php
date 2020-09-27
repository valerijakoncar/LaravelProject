<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "prodName" => "required",
            "prodCat" => "required|not_in:-1",
            "prodPrice" =>"required|regex:/^\d*\.?\d*$/",
            "oldPrice" =>"required|regex:/^\d*\.?\d*$/",
            "imgProd" => "nullable|mimes:jpeg,jpg,png"
        ];
    }

    public function messages(){
        return[
            "prodName.required" => "Name is required.",
           // "prodName.regex" => "Name is not in valid format.",
            "prodCat.required" => "Category is required.",
            "prodCat.not_in" => "Choose category.",
            "prodPrice.required" => "Product price is required.",
            "prodPrice.regex" => "Product price is not in valid format.",
            "oldPrice.required" => "Product price is required.",
            "oldPrice.regex" => "Product price is not in valid format.",
            "imgProd.mimes" => "Picture must be jpeg, jpg or png."
        ];
    }
}

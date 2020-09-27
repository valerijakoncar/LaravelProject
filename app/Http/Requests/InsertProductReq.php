<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertProductReq extends FormRequest
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
            "prodNameI" => "required",
            "prodCatI" => "required|not_in:-1",
            "prodPriceI" =>"required|regex:/^\d*\.?\d*$/",
            "oldPriceI" =>"required|regex:/^\d*\.?\d*$/",
            "imgProdI" => "required|mimes:jpeg,jpg,png"
        ];
    }

    public function messages(){
        return[
            "prodNameI.required" => "Name is required.",
            // "prodName.regex" => "Name is not in valid format.",
            "prodCatI.required" => "Category is required.",
            "prodCatI.not_in" => "Choose category.",
            "prodPriceI.required" => "Product price is required.",
            "prodPriceI.regex" => "Product price is not in valid format.",
            "oldPriceI.required" => "Product price is required.",
            "oldPriceI.regex" => "Product price is not in valid format.",
            "imgProdI.mimes" => "Picture must be jpeg, jpg or png.",
            "imgProdI.required" => "You have to choose a picture."

        ];
    }
}

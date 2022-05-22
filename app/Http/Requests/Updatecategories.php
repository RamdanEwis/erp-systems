<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatecategories extends FormRequest
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
     *
     */
    public function rules()
    {

        return [

            'category_name' => 'required|unique:categories|max:255,',
            'description' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_name.required' => 'يرجي ادخال اسم القسم',
            'category_name.unique' => 'هذا القسم موجود يرجي تغير الاسم',
            'description.required' => 'يرجي ادخال اسم القسم',
        ];
    }
}

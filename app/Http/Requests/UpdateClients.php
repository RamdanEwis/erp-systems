<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClients extends FormRequest
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
            'name' => 'required|string|max:255' . Rule::unique('clients', 'name')->ignore($this->clients),
            'AmountDue' => 'required',
            'phone' => 'required|numeric',

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
            'name.required' => 'يرجي ادخال اسم العميل',
            'AmountDue.required' => 'يرجي ادخال المبلغ المستحق علي العميل',
            'phone.required' => 'يرجي ادخال رقم الهاتف',
            'phone.numeric' => 'يجب  ادخال رقم الهاتف ارقام',
            'AmountDue.numeric' => 'يجب  ادخال المبلغ المستحق ارقام',
        ];
    }

}

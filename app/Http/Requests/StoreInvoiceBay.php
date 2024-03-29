<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Nullable;

class StoreInvoiceBay extends FormRequest
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
            'supplier_id' => 'required|numeric',
            'total' => 'required|numeric',
            'user_id' => Nullable::class,
            'invoice_date' => 'required',
        ];
    }

    public function massage()
    {
        return [
            /*            'product_name.required' => 'يرجي ادخال اسم المنتج',
                        'AmountDue.required' => 'يرجي ادخال المبلغ المستحق علي العميل',
                        'number_product.required' => 'يرجي ادخال رقم الهاتف',
                        'price_buy.numeric' => 'يجب  ادخال رقم الهاتف ارقام',*/
        ];
    }
}

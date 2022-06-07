<?php

namespace App\Http\Controllers;
use App\Model\Client;
use App\Model\Category;

use App\Model\Invoice;
use App\Model\InvoiceBayProduct;
use App\Model\InvoiceBuy;
use App\Model\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceBay;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InvoiceBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('invoices.invoicesBuy',[
            'invoices' => InvoiceBuy::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('invoices.add_invoice_buy',[
            'categorise' => Category::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreInvoiceBay $request)
    {

        $validated = $request->validated();
        InvoiceBuy::create($validated + [
                'user_id' => (Auth::user()->id),
                'value_status' => 1,
                'status' => 'غير مدفوعه',

            ]);
        $invoice_number =  InvoiceBuy::latest()->first()->id;
        InvoiceBayProduct::create([
            'product' => $request->product,
            'number_product' => $request->number_product,
            'price_buy' => $request->price_buy,
            'total_row' => $request->total_row,
            'invoice_number' => $request->$invoice_number,
        ]);
        return redirect()->back()->with('Add', 'تم اضافه الفاتوره بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceBuy  $invoiceBuy
     * @return Response
     */
    public function show(InvoiceBuy $invoiceBuy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceBuy  $invoiceBuy
     * @return Response
     */
    public function edit(InvoiceBuy $invoiceBuy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\InvoiceBuy  $invoiceBuy
     * @return Response
     */
    public function update(Request $request, InvoiceBuy $invoiceBuy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceBuy  $invoiceBuy
     * @return Response
     */
    public function destroy(InvoiceBuy $invoiceBuy)
    {
        //
    }
    public function getprouduct($id)
    {
        $products = DB::table('products')->where('category_id',$id)->pluck("product_name","id") ;
        return json_encode($products);
    }
}

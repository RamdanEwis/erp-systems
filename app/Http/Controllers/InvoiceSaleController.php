<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoice;
use App\Model\SalesDetails;
use App\Model\Category;
use App\Model\Client;
use App\Model\InvoiceSale;
use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PDF;

class InvoiceSaleController extends Controller
{


    public function __construct() {
        $this->middleware('permission:قائمة فواتير البيع', ['only => index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $invoices = InvoiceSale::all();
        return view('invoices.invoicesSale', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('invoices.Add_Invoice_Sale', [
            'categories' => Category::all(),
            'clients' => Client::all(),
            'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInvoice $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreInvoice $request)
    {
        $validated = $request->validated();
        $invoice = InvoiceSale::create($validated + [
                'user_id' => (Auth::user()->id)
            ]);
        $details_list = [];
        $invoice_number = InvoiceSale::latest()->first()->id;
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['category_id'] = $request->category_id[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['invoice_number'] = $invoice_number;
        }
        $details = $invoice->SalesDetails()->createmany($details_list);
        return redirect()->back()->with('Add', 'تم اضافه الفاتوره بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function show($id)
    {
        return view('invoices.show_invoice_sales', [
            'categorise' => Category::all(),
            'clients' => Client::all(),
            'products' => Product::all(),
            'buysDetails' => SalesDetails::all(),
            'invoices' => InvoiceSale::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InvoiceSale $invoiceSale
     * @return Factory|View
     */
    public function edit($id)
    {
        return view('invoices.edit_invoice_sale',[
            'categories' => Category::all(),
            'clients' => Client::all(),
            'products' => Product::all(),
            'buysDetails' => SalesDetails::all(),
            'invoices' => InvoiceSale::findOrFail($id)

        ]);   //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param InvoiceSale $invoiceSale
     * @return void
     */
        public function update(Request $request,$id)
    {
            $invoice = InvoiceSale::whereId($id)->first();
            $invoice->update([
                    'user_id' => (Auth::user()->id),
                    'client_id' => $request->client_id,
                    'total' => $request->total,
                    'invoice_date' => $request->invoice_date
            ]);
            $invoice->SalesDetails()->delete();
            $details_list = [];
            for ($i = 0; $i < count($request->product_name); $i++) {
                $details_list[$i]['product_name'] = $request->product_name[$i];
                $details_list[$i]['category_id'] = $request->category_id[$i];
                $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
                $details_list[$i]['quantity'] = $request->quantity[$i];
                $details_list[$i]['unit_price'] = $request->unit_price[$i];
                $details_list[$i]['invoice_number'] = $invoice;
            }
            $details = $invoice->SalesDetails()->createmany($details_list);
            return redirect('invoicesSale')->with('Add', 'تم تعديل الفاتوره بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @param $request
     * @return false|string
     */
    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        $invoice = InvoiceSale::find($id)->delete();
        session()->flash('delete', 'تم حذف  الفاتوره  بنجاح');
        return redirect('/invoicesSale');
    }

    //print the  invoices buy
    public function print($id)
    {
        return view('invoices.print_invoice_sale',[
            'categorise' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
            'buysDetails' => SalesDetails::all(),
            'invoices' => InvoiceSale::findOrFail($id)
        ]);
    }

    //print the  invoices sale
    public function pdf($id)
    {
       $invoices = InvoiceSale::findOrFail($id);
        $data['clients_id'] = $invoices->Clients->name;
        $data['invoice_id'] = $invoices->id;
        $data['invoice_date'] =  $invoices->invoice_date;
       $items = [];
        foreach($invoices->SalesDetails as $item) {
        $items[] =  [
            'product_name'  =>   $item->product_name,
            'quantity'  => $item->quantity,
            'row_sub_total'  => $item->row_sub_total,
        ];
        }

        $data['items'] = $items;
        $data['total'] = $invoices->total;
        $pdf = PDF::loadView('invoices.pdf_invoice_sale', $data);
        return $pdf->stream('invoice#' . $invoices->id . '.pdf');
    }
}

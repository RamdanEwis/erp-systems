<?php

namespace App\Http\Controllers;
use App\Model\BuysDetails;
use App\Model\Invoice;
use App\Model\InvoiceDetails;
use App\Model\Category;
use App\Model\InvoiceBayProduct;
use App\Model\InvoiceBuy;
use App\Model\InvoiceSale;
use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceBay;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class InvoiceBuyController extends Controller


{
    public function __construct() {
        $this->middleware('permission:قائمة فواتير شراء', ['only => index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('invoices.invoicesBuy', [
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
        return view('invoices.add_invoice_buy', [
            'categorise' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInvoiceBay $request
     * @return RedirectResponse
     */
    public function store(StoreInvoiceBay $request)
    {
        $validated = $request->validated();
        $invoice = InvoiceBuy::create($validated + [
                'user_id' => (Auth::user()->id)
            ]);
        $details_list = [];
        $invoice_number = InvoiceBuy::latest()->first()->id;
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['category_id'] = $request->category_id[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['invoice_number'] = $invoice_number;
        }
        $details = $invoice->BuysDetails()->createmany($details_list);
        return redirect()->back()->with('Add', 'تم اضافه الفاتوره بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @return Factory|View
     */
    public function show($id)
    {
        return view('invoices.show_invoice_buy', [
            'categorise' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
            'buysDetails' => BuysDetails::all(),
            'invoices' => InvoiceBuy::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
        public function edit($id)
        {
            return view('invoices.edit_invoice_buy',[
                'categorise' => Category::all(),
                'suppliers' => Supplier::all(),
                'products' => Product::all(),
                'buysDetails' => BuysDetails::all(),
                'invoices' => InvoiceBuy::findOrFail($id)
            ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $invoice = InvoiceBuy::whereId($id)->first();
        $invoice->update([
            'user_id' => (Auth::user()->id),
            'supplier_id' => $request->supplier_id,
            'total' => $request->total,
            'invoice_date' => $request->invoice_date
        ]);
        $invoice->BuysDetails()->delete();
        $details_list = [];
        for ($i = 0; $i < count($request->product_name); $i++) {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['category_id'] = $request->category_id[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['unit_price'] = $request->unit_price[$i];
            $details_list[$i]['invoice_number'] = $invoice;
        }
        $details = $invoice->BuysDetails()->createmany($details_list);
        return redirect('invoiceBuy')->with('Add', 'تم تعديل الفاتوره بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        $invoice = InvoiceBuy::find($id)->delete();
        session()->flash('delete', 'تم حذف  الفاتوره  بنجاح');

        return redirect('/invoiceBuy');
    }
    public function getprouduct($id)
    {
        $products = DB::table('products')->where('category_id',$id)->pluck("product_name","id") ;
        return json_encode($products);
    }
        //print the  invoices buy
    public function print($id)
    {
        return view('invoices.print_invoice_buy',[
            'categorise' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
            'buysDetails' => BuysDetails::all(),
            'invoices' => InvoiceBuy::findOrFail($id)
        ]);
    }

    //print the  invoices sale
    public function pdf($id)
    {
        return view('invoices.pdf_invoice_buy',[
            'categorise' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
            'buysDetails' => BuysDetails::all(),
            'invoices' => InvoiceBuy::findOrFail($id)
        ]);
    }
}


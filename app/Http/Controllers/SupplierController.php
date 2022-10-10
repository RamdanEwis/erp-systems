<?php

namespace App\Http\Controllers;

use App\Model\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Storesuppliers;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use  Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{

    public function __construct() {
        $this->middleware('permission:الموردين', ['only => index']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Suppliers = Supplier::all();
        return view('supplier.supplier',compact('Suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Storesuppliers $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        Supplier::create([
            'name' => $request->name,
            'AmountDue' => $request->AmountDue,
            'user_id' => (Auth::user()->id),
        ]);
        session()->flash('Add','تم اضافه  المورد بنجاح');
        return redirect('/suppliers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Supplier  $supplier
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|max:255|unique:suppliers,name,'.$id,
        ],[
            'name.required' => 'يرجي ادخال اسم المورد',
        ]);
        $suppliers = Supplier::find($id);
        $suppliers->update([
            'name' => $request->name,
            'AmountDue' => $request->AmountDue,
            'user_id' => (Auth::user()->id),
        ]);
        session()->flash('update','تم تعديل المورد بنجاح');
        return redirect('/suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $suppliers = Supplier::find($id)->delete();
        session()->flash('delete','تم حذف  المورد بنجاح');

        return redirect('/suppliers');
    }

    public function Payment(Request $request){
        $id = $request->id;
        $request->validate([
            'name' => 'required|max:255|unique:suppliers,name,'.$id,
        ],[
            'name.required' => 'يرجي ادخال اسم المورد',
        ]);
        $suppliers = Supplier::find($id);

        $AmountDue = $suppliers->AmountDue;
        $Payment =  $request->Payment;
        $sum_Payment = ($AmountDue - $Payment);
        $suppliers->update([
            'name' => $request->name,
            'AmountDue' => $sum_Payment,
            'user_id' => (Auth::user()->id),
        ]);
        session()->flash('Payment','تم تسجيل الدفعه الي  المورد بنجاح');
        return redirect('/suppliers');

    }
}

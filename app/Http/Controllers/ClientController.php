<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Storeclient;
use App\Http\Requests\UpdateClients;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use  Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ClientController extends Controller
{



    public   function __construct()
    {
        $this->middleware('permission:العملاء', ['only' => 'index']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.client',compact('clients'));
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
    public function store(Storeclient $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        Client::create($validated + ['create_by' => (Auth::user()->name),]);
        return redirect()->back()->with('Add','تم اضافه  العميل بنجاح');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function update(UpdateClients $request)
    {
        $id = $request->id;
        $clients = Client::find($id);
        $validated = $request->validated();
        $clients->update( $validated + [ 'create_by' => (Auth::user()->name),
        ]);
        return redirect('/clients')->with('update','تم تعديل العميل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $clients = Client::find($id)->delete();
        session()->flash('delete','تم حذف  العميل بنجاح');

        return redirect('/clients');
    }

    public function Payment(Request $request){
        $id = $request->id;
        $request->validate([
            'name' => 'required|max:255|unique:clients,name,'.$id,
        ],[
            'name.required' => 'يرجي ادخال اسم العميل',
        ]);
        $clients = Client::find($id);

        $AmountDue = $clients->AmountDue;
        $Payment =  $request->Payment;
        $sum_Payment = ($AmountDue - $Payment);
        $clients->update([
            'name' => $request->name,
            'AmountDue' => $sum_Payment,
            'create_by' => (Auth::user()->name),
        ]);
        session()->flash('Payment','تم تسجيل الدفعه الي  العميل بنجاح');
        return redirect('/clients');

    }
}

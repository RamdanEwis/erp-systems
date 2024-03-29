<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('permission:المنتجات', ['only => index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('products.products', [
            'categores' => Category::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'category_id' => $request->categories_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function update(Request $request)
    {
        $id_category = Category::where('category_name',$request->category_name)->first()->id;
        $id_Product = $request->pro_id;
        $request->validate([
            'Product_name' => 'required|max:255|unique:products,Product_name,'.$id_Product,
            'price' => 'required',
        ],[
            'Product_name.required' => 'يرجي ادخال اسم المنتج',
            'Product_name.unique' => 'هذا المنتج موجود يرجي تغير الاسم',
            'price.required' => 'يرجي ادخال سعر المنتج',
        ]);
        $Product = Product::find($id_Product);
        $Product->update([
            'Product_name' => $request->Product_name,
            'category_id' => $id_category,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        session()->flash('update','تم تعديل المنتج بنجاح');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        $Category = Product::find($id)->delete();
        session()->flash('delete','تم حذف  المنتج بنجاح');

        return redirect('/products');
    }
}

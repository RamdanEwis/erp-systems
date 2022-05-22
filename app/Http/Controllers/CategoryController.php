<?php

namespace App\Http\Controllers;

use App\Model\Category;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Storecategories;
use App\Http\Requests\Updatecategories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::all();
        return view('category.category',compact('categorys'));
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
    public function store(Storecategories $request)
    {
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();
        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'create_by' => (Auth::user()->name),
        ]);
        session()->flash('Add','تم اضافه القسم بنجاح');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        $id = $request->id;
        $request->validate([
            'category_name' => 'required|max:255|unique:categories,category_name,'.$id,
            'description' => 'required',
        ],[
            'category_name.required' => 'يرجي ادخال اسم القسم',
            'category_name.unique' => 'هذا القسم موجود يرجي تغير الاسم',
            'description.required' => 'يرجي ادخال اسم القسم',
        ]);
        $Category = Category::find($id);
        $Category->update([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'create_by' => (Auth::user()->name),
        ]);
        session()->flash('update','تم تعديل القسم بنجاح');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $Category = Category::find($id)->delete();
        session()->flash('delete','تم حذف  القسم بنجاح');

        return redirect('/categories');
    }
}

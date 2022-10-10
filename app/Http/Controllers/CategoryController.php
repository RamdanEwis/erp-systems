<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\Storecategories;
use App\Http\Requests\Updatecategories;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public   function __construct()
    {
        $this->middleware('permission:الاقسام', ['only' => 'index']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|\Illuminate\Contracts\View\View|View|void
     */
    public function index()
    {
        return view('category.category', [
            'categorys' => Category::all()
        ]);
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
     * @return RedirectResponse
     */
    public function store(Storecategories $request)
    {
        $validated = $request->validated();
        Category::create($validated + [
                'create_by' => (Auth::user()->name),
            ]);
        return redirect()->back()->with('Add', 'تم اضافه القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Category $category
     * @return RedirectResponse
     */
    public function update(Updatecategories $request, Category $category)
    {
        $validated = $request->validated();
         $category->update($validated  + [  'create_by' => (Auth::user()->name)]);
        return redirect()->back()->with('update', 'تم تعديل القسم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $Category = Category::find($id)->delete();
        session()->flash('delete', 'تم حذف  القسم بنجاح');

        return redirect('/categories');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories=Category::paginate(10);
        $data=[
            'categories'=>$allCategories
        ];
        return view('category.categories')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("category.newcategory");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route("categories.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\catory  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $data=[
            'category' => $category
        ];

        return view("category.editcategory")->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecatagoryRequest  $request
     * @param  \App\Models\catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $dbcategory       = Category::find($category->id);
        $dbcategory->name = $request->name;
        $dbcategory->save();
        return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}

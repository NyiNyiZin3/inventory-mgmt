<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = Product::with(['category','supplier'])->get();

        $data = [
            'products' => $allProducts
        ];
        return view('product.products')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::All();
        $allSuppliers = Supplier::All();

        $data = [
            'categories' => $allCategories,
            'suppliers'  => $allSuppliers
        ];
        return view('product.newproduct')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->unit_price = $request->price;
        $product->supplier_id = $request->supplier;
        $product->category_id = $request->category;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $product = Product::with(["category", "supplier"])->find($id);
        $allCategories = Category::All();
        $allSuppliers = Supplier::All();

        $data = [
            'product'           => $product,
            'categories'        => $allCategories,
            'suppliers'         => $allSuppliers,
            'selectedcategory'  => $product->category->id,
            'selectedsupplier'  => $product->supplier->id,

        ];
        return view('product.editproduct')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $dbproduct              = Product::find($product->id);
        $dbproduct->name        = $request->name;
        $dbproduct->unit_price  = $request->price;
        $dbproduct->category_id = $request->category;
        $dbproduct->supplier_id = $request->supplier;
        $dbproduct->save();
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

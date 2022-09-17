<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierPhno;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSuppliers=Supplier::paginate(10);
        $data=[
            'suppliers'=>$allSuppliers
        ];
        return view('supplier.suppliers')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.newsuppliers");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $supplier = Supplier::with(['supplierPhnos'])->find($id);
        $data=[
            'supplier'=>$supplier,
            'supplierPhnos'=>$supplier->supplierPhnos->toArray()
        ];
        return view('supplier.editsupplier')->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dbsupplier              = Supplier::find($id);
        $dbsupplier->name        = $request->name;
        $dbsupplier->address     = $request->address;

        $phnos = Supplierphno::where("supplier_id",$id)->get();
        dd($phnos);

        $dbsupplier->save();
        return to_route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

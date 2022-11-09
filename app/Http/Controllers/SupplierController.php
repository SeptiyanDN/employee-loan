<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::get();
        return view('module.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('module.supplier.createsupplier');
    }

    public function store(Request $request)
    {
        $supplier = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'telepon'=>$request->telepon,
            'email'=>$request->email,
            'alamat' => $request->alamat,
            'kelurahan'=> $request->kelurahan,
            'kode_pos'=> $request->kode_pos,
            'nama_perwakilan'=>$request->nama_perwakilan,
            'telepon_perwakilan'=>$request->telepon_perwakilan,
            'email_perwakilan'=>$request->email_perwakilan,
        ]);

        return redirect()->route('index.supplier')->with('success','Berhasil Menambahkan Supplier');
    }

    public function show(Supplier $supplier)
    {
        //
    }


    public function edit(Supplier $supplier)
    {
        //
    }


    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    public function destroy(Supplier $supplier)
    {
        //
    }
}

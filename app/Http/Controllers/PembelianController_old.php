<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Pembelian;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{

    public function index()
    {
        $supplier = Supplier::get();
        return view('module.pembelian.index',compact('supplier'));
    }

    public function data(){
        $pembelian = Pembelian::orderBy('id','desc')->get();
        return datatables()
        ->of($pembelian)
        ->addIndexColumn()
        ->addColumn('select_all', function ($pemasukan){
            return '<input type="checkbox" name="id[]" value="'. $pemasukan->id .'">';
        })
        ->addColumn('total_item',function($pembelian){
            return $pembelian->total_item;
        })
        ->addColumn('total_harga',function($pembelian){
            return 'Rp '.Helpers::format_uang($pembelian->total_harga);
        })
        ->addColumn('bayar',function($pembelian){
            return 'Rp '.Helpers::format_uang($pembelian->total_harga);
        })
        ->addColumn('tanggal', function($pembelian){
            return Helpers::tanggal_indonesia($pembelian->created_at);
        })
        ->addColumn('supplier',function($pembelian){
            return $pembelian->supplier->nama_supplier ?? '-';
        })
        ->addColumn('diskon',function($pembelian){
            return $pembelian->diskon . '$';
        })
        ->addColumn('Action', function ($pembelian){
            return '
            <a class="me-3" onclick="detailPemasukan(`'. route('pemasukan.detail', $pembelian->id) .'`)">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
        </a>
        <a class="me-3" href="'.route('pemasukan.show', $pembelian->id) .'">
        <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
    </a>
        <a class="me-3" onclick="deleteData(`'. route('pemasukan.destroy', $pembelian->id) .'`)">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
        </a>
            ';
        })
        ->rawColumns(['Action','select_all'])
        ->make(true);
    }
    public function create($id)
    {
        $pembelian = new Pembelian();
        $pembelian->supplier_id = $id;
        $pembelian->total_item = 0;
        $pembelian->total_harga = 0;
        $pembelian->diskon = 0;
        $pembelian->bayar = 0;
        $pembelian->save();

        session(['pembelian_id' => $pembelian->id]);
        session(['supplier_id' => $pembelian->supplier_id]);

        return redirect()->route('pembelian_detail.index');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Pembelian $pembelian)
    {
        //
    }

    public function edit(Pembelian $pembelian)
    {
        //
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return response(null, 204);
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $pembelian = Pembelian::find($id);
            $pembelian->delete();
        }
        return response()->json(null, 204);
    }
}

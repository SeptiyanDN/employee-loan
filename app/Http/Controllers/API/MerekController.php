<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    public function index()
    {
        $data = Merek::paginate(5);
        return ResponseFormatter::success($data,"Berhasil Mengambil Data Merek");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_merek' => 'required|unique:mereks'
        ]);
        $data = Merek::create([
           'nama_merek' => $request->nama_merek
        ]);

        return ResponseFormatter::success($data,'Berhasil Menambahkan Data Merek Baru');
    }


    public function show($id)
    {
        $data = Merek::find($id);
        return ResponseFormatter::success($data,'Berhasil Menampilkan Data Merek');
    }


    public function update(Request $request, Merek $merek)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:mereks'
        ]);
        $merek->update([
            "nama_kategori" => $request->nama_merek ?? $merek->nama_kategori
        ]);

        return ResponseFormatter::success($merek,'Berhasil Mengubah Data Merek');
    }

    public function destroy(Merek $merek)
    {
        $merek->delete();
        return ResponseFormatter::success(null,"Berhasil Menghapus Data Merek");
    }
}

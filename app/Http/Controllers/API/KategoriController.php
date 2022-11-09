<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::paginate(5);
        return ResponseFormatter::success($kategori,"Berhasil Mengambil Data Kategori");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris'
        ]);
        $kategori = Kategori::create([
           'nama_kategori' => $request->nama_kategori
        ]);

        return ResponseFormatter::success($kategori,'Berhasil Menambahkan Data Kategori Baru');
    }


    public function show($id)
    {
        $data = Kategori::find($id);
        return ResponseFormatter::success($data,'Berhasil Menampilkan Data Kategori');
    }


    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris'
        ]);
        $kategori->update([
            "nama_kategori" => $request->nama_kategori ?? $kategori->nama_kategori
        ]);

        return ResponseFormatter::success($kategori,'Berhasil Mengubah Data Kategori');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return ResponseFormatter::success(null,"Berhasil Menghapus Data Kategori");
    }
}

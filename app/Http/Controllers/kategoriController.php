<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return response()->json('Data berhasil Disimpan', 200);
    }


    public function show(Kategori $kategori)
    {
        //
    }


    public function edit(Kategori $kategori)
    {
        //
    }


    public function update(Request $request, Kategori $kategori)
    {
        //
    }


    public function destroy(Kategori $kategori)
    {
        //
    }
}

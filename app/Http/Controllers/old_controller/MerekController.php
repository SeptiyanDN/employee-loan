<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
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
        $merek = new Merek();
        $merek->nama_merek = $request->nama_merek;
        $merek->save();

        return response()->json('Data berhasil Disimpan', 200);
    }


    public function show(Merek $merek)
    {
        //
    }


    public function edit(Merek $merek)
    {
        //
    }


    public function update(Request $request, Merek $merek)
    {
        //
    }


    public function destroy(Merek $merek)
    {
        //
    }
}

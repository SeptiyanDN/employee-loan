<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori','merek')->paginate(5);
        return ResponseFormatter::success($produk,"Berhasil Mengambil Data Produk");
    }


    public function store(Request $request)
    {
        //Get just filename
        $filename = Str::lower(str_replace(' ', '-', $request->nama_produk));
        // Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = 'produk_'.$filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);

        $produk = Produk::create([
             'image' => $fileNameToStore,
             'nama_produk'=> $request->nama_produk,
             'kategori_id'=> $request->kategori_id,
             'merek_id'=> $request->merek_id,
             'harga_jual'=> $request->harga_jual,
             'harga_modal'=> $request->harga_modal,
             'sku'=> $request->sku,
             'satuan'=> $request->satuan,
             'stok'=> $request->stok,
             'minimum_stok'=> $request->minimum_stok,
             'favorit'=> $request->favorit,
             'notifikasi_stok_minimum'=> $request->notifikasi_stok_minimum,
            ]);
        return ResponseFormatter::success($produk,"Berhasil Menambahkan Produk Baru");
    }

    public function update(Request $request, Produk $produk){
        if($request->hasFile('image')){
            //Get just filename
        $filename = Str::lower(str_replace(' ', '-', $request->nama_produk));
        // Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = 'produk_'.$filename.'_'.time().'.'.$extension;
        // Upload Image
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);
        $oldImage = 'public/images/tenant/'.auth()->user()->current_tenant_id.'/'.$produk->image;
        Storage::delete($oldImage);

    }
        $produk->update([
            'image' => $fileNameToStore ?? $produk->image,
            'nama_produk'=> $request->nama_produk,
            'kategori_id'=> $request->kategori_id,
            'merek_id'=> $request->merek_id,
            'harga_jual'=> $request->harga_jual,
            'harga_modal'=> $request->harga_modal,
            'sku'=> $request->sku,
            'satuan'=> $request->satuan,
            'stok'=> $request->stok,
            'minimum_stok'=> $request->minimum_stok,
            'favorit'=> $request->favorit,
            'notifikasi_stok_minimum'=> $request->notifikasi_stok_minimum,
        ]);
        return ResponseFormatter::success($produk,"Berhasil Mengubah Produk");
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return ResponseFormatter::success(null,"Berhasil Menghapus Data Produk");
    }
}

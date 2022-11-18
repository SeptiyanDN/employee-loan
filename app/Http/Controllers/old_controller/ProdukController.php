<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Helpers\NotificationHelpers;
use App\Models\Kategori;
use App\Models\Merek;
use Illuminate\Support\Str;

use App\Helpers\tambah_nol_didepan;

class ProdukController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $products = Produk::with('kategori','merek')->get();
        return view('module.produk.index',compact('products'));
    }

    public function data(){
        $products = Produk::with('kategori','merek')
                    ->orderBy('sku', 'asc')->get();


                    return datatables()
                    ->of($products)
                    ->addIndexColumn()
                    ->addColumn('select_all', function ($products){
                        return '<input type="checkbox" name="id[]" value="'. $products->id .'">';
                    })
                    ->addColumn('image', function($products){
                        $url= asset('storage/images/tenant/'.auth()->user()->current_tenant_id.'/'.$products->image);
                        return ' <a class="me-3">
                        <img src="'.$url.'" alt="img" style="width=20px; height=10px;">
                    </a>';
                    })
                    ->addColumn('sku', function ($products){
                        return
                        '<span class="badges bg-lightgreen">'. $products->sku .'</span>';
                    })
                    ->addColumn('kategori', function($products){
                        return $products->kategori->nama_kategori;
                    })
                    ->addColumn('merek', function($products){
                        return $products->merek->nama_merek;
                    })
                    ->addColumn('harga_beli', function ($products){
                        return 'Rp '. Helpers::format_uang($products->harga_modal);
                    })
                    ->addColumn('harga_jual', function ($products){
                        return 'Rp '. Helpers::format_uang($products->harga_jual);
                    })
                    ->addColumn('diskon', function ($products){
                        return $products->diskon .'%';
                    })
                    ->addColumn('Action', function ($products){
                        return '
                        <a class="me-3" onclick="updateData(`'. route('edit.produk', $products->id) .'`)">
                        <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
                    </a>
                    <a class="me-3" onclick="deleteData(`'. route('remove.produk', $products->id) .'`)">
                        <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
                    </a>
                        ';
                    })
                    ->rawColumns(['image','Action', 'sku', 'select_all'])
                    ->make(true);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $merek = Merek::all();
        return view('module.produk.createproduk',compact('kategori','merek'));
    }

    public function store(Request $request)
    {

        //Get just filename
        if($request->hasFile('image')){
        $filename = Str::lower(str_replace(' ', '-', $request->nama_produk));
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'produk_'.$filename.'_'.time().'.'.$extension;
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);
        }
        $produkTerakhir = Produk::latest()->first();
        if ($produkTerakhir != null) {
            $last = $produkTerakhir->id;
        } else {
            $last =0;
        }
        $produk = Produk::create([
        'image' => $request->image  ? $fileNameToStore : null ,
        'nama_produk'=> $request->nama_produk,
        'kategori_id'=> $request->kategori_id,
        'merek_id'=> $request->merek_id,
        'harga_jual'=> $request->harga_jual,
        'harga_modal'=> $request->harga_modal,
        'diskon' => $request->diskon,
        'sku'=> 'PDK'.Helpers::tambah_nol_didepan((int)$last+1,5),
        'satuan'=> $request->satuan,
        'stok'=> $request->stok,
        'minimum_stok'=> $request->minimum_stok,
        'favorit'=> $request->favorit,
        'notifikasi_stok_minimum'=> $request->notifikasi_stok_minimum,
       ]);
        $message = "Berhasil Menambahkan Produk";
        NotificationHelpers::sendNotification($produk,$message);

       return redirect()->route('index.produk')->with('success','data berhasil di simpan');
    }

    public function show(Produk $produk)
    {
        //
    }

    public function edit(Produk $produk)
    {
        return view('module.produk.editproduk',[
            'produk'=>$produk,
            'produks'=>Produk::get(),
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $produk->update([
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

        return redirect()->route('index.produk')->with('success','Berhasil Mengubah Data Produk');
    }

    public function remove($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $produk = Produk::find($id);
            $produk->delete();
        }
        return response()->json(null, 204);
    }
}

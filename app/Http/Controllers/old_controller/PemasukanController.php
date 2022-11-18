<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DeskripsiPemasukan;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PemasukanController extends Controller
{

    public function index()
    {
        $deskripsi = DeskripsiPemasukan::all();
        return view('module.kelolakas.pemasukan.index',compact('deskripsi'));
    }

    public function create(){
        $deskripsi = DeskripsiPemasukan::all();
        return view('module.kelolakas.pemasukan.create',compact('deskripsi'));
    }

    public function data(){
        $pemasukan = Pemasukan::leftJoin('deskripsi_pemasukans', 'deskripsi_pemasukans.id', 'pemasukans.deskripsi_pemasukan_id')
        ->select('pemasukans.*', 'deskripsi_pemasukan')
        ->orderBy('deskripsi_pemasukan', 'asc')->get();

        return datatables()
            ->of($pemasukan)
            ->addIndexColumn()
            ->addColumn('select_all', function ($pemasukan){
                return '<input type="checkbox" name="id[]" value="'. $pemasukan->id .'">';
            })
            ->addColumn('created_at',function($pemasukan){
                return Helpers::tanggal_indonesia($pemasukan->created_at, false);
            })
            ->addColumn('nominal',function($pemasukan){
                return 'Rp. '.Helpers::format_uang($pemasukan->nominal);
            })
            ->addColumn('Action', function ($pemasukan){
                return '
                <a class="me-3" onclick="detailPemasukan(`'. route('pemasukan.detail', $pemasukan->id) .'`)">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
            </a>
            <a class="me-3" href="'.route('pemasukan.show', $pemasukan->id) .'">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
        </a>
            <a class="me-3" onclick="deleteData(`'. route('pemasukan.destroy', $pemasukan->id) .'`)">
                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
            </a>
                ';
            })
            ->rawColumns(['Action','select_all'])
            ->make(true);


    }

    public function store(Request $request)
    {
        if($request->hasFile('image')){
        $filename = Str::lower(str_replace(' ', '-', $request->deskripsi_pemasukan_id));
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'transaksi_pemasukan'.$filename.'_'.time().'.'.$extension;
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);

    }
    Pemasukan::create([
        'image' =>  $request->image ?  $fileNameToStore : null,
        'deskripsi_pemasukan_id' => $request->deskripsi_pemasukan_id,
        'keterangan' => $request->keterangan,
        'nominal' => $request->nominal,

    ]);


        return redirect()->route('pemasukan.index')->with('success','data berhasil di simpan');

    }

    public function show($id)
    {
        $pemasukan = Pemasukan::find($id);
        $deskripsi = DeskripsiPemasukan::all();

        return view('module.kelolakas.pemasukan.edit',compact('pemasukan','deskripsi'));
    }

    public function detailPemasukan(Pemasukan $pemasukan) {

        $pemasukan = DB::table('pemasukans')
        ->leftJoin('deskripsi_pemasukans', 'pemasukans.deskripsi_pemasukan_id','deskripsi_pemasukans.id')
        ->where('deskripsi_pemasukans.id',$pemasukan->deskripsi_pemasukan_id)
        ->first();
        $url= asset('storage/images/tenant/'.auth()->user()->current_tenant_id.'/'.$pemasukan->image);
        $pemasukan->image = $url;
        return response()->json($pemasukan);
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        if($request->hasFile('image')){
        $filename = Str::lower(str_replace(' ', '-', $request->deskripsi_pengeluaran_id));
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'transaksi_pemasukan'.$filename.'_'.time().'.'.$extension;
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);
        }
        $pemasukan->update([
            'image' => $fileNameToStore ? $fileNameToStore : $pemasukan->image,
            'deskripsi_pemasukan_id' => $request->deskripsi_pemasukan_id,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
        ]);
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil dirubah');

    }
   public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return response(null, 204);
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $produk = Pemasukan::find($id);
            $produk->delete();
        }
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\DeskripsiPengeluaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PengeluaranController extends Controller
{

    public function index()
    {
        $deskripsi = DeskripsiPengeluaran::all();
        return view('module.kelolakas.pengeluaran.index',compact('deskripsi'));
    }


    public function data(){
        $pengeluaran = Pengeluaran::leftJoin('deskripsi_pengeluarans','deskripsi_pengeluarans.id','pengeluarans.deskripsi_pengeluaran_id')
                        ->select('pengeluarans.*','deskripsi_pengeluaran')
                        ->orderBy('deskripsi_pengeluaran','asc')->get();
        return datatables()
        ->of($pengeluaran)
        ->addIndexColumn()
        ->addColumn('select_all', function ($pengeluaran){
            return '<input type="checkbox" name="id[]" value="'. $pengeluaran->id .'">';
        })
        ->addColumn('created_at',function($pengeluaran){
            return Helpers::tanggal_indonesia($pengeluaran->created_at, true);
        })
        ->addColumn('nominal',function($pengeluaran){
            return 'Rp. '.Helpers::format_uang($pengeluaran->nominal);
        })
        ->addColumn('keterangan',function($pengeluaran) {
            return $pengeluaran->keterangan;
        })
        ->addColumn('Action', function ($pengeluaran){
            return '
            <a class="me-3" onclick="detailPengeluaran(`'. route('pengeluaran.detail', $pengeluaran->id) .'`)">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/eye.svg" alt="img">
        </a>
            <a class="me-3" href="'.route('pengeluaran.show', $pengeluaran->id) .'">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/edit.svg" alt="img">
        </a>
        <a class="me-3" onclick="deleteData(`'. route('pengeluaran.destroy', $pengeluaran->id) .'`)">
            <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="img">
        </a>
            ';
        })
        ->rawColumns(['Action','select_all'])
        ->make(true);

    }


    public function create() {
        $deskripsi = DeskripsiPengeluaran::all();

        return view('module.kelolakas.pengeluaran.create',compact('deskripsi'));

    }
    public function store(Request $request)
    {
        if($request->hasFile('image')){

        $filename = Str::lower(str_replace(' ', '-', $request->deskripsi_pengeluaran_id));
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'transaksi_pengeluaran_'.$filename.'_'.time().'.'.$extension;
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);
    }

        Pengeluaran::create([
            'image' =>  $request->image ?  $fileNameToStore : null,
            'deskripsi_pengeluaran_id' => $request->deskripsi_pengeluaran_id,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,

        ]);
        return redirect()->route('pengeluaran.index')->with('success','data berhasil di simpan');

    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $deskripsi = DeskripsiPengeluaran::all();

        return view('module.kelolakas.pengeluaran.edit',compact('pengeluaran','deskripsi'));
    }
    public function detailPengeluaran(Pengeluaran $pengeluaran) {

        $pengeluaran = DB::table('pengeluarans')
        ->leftJoin('deskripsi_pengeluarans', 'pengeluarans.deskripsi_pengeluaran_id','deskripsi_pengeluarans.id')
        ->where('deskripsi_pengeluarans.id',$pengeluaran->deskripsi_pengeluaran_id)
        ->first();
        $url= asset('storage/images/tenant/'.auth()->user()->current_tenant_id.'/'.$pengeluaran->image);
        $pengeluaran->image = $url;
        return response()->json($pengeluaran);
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $filename = Str::lower(str_replace(' ', '-', $request->deskripsi_pengeluaran_id));
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = 'transaksi_pengeluaran_'.$filename.'_'.time().'.'.$extension;
        $request->file('image')->storeAs('public/images/tenant/'.auth()->user()->current_tenant_id,$fileNameToStore);
        $pengeluaran->update([
            'image' => $fileNameToStore ? $fileNameToStore : $pengeluaran->image,
            'deskripsi_pengeluaran_id' => $request->deskripsi_pengeluaran_id,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
        ]);
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dirubah');

    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return response(null, 204);
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request->id as $id) {
            $pengeluaran = Pengeluaran::find($id);
            $pengeluaran->delete();
        }
        return response()->json(null, 204);
    }
}

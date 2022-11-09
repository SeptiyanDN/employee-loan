<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Channel::paginate(5);
        return ResponseFormatter::success($data,'Berhasil Mengambil Data Channel');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_channel' => "required|unique:channels"
        ]);

        $data = Channel::create([
            'nama_channel' => $request->nama_channel
        ]);

        return ResponseFormatter::success($data,'Berhasil Menambahkan Data Channel Baru');
    }


    public function show(Channel $channel)
    {
        $data = Channel::find($channel->id);
        return ResponseFormatter::success($data,'Berhasil Menampilkan Detail Data Channel');
    }


    public function update(Request $request, Channel $channel)
    {
        $request->validate([
            'nama_channel' => "required|unique:channels"
        ]);

        $channel->update([
            'nama_channel' => $request->nama_channel ?? $channel->nama_channel
        ]);

        return ResponseFormatter::success($channel,'Berhasil Mengubah Data Channel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
        return ResponseFormatter::success(null,'Berhasil Menghapus Data Channel');
    }
}

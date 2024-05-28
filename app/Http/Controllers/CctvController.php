<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CctvController extends Controller
{
    public function index()
    {
        $cctv = Cctv::all();

        return view('pages.cctv.index', compact('cctv'));
    }

    public function detailCctv($id)
    {
        $cctv = Cctv::findOrFail($id);

        return view('pages.cctv.detail', compact('cctv'));
    }

    public function create()
    {
        return view('pages.cctv.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cctv' => 'required',
            'lokasi' => 'required',
            'embed' => 'required|url',
        ], [
            'nama_cctv.required' => 'Data tidak boleh kosong',
            'lokasi.required' => 'Data tidak boleh kosong',
            'embed.required' => 'Data tidak boleh kosong',
            'embed.url' => 'Data Harus Berupa URL',
        ]);

        $attr = [
            'siteId' => 1,
            'nama_cctv' => $request->nama_cctv,
            'lokasi' => $request->lokasi,
            'embed' => $request->embed,
            'url_gambar' => $request->url_gambar,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'pemilik_cctv' => $request->pemilik_cctv,
            'tahun' => $request->tahun,
            'kategori' => $request->kategori,
            'status' => $request->status,
        ];

        $simpan = Cctv::create($attr);

        Session::flash('sukses', 'Data CCTV Berhasil Ditambahkan!');
        return redirect()->route('cctv');
    }

    public function destroy($id)
    {
        $cctv = Cctv::findOrFail($id);
        $cctv->delete();

        Session::flash('sukses', 'Data CCTV Berhasil Dihapus!');
        return redirect()->route('cctv');
    }
}

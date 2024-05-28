<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LayananController extends Controller
{

    public function index()
    {
        $layanan = Layanan::orderBy('id', 'DESC')->get();

        return view('pages.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('pages.layanan.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|unique:layanans,nama_layanan',
        ], [
            'nama_layanan.required' => 'Data tidak boleh kosong',
            'nama_layanan.unique' => 'Data sudah pernah diinputkan',
        ]);

        $attr = [
            'nama_layanan' => $request->nama_layanan
        ];

        $simpan = Layanan::create($attr);

        Session::flash('sukses', 'Data Layanan Berhasil Ditambahkan!');
        return redirect()->route('layanan');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('pages.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required',
        ], [
            'nama_layanan.required' => 'Data tidak boleh kosong',
        ]);

        $update = Layanan::findOrFail($id)->update($validated);

        Session::flash('sukses', 'Data Layanan Berhasil Dirubah!');
        return redirect()->route('layanan');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->delete();
        Session::flash('sukses', 'Data Layanan Berhasil Dihapus!');
        return redirect()->route('layanan');
    }
}

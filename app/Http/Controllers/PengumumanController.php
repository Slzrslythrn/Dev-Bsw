<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use File;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();

        return view('pages.pengumuman.index', compact('pengumuman'));
    }

    public function create()
    {
        return view('pages.pengumuman.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner' => 'required|mimes:png,jpg',
            'judul' => 'required',
            'link' => 'required|url|nullable',
            'isactive' => 'required',
        ], [
            'banner.required' => 'Data tidak boleh kosong',
            'judul.required' => 'Data tidak boleh kosong',
            'link.required' => 'Data tidak boleh kosong',
            'link.url' => 'Data Harus Berupa URL',
            'isactive.required' => 'Data tidak boleh kosong',
        ]);

        $attr = [
            'judul' => $request->judul,
            'link' => $request->link,
            'isactive' => $request->isactive,
        ];

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $ext = $file->getClientOriginalExtension();
            $newName =  date('dmY') . Str::random(10) . '.' . $ext;
            $file->move('uploads/banner', $newName);
            $attr['banner'] = $newName;
        }


        $pengumuman = Pengumuman::create($attr);

        Session::flash('sukses', 'Data Pengumuman Berhasil Ditambahkan!');
        return redirect()->route('pengumuman');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        // dd($pengumuman);

        return view('pages.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $validated = $request->validate([
            'banner' => 'nullable|mimes:png,jpg',
            'judul' => 'required',
            'link' => 'required|url|nullable',
            'isactive' => 'required',
        ], [
            'banner.required' => 'Data tidak boleh kosong',
            'judul.required' => 'Data tidak boleh kosong',
            'link.required' => 'Data tidak boleh kosong',
            'link.url' => 'Data Harus Berupa URL',
            'isactive.required' => 'Data tidak boleh kosong',
        ]);

        $attr = [
            'judul' => $request->judul,
            'link' => $request->link,
            'isactive' => $request->isactive,
        ];

        // update image if exists
        if ($request->hasFile('banner')) {
            // delete old image
            if ($pengumuman->banner) {
                File::delete('uploads/banner/' . $pengumuman->banner);
            }

            $file = $request->file('banner');
            $ext = $file->getClientOriginalExtension();
            $newName =  date('dmY') . Str::random(10) . '.' . $ext;
            $file->move('uploads/banner', $newName);
            $attr['banner'] = $newName;
        }

        $pengumuman->update($attr);

        Session::flash('sukses', 'Data Pengumuman Berhasil Dirubah!');
        return redirect()->route('pengumuman');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->banner) {
            File::delete('uploads/icons/' . $pengumuman->banner);
            // unlink(public_path('uploads/uttp/' . $item->gambar));
        }
        $pengumuman->delete();

        Session::flash('sukses', 'Data Pengumuman Berhasil Dihapus!');
        return redirect()->route('pengumuman');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\MenuLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use File;

class MenuController extends Controller
{
    public function index()
    {
        $menu = MenuLayanan::with('layanan')->orderBy('id', 'DESC')->get();

        return view('pages.menu.index', compact('menu'));
    }

    public function create()
    {
        $layanan = Layanan::all();
        return view('pages.menu.tambah', compact('layanan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id' => 'required',
            'nama' => 'required',
            'link_sso' => 'url|nullable',
            'link_website' => 'url|nullable',
            'icon' => 'required|mimes:jpg,bmp,png',
            'status' => 'required',
            'visit' => 'numeric|nullable'
        ], [
            'layanan_id.required' => 'Data tidak boleh kosong',
            'nama.required' => 'Data tidak boleh kosong',
            'link_sso.url' => 'Data harus berupa link',
            'link_website.url' => 'Data harus berupa link',
            'icon.required' => 'Data harus berupa link',
            'icon.mimes' => 'Data harus berformat: .jpg, .bmp, .png',
            'status.required' => 'Data tidak boleh kosong',
            'visit.numeric' => 'Data harus berupa angka',
        ]);

        $attr = [
            'layanan_id' => $request->layanan_id,
            'nama' => $request->nama,
            'link_sso' => $request->link_sso,
            'link_website' => $request->link_website,
            'status' => $request->status,
            'visit' => $request->visit,
        ];

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $ext = $file->getClientOriginalExtension();
            $newName =  date('dmY') . Str::random(10) . '.' . $ext;
            $file->move('uploads/icons', $newName);
            $attr['icon'] = $newName;
        }

        MenuLayanan::create($attr);

        Session::flash('sukses', 'Data Menu Berhasil Ditambahkan!');
        return redirect()->route('menu');
    }

    public function edit($id)
    {
        $menu = MenuLayanan::findOrFail($id);
        $layanan = Layanan::all();

        return view('pages.menu.edit', compact('menu', 'layanan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'layanan_id' => 'required',
            'nama' => 'required',
            'link_sso' => 'url|nullable',
            'link_website' => 'url|nullable',
            'icon' => 'nullable|mimes:jpg,bmp,png',
            'status' => 'required',
            'visit' => 'numeric|nullable'
        ], [
            'layanan_id.required' => 'Data tidak boleh kosong',
            'nama.required' => 'Data tidak boleh kosong',
            'link_sso.url' => 'Data harus berupa link',
            'link_website.url' => 'Data harus berupa link',
            'icon.mimes' => 'Data harus berformat: .jpg, .bmp, .png',
            'status.required' => 'Data tidak boleh kosong',
            'visit.numeric' => 'Data harus berupa angka',
        ]);

        $attr = [
            'layanan_id' => $request->layanan_id,
            'nama' => $request->nama,
            'link_sso' => $request->link_sso,
            'link_website' => $request->link_website,
            'status' => $request->status,
            'visit' => $request->visit,
        ];

        // update image if exists
        if ($request->hasFile('icon')) {
            $fasilitas = MenuLayanan::findOrFail($id);
            // delete old image
            if ($fasilitas->icon) {
                File::delete('uploads/icons/' . $fasilitas->icon);
                // unlink(public_path('uploads/uttp/' . $item->gambar));
            }

            $file = $request->file('icon');
            $ext = $file->getClientOriginalExtension();
            $newName =  date('dmY') . Str::random(10) . '.' . $ext;
            $file->move('uploads/icons', $newName);
            $attr['icon'] = $newName;
        }

        MenuLayanan::findOrFail($id)->update($attr);

        Session::flash('sukses', 'Data Menu Berhasil Dirubah!');
        return redirect()->route('menu');
    }

    public function destroy($id)
    {
        $menu = MenuLayanan::findOrFail($id);

        if ($menu->icon) {
            File::delete('uploads/icons/' . $menu->icon);
            // unlink(public_path('uploads/uttp/' . $item->gambar));
        }

        $menu->delete();

        Session::flash('sukses', 'Data Menu Berhasil Dihapus!');
        return redirect()->route('menu');
    }
}

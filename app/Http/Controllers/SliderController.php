<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use File;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();

        return view('pages.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('pages.slider.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slider' => 'required|mimes:png,jpg',
            'judul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required|url|nullable',
            'isactive' => 'required',
        ], [
            'banner.required' => 'Data tidak boleh kosong',
            'judul.required' => 'Data tidak boleh kosong',
            'deskripsi.required' => 'Data tidak boleh kosong',
            'link.required' => 'Data tidak boleh kosong',
            'link.url' => 'Data Harus Berupa URL',
            'isactive.required' => 'Data tidak boleh kosong',
        ]);

        $attr = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'isactive' => $request->isactive,
        ];

        if ($request->hasFile('slider')) {
            $file = $request->file('slider');
            $ext = $file->getClientOriginalExtension();
            $newName =  date('dmY') . Str::random(10) . '.' . $ext;
            $file->move('uploads/slider', $newName);
            $attr['slider'] = $newName;
        }

        $slider = Slider::create($attr);

        Session::flash('sukses', 'Data Slider Berhasil Ditambahkan!');
        return redirect()->route('slider');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('pages.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'slider' => 'nullable|mimes:png,jpg',
            'judul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required|url|nullable',
            'isactive' => 'required',
        ], [
            'banner.required' => 'Data tidak boleh kosong',
            'judul.required' => 'Data tidak boleh kosong',
            'deskripsi.required' => 'Data tidak boleh kosong',
            'link.required' => 'Data tidak boleh kosong',
            'link.url' => 'Data Harus Berupa URL',
            'isactive.required' => 'Data tidak boleh kosong',
        ]);

        $attr = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'isactive' => $request->isactive,
        ];

        // update image if exists
        if ($request->hasFile('slider')) {
            // delete old image
            if ($slider->slider) {
                File::delete('uploads/slider/' . $slider->slider);
            }

            $file = $request->file('slider');
            $ext = $file->getClientOriginalExtension();
            $newName =  date('dmY') . Str::random(10) . '.' . $ext;
            $file->move('uploads/slider', $newName);
            $attr['slider'] = $newName;
        }

        $slider->update($attr);

        Session::flash('sukses', 'Data Slider Berhasil Dirubah!');
        return redirect()->route('slider');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->banner) {
            File::delete('uploads/slider/' . $slider->banner);
            // unlink(public_path('uploads/uttp/' . $item->gambar));
        }
        $slider->delete();

        Session::flash('sukses', 'Data Slider Berhasil Dihapus!');
        return redirect()->route('slider');
    }
}

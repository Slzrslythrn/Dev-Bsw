<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cctv;

class CctvController extends Controller
{
    public function index()
    {
        $cctv = Cctv::all();

        return ResponseFormater::success($cctv, "Data Berhasil diambil");
    }

    public function show($id)
    {
        $cctv = Cctv::all()->where('id', $id)->first();;

        if ($cctv) {
            return ResponseFormater::success($cctv, "Data Berhasil diambil");
        }

        return ResponseFormater::error(null, "Data tidak ditemukan", 404);
    }
}

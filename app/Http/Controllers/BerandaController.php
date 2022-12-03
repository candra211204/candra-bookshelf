<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Pengkondisian jika cari berdasarkan kategori buku maka akan muncul berdasarkan kategori jika tidak maka akan muncul semua buku yang berstatus aktif
        if($request->has('kategori')) {
            $data = Buku::where('kategori_id', $request->kategori)->where('status', 'aktif')->get();
        }else{
            $data = Buku::where('status', 'aktif')->get();
        }

        // Ambil semua data dari tabel kategori
        $kategori = kategori::all();
        return view('beranda', compact('data', 'kategori'));
    }
}

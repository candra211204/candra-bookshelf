<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Total;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::where('status', 'aktif')->get();
        $kategori = kategori::all();
        
        return view('beranda', compact('buku', 'kategori'));
    }

    public function baca($id)
    {
        $data = Buku::findOrFail($id);
        $total = Total::where('buku_id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists();
        if(!$total){
            Total::create([
                'buku_id' => $id, 
                'user_id' => Auth::user()->id,
            ]);
        }
        return view('baca', compact('data'));
    }
}



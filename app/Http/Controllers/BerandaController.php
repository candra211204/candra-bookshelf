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
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        if($request->kategori == 'all'){
            $buku = Buku::where('status', '=', 'aktif')->get();
        }elseif($request->kategori){  
            $buku = Buku::where('kategori_id', '=', $request->kategori)->where('status', '=', 'aktif')->get();
        }
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



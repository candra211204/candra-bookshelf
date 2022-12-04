<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Total;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BacaController extends Controller
{
    public function baca($id)
    {
        $data = Buku::findOrFail($id);
        $total = Total::where('buku_id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists();
        if(!$total){
            Total::create(['buku_id' => $id, 'user_id' => Auth::user()->id]);
        }
        return view('baca', compact('data'));
    }
}

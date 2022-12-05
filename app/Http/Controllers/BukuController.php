<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ambil semua data dari tabel buku
        $data = Buku::all();
        return view('buku.tabel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ambil semua data dari tabel kategori
        $kategori = Kategori::all();
        return view('buku.tambah', ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi isi tabel buku
        $validasi = $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'cover' => 'required',
            'status' => 'required',
        ]);

        // Membuat folder untuk cover
        $file = $request->file('cover')->store('cover/buku');

        // Validasi data cover
        $validasi['cover'] = $file;
        Buku::create($validasi);
        return redirect('buku');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find id dari tabel buku
        $data = Buku::findOrFail($id);

        //Ambil semua data dari tabel kategori
        $kategori = Kategori::all();
        return view('buku.edit', compact('data', 'kategori'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find id dari tabel buku
        $data = Buku::findOrFail($id);

        //Validasi isi tabel buku
        $validasi = $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        $data->update($validasi);

        // Find id dari tabel buku
        $coverLama = Buku::where('id', $id)->first();

        // Pengkondisian, jika foto ada maka dihapus/digantikan
        if($request->file('cover')){
            $cover = public_path('storage/'.$coverLama->cover);
            if(File::exists($cover)){
                File::delete($cover);
            }
            
            // Membuat folder untuk cover
            $file = $request->file('cover')->store('cover/buku');
            $data->update([
                'cover' => $file
            ]);
        }
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find id dari tabel buku
        $data = Buku::findOrFail($id);
        
        // Find id dari tabel buku
        $coverLama = Buku::where('id', $id)->first();

        // Pengkondisian, jika foto ada maka di hapus
        $cover = public_path('storage/'.$coverLama->cover);
        if(File::exists($cover)){
            File::delete($cover);
        }
        $data->delete();
        return redirect('buku');
    }
}
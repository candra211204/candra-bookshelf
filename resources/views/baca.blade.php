@extends('layouts.app')

@section('judul', 'Halaman_Baca')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow mb-5">
            <div class="card-header">
                <h5>{{ $data->judul }}</h5>
            </div>
            <div class="card-body">
                <p><b class="me-3">Isi :</b>{{ $data->isi }}</p>
                <div class="trigerr">
                    <form action="{{ url('beranda/'.$data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="kategori_id" value="{{ $data->kategori_id }}">
                        <input type="hidden" name="judul" value="{{ $data->judul }}">
                        <input type="hidden" name="isi" value="{{ $data->isi }}">
                        <input type="hidden" name="penulis" value="{{ $data->penulis }}">
                        <input type="hidden" name="tanggal" value="{{ $data->tanggal }}">
                        <input type="hidden" name="cover" value="{{ $data->cover }}">
                        <input type="hidden" name="status" value="{{ $data->status }}">
                        <input type="text" name="total_pembaca" value="{{ $data->total_pembaca }}">
                        <button class="btn btn-outline-primary form-control" type="submit">Selesai Baca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
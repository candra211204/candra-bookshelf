@extends('layouts.app')

@section('judul', 'Edit_Data_Kategori')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow">
            <div class="card-header">
                <h5>Edit Data Kategori</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ url('/buku') }}">Kembali</a>
                <form action="{{ url('buku/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option selected>Klik untuk memilih kategori</option>
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}" @selected($data->kategori_id == $kt->id)>{{ $kt->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input class="form-control" type="text" name="judul" value="{{ $data->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <input class="form-control" type="text" name="isi" value="{{ $data->isi }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input class="form-control" type="text" name="penulis" value="{{ $data->penulis }}" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="hidden" name="total_pembaca" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input class="form-control" type="date" name="tanggal" value="{{ $data->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover</label>
                        <input class="form-control" type="file" name="cover">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak">Tidak Aktif</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
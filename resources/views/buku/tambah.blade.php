@extends('layouts.app')

@section('judul', 'Tambah_Data_Buku')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow">
            <div class="card-header">
                <h5>Tambah Data Buku</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ url('buku') }}">Kembali</a>
                <form action="{{ url('buku') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-control" name="kategori_id">
                            <option selected>Klik untuk memilih kategori</option>
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input class="form-control" type="text" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi</label>
                        <input class="form-control" type="text" name="isi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input class="form-control" type="text" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input class="form-control" type="date" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cover</label>
                        <input class="form-control" type="file" name="cover" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option selected>Klik untuk memilih status</option>
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
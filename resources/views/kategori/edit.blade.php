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
                <a class="btn btn-outline-primary mb-5" href="{{ url('kategori') }}">Kembali</a>
                <form action="{{ url('kategori/'.$data->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input class="form-control" type="text" name="nama" value="{{ $data->nama }}" required>
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
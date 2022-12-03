@extends('layouts.app')

@section('judul', 'Tabel_Kategori')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow">
            <div class="card-header">
                <h5>Tabel Kategori</h5>
            </div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ route('kategori.create') }}">Tambah data kategori</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $li)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $li->nama }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ url('kategori/'.$li->id.'/edit') }}">Edit</a>
                                <a class="btn btn-outline-danger" href="{{ url('hapusKategori/'.$li->id) }}">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('judul', 'Tabel_Buku')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow">
            <div class="card-header">
                <h5>Tabel Buku</h5>
            </div>
            <div class="card-body">
                @if (Auth::user()->role == 'admin')
                    <a class="btn btn-outline-primary mb-5" href="{{ url('buku/tambah') }}">Tambah data kategori</a>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Total Pembaca</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $li)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $li->kategori->nama }}</td>
                            <td>{{ $li->judul }}</td>
                            <td>{{ $li->isi }}</td>
                            <td>{{ $li->penulis }}</td>
                            <td>{{ $li->total_pembaca }}</td>
                            <td>{{ $li->tanggal }}</td>
                            <td>
                                {{-- Menampilkan pdf --}}
                                {{-- <iframe src="{{ asset('storage/'.$li->cover) }}" title="description"></iframe> --}}
                                <img src="{{ asset('storage/'.$li->cover) }}" alt="" width="100">
                            </td>
                            <td>{{ $li->status }}</td>
                            @if (Auth::user()->role == 'editor' && 'user')
                                <td>
                                    <p>Anda harus login sebagai Admin agar bisa edit, hapus dan tambah buku</p>
                                </td>
                            @endif
                            @if (Auth::user()->role == 'admin')
                                <td>
                                    <a class="btn btn-outline-primary" href="{{ url('edit/'.'buku/'.$li->id) }}">Edit</a>
                                    <a class="btn btn-outline-danger" href="{{ url('buku/'.$li->id) }}">Hapus</a>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
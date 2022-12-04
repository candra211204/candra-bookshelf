@extends('layouts.app')

@section('judul', 'Beranda')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mb-5">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih Kategori
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('/beranda') }}">All</a></li>
                    @foreach ($kategori as $kt)
                        <li><a class="dropdown-item" href="{{ url('beranda?kategori='.$kt->id) }}">{{ $kt->nama }}</a></li>
                    @endforeach
                </ul>
            </div>  
        </div>
        <div class="row">
            @foreach ($data as $li)
            <div class="col-md-4">
                <div class="card shadow mb-5">
                    <div class="card-header">
                        <h5>{{ $li->judul }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row p-5">
                            <img class="justify-content-center" src="{{ asset('storage/'.$li->cover) }}" alt="" width="300" height="300">
                        </div>
                        <hr>
                        <h6><b class="me-2">Kategori :</b>{{ $li->kategori->nama }}</h6>
                        <h6><b class="me-2">Penulis :</b>{{ $li->penulis }}</h6>
                        <h6><b class="me-2">Total Pembaca :</b>{{ $li->total_pembaca }}</h6>
                        <h6><b class="me-2">Tanggal ditambahkan :</b>{{ $li->tanggal }}</h6>
                        <div class="baca mt-5">
                            <a class="btn btn-outline-primary form-control" href="{{ url('baca/'.$li->id) }}">Baca Buku</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
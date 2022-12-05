@extends('layouts.app')

@section('judul', 'Beranda')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Filter --}}
        <form class="mb-5" action="" method="GET">
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control" name="kategori">
                        <option value="all">All</option>
                        @foreach ($kategori as $kt)
                            <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        {{-- Filter End --}}
        <div class="row">
            @foreach ($buku as $li)
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
                        <h6><b class="me-2">Kategori :</b>{{ $li->kategori->nama}}</h6>
                        <h6><b class="me-2">Penulis :</b>{{ $li->penulis }}</h6>
                        <h6><b class="me-2">Tanggal ditambahkan :</b>{{ $li->tanggal }}</h6>
                        @if (Auth::user())
                            @if(DB::table('totals')->where('buku_id', '=', $li->id)->where('user_id', '=', Auth::user()->id)->exists()) 
                                <h6><b class="me-2">Status :</b>Terbaca</h6>
                            @else
                                <h6><b class="me-2">Status :</b>Belum Terbaca</h6>
                            @endif
                        @endif
                        <h6><b class="me-2">Total Pembaca :</b>{{ DB::table('totals')->where('buku_id', '=', $li->id)->count() }}</h6>
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
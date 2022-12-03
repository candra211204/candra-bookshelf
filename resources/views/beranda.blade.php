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
                    @foreach ($kategori as $kt)
                        <li><a class="dropdown-item" href="{{ url('beranda?kategori='.$kt->id) }}">{{ $kt->nama }}</a></li>
                    @endforeach
                </ul>
            </div>  
        </div>
        @foreach ($data as $li)
        <div class="card">
            <div class="card-header">
                <h5>{{ $li->judul }}</h5>
            </div>
            <div class="card-body">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
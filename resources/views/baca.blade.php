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
                <a class="btn btn-outline-primary form-control" href="{{ url('beranda') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
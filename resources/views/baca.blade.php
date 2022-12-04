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
                {{-- <div class="trigerr">
                    <form action="{{ url('beranda') }}" method="POST">
                        @csrf
                        <input type="text" name="user_id" value="{{ $user->id }}">
                        <input type="text" name="buku_id" value="{{ $buku->id }}">
                        <input type="text" name="status" value="sudah_dibaca">
                        <button class="btn btn-outline-primary form-control" type="submit">Selesai Baca</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
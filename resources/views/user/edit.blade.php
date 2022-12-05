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
                <a class="btn btn-outline-primary mb-5" href="{{ url('user') }}">Kembali</a>
                <form action="{{ url('user/'.$data->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ $data->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $data->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-control" name="role">
                            <option value="editor">Editor</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="banned">Tidak</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
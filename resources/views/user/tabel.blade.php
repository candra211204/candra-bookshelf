@extends('layouts.app')

@section('judul', 'Tabel_User')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card shadow">
            <div class="card-header">
                <h5>Tabel User</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $li)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $li->name }}</td>
                            <td>{{ $li->email }}</td>
                            <td>{{ $li->role }}</td>
                            <td>{{ $li->status }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ url('user/'.$li->id.'/edit') }}">Edit</a>
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
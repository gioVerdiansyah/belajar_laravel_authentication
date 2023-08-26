@extends('layouts.app')
@section('title', 'Show data Mahasiswa')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-4 d-flex justify-content-between align-items-center">
                <h2>Info Jurusan {{$jurusan->nama_jurusan}}</h2>
                <div class="d-flex">
                    <a
                        href="{{ route('home') }}"
                        class="btn btn-success"
                        >Home</a
                    >
                    <a
                        href="{{ route('jurusan.edit', ['jurusan' => $jurusan->id]) }}"
                        class="btn btn-primary ms-3 me-3"
                        >Edit</a
                    >
                    <form
                        action="{{ route('jurusan.destroy', ['jurusan' => $jurusan->id]) }}"
                        method="POST"
                    >
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Hapus
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
            <hr />

            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('message')}}
            </div>

            @endif

            <ul>
                <li>Nama Jurusan: {{$jurusan->nama_jurusan}}</li>
                <li>Nama Dekan: {{$jurusan->nama_dekan}}</li>
                <li>Jumlah Mahasiswa: {{$jurusan->jumlah_mahasiswa}}</li>
            </ul>
        </div>
    </div>
</div>
@endsection

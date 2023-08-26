@extends('layouts.app')

@section('content')
        <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div
                    class="py-4 d-flex justify-content-between align-items-center"
                >
                    <h1 class="h2">Tabel Jurusan</h1>
                    @can('create', App\Models\Jurusan::class)
                    {{-- hanya bisa dilihat oleh policy yg sudah ditentukan --}}
                    {{-- Ada yang sebaliknya yaitu @cannot() hanya bisa dilihat oleh yang tidak memiliki akses --}}
                    <a
                        href="{{route('jurusan.create')}}"
                        class="btn btn-primary"
                    >
                        Tambah Jurusan
                    </a>
                    @endcan
                </div>
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message')}}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Jurusan</th>
                            <th>Nama Dekan</th>
                            <th>Jumlah Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurusans as $jurusan)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>
                                @can('view', $jurusan)
                                <a
                                    href="{{ route('jurusan.show', ['jurusan' => $jurusan->id]) }}"
                                >
                                    {{$jurusan->nama_jurusan}}
                                </a>
                                @endcan
                                @cannot('view', $jurusan)
                                    <p>{{$jurusan->nama_jurusan}}</p>
                                @endcannot
                            </td>
                            <td>{{$jurusan->nama_dekan}}</td>
                            <td>{{$jurusan->jumlah_mahasiswa}}</td>
                        </tr>
                        @empty
                        <td colspan="6" class="text-center">
                            Tidak ada data...
                        </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
     </div>
@endsection

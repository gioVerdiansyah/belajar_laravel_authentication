@extends('layouts.app')
@section('title', $judul)


@section('content')
<main class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $judul }}</div>
                    <div class="card-body">
                        <p class="m-0">test... test...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

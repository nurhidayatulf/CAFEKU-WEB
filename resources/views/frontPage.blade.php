@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Daftar Menu</h2>
        @foreach ($data as $list)
        <div class="col-3 mt-2">
            <div class="card ms-3" style="width: 17rem; height: 400px;">
                <img src="{{ asset('storage/'. $list->foto) }}" class="card-img-top" alt="" width="100px">
                <div class="card-body">
                    <h5 class="card-title">{{ $list->nama }}</h5>
                    <h5 class="card-text">{{ $list->harga }}</h5>
                    <p class="card-text">{{ $list->keterangan }}</p>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection
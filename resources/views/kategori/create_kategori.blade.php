@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Kategori</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('index_kategori') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="Nama" class="col-md-4 col-form-label text-md-end">Nama Kategori</label>
                            <div class="col-md-6">
                                <input id="Nama" type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama" value="{{ old('Nama') }}" required autofocus>
                                @error('Nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

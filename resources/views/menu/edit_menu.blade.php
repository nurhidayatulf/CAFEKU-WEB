@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Menu</div>

                <div class="card-body">
                    <form method="POST" action="/index_menu/{{ $data->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}" required autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-end">Foto</label>
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/'.$data->foto) }}" alt="" style="width: 153px;">
                                    <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ $data->foto }}" autofocus>
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="harga" class="col-md-4 col-form-label text-md-end">Harga</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ $data->harga }}" required autofocus>

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-end">Keterangan</label>
                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ $data->keterangan }}" required autofocus>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Kategori Menu</label>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori_id">
                                    <option selected value="" disabled>--Pilih Kategori--</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}" @selected($data->kategori->id==$item->id)>{{ $item->Nama }}</option>
                                    @endforeach
                                </select>
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

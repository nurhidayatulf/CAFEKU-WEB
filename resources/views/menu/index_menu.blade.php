@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Menu</div>

                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Harga</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Keterangan</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategori</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $list)
                                <tr>
                                    <th class="align-middle text-xs font-weight-bold mb-0" scope="row">{{ $loop->iteration }}</th>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->nama }}</p>
                                    </td>
                                    <td><img src="{{ asset('storage/'.$list->foto) }}" alt="" width="100px"></td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->harga }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->keterangan }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-xs font-weight-bold mb-0">{{ $list->kategori->Nama }}</p>
                                    </td>
                                    <td>
                                        <a href="edit_menu/{{ $list->id }}" class="btn bg-warning text-uppercase text-white text-xxs font-weight-bolder ms-3">Edit</a>
                                        |
                                        <a href="delete_menu/{{ $list->id }}" class="btn bg-danger text-uppercase text-white text-xxs font-weight-bolder ms-3" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                                <a href="{{ url('create_menu') }}" class="btn bg-primary text-white text-uppercase text-xxs font-weight-bolder ms-3" type="button">Tambah Data</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
            <div class="card-header">
                <h5>Detail Order</h5>
            </div>
            <div class="card-body">
            <form action="{{ url('dashboardAdmin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Daftar Order</label>
                    <input type="text" class="form-control" name="daftarOrder">
                    <small>Pisahkan nama menu yang diorder dengan tanda koma (,)</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="member">Member</option>
                        <option value="biasa">Biasa</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Order</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($data)
                    <tr>
                        <td>Nama</td>
                        <td>{{ $data['nama']}}</td>  
                    </tr>
                    <tr>
                        <td>Jumlah Pesanan</td>
                        <td>{{ $data['jumlahOrder']}}</td>  
                    </tr>
                    <tr>
                        <td>Total Pesanan</td>
                        <td>{{ $data['totalOrder']}}</td>  
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $data['status']}}</td>  
                    </tr>
                    <tr>
                        <td>Diskon</td>
                        <td>{{ $data['diskon']}}</td>  
                    </tr>
                    <tr>
                        <td>Total Pembayaran</td>
                        <td>{{ $data['totalPembayaran']}}</td>  
                    </tr>
                    @endisset
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
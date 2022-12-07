<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data dari database pada halaman dashboardAdmin
        return view('dashboardAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data yang telah diinput oleh user pada data form

        //deklarasi variabel
        $daftarOrder = explode(',', $request->daftarOrder);
        $status = $request->status;
        $jumlahOrder = count($daftarOrder);
        $totalOrder = $jumlahOrder * 20000;

        $order = new Pembayaran;
        $bayar = $order->bayar($status, $totalOrder);

        //menampilkan array data 
        $data = [
            'nama' => $request->nama,
            'jumlahOrder' => $jumlahOrder,
            'totalOrder' => $totalOrder,
            'status' => $status,
            'diskon' => $order->diskon($status, $totalOrder),
            'totalPembayaran' => $bayar
        ];
        return view('dashboardAdmin',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

//membuat sebuah interface payung dengan method diskon()
interface Order{
    public function diskon($status,$totalOrder);
}

//mengambil implementasi interface Order untuk diterapkan pada class Diskon untuk cek status dan diskon yang didapat
class Diskon implements Order{
    public function diskon($status,$totalOrder)
    {
        if($status == 'member' && $totalOrder >=100000){
            return $totalOrder * (20/100);
        }elseif($status == 'member' && $totalOrder < 100000){
            return $totalOrder * (10/100);
        }else{
            return $totalOrder * 0;
        }
    }
}

//membuat inheritance dari class Diskon untuk diterapkan pada class Pembayaran
class Pembayaran extends Diskon{
    public function bayar($status,$totalOrder)
    {
        return (int)$totalOrder - (int)$this->diskon($status,$totalOrder);
    }
}
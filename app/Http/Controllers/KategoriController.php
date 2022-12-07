<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data kategori dari database pada halaman index_kategori
        $data = Kategori::all();

        return view('kategori.index_kategori', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan pada halaman form create_kategori (membuat/ menambahkan kategori baru)
        $data = Kategori::all();
        
        return view('kategori.create_kategori', compact ('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data kategori baru yang sudah diinput ke dalam database
        $validator = $request->validate([
            'Nama' => 'required'
        ]);
        
        Kategori::create($validator);
        return redirect('index_kategori')->with('success', 'Data berhasil disimpan!');
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
        //mengarahkan pada halaman form untuk mengedit kategori (edit_kategori) berdasarkan id yang dipilih
        $data = Kategori::findOrFail($id);

        return view('kategori.edit_kategori', compact('data'));
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
        //mengupdate data kategori pada database sesuai dengan perubahan yang dilakukan pada halaman edit_kategori
        $data = Kategori::findOrFail($id);
        
        $data->update($request->all());

        return redirect('index_kategori')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data kategori berdasarkan id pada database
        $data = Kategori::findOrFail($id);
        $data->delete();
        return redirect('index_kategori')->with('success', 'Data berhasil dihapus!');
    }
}
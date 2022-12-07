<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data menu dari database pada halaman index_menu
        $data = Menu::all();
        
        return view('menu.index_menu', compact ('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan pada halaman form create_menu (membuat/ menambahkan menu baru)
        $data = Menu::all();
        $kategori = Kategori::all();
        
        return view('menu.create_menu', compact ('data', 'kategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data menu baru yang sudah diinput pada form create_menu ke dalam database
        // dd($request);
        $validator = $request->validate([
            'nama' => 'required',
            'foto' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
        ]);
        $validator['foto'] = Storage::put('img', $request->file('foto'));
        // dd($validator);
        Menu::create($validator);
        
        return redirect('index_menu')->with('success', 'Data berhasil disimpan!');
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
        //mengarahkan pada halaman form untuk mengedit menu (edit_menu) berdasarkan id yang dipilih
        $data = Menu::findOrFail($id);
        $kategori = Kategori::all();

        return view('menu.edit_menu', [
            'data' => $data,
            'kategori' => $kategori
        ]);
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
        //mengupdate data menu pada database sesuai dengan perubahan yang dilakukan pada halaman edit_menu
        $data = Menu::find($id);
        $validator = $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'kategori_id' => 'required',
        ]);
        
        try {
            $validator['foto'] = Storage::put('img', $request->file('foto'));
            $data->update($validator);
        } catch (\Throwable $th) {
            $validator['foto'] = $data->foto;
            $data->update($validator);
        }
        return redirect('index_menu')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data menu berdasarkan id pada database
        $data = Menu::findOrFail($id);
        $data->delete();

        return redirect('index_menu')->with('success', 'Data Berhasil Dihapus');
    }

    public function frontPage ()
    {
        $data = Menu::all();
        
        return view('frontPage', compact ('data'));
    }
}   
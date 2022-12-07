<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data user dari database pada halaman index_user
        $data = User::all();

        return view('user.index_user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan pada halaman form create_user (membuat/ menambahkan user/akun baru)
        $data = User::all();

        return view('user.create_user', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data akun baru yang sudah diinput pada form create_user ke dalam database
        // dd($request);
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        $validator['password'] = Hash::make($request->password);
        
        User::create($validator);
        return redirect('index_user')->with('success', 'Data berhasil disimpan!');
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
        //mengarahkan pada halaman form untuk mengedit data user/akun (edit_user) berdasarkan id yang dipilih
        $data = User::findOrFail($id);

        return view('user.edit_user', compact('data'));
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
        //mengupdate data user pada database sesuai dengan perubahan yang dilakukan pada halaman edit_user
        $data = User::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        if ($request->password){
            $validator['password'] = Hash::make($request->password);
            $data->update($validator);
        } else {
            return redirect('index_user');
        }
        
        return redirect('index_user')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data user berdasarkan id pada database
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('index_user')->with('success', 'Data berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'dataPengguna' => Pengguna::all()
        ];

        return view('pages.pengguna.tampil-pengguna', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pengguna.tambah-pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $nama = $request->nama;
        $umur = $request->umur;
        $alamat = $request->alamat;
        $status = $request->status;
        $email = $request->email;
        $password = $request->password;

        try {
            $pengguna = new Pengguna();
            $pengguna->nama = $nama;
            $pengguna->umur = $umur;
            $pengguna->alamat = $alamat;
            $pengguna->status = $status;
            $pengguna->email = $email;
            $pengguna->password = bcrypt($password);
            $pengguna->save();

            $request->session()->flash('msg', "Data dengan nama $nama berhasil tersimpan!");
            return redirect('pengguna/tambah-pengguna');
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Pengguna::find($id)->delete();
        return redirect()->back();
    }
}

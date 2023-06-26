<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use PDF;

class PenggunaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(Pengguna::whereIn('status', ['apoteker'])->get())->toJson();
    }
    return view('pages.pengguna.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.pengguna.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate(
      [
        'nama' => 'required',
        'umur' => 'numeric',
        'alamat' => 'string',
        'no_telepon' => 'numeric',
        'status' => 'required',
        'email' => 'required|email',
        'password' => 'required',
      ],
      [
        'nama.required' => 'Nama Pengguna wajib diisi',
        'status.required' => 'Status Pengguna wajib diisi',
        'email.required' => 'Email Pengguna wajib diisi',
        'password.required' => 'Password Pengguna wajib diisi',
      ]
    );

    $nama = $request->nama;
    $umur = $request->umur;
    $alamat = $request->alamat;
    $no_telepon = $request->no_telepon;

    $status = $request->status;
    $email = $request->email;
    $password = $request->password;

    try {
      $pengguna = new Pengguna();
      $pengguna->nama = $nama;
      $pengguna->umur = $umur;
      $pengguna->no_telepon = $no_telepon;
      $pengguna->alamat = $alamat;

      $pengguna->status = $status;
      $pengguna->email = $email;
      $pengguna->password = bcrypt($password);
      $pengguna->save();

      // $request->session()->flash('msg', "Data dengan nama $nama berhasil ditambahkan!");
      // return redirect('pengguna')->with('msg', "Data dengan nama $nama berhasil ditambahkan!");
      return redirect()->to('pengguna')->with('msg-success', 'Berhasil menambahkan data');
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
    return view('pages.pengguna.show', compact('pengguna'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pengguna  $pengguna
   * @return \Illuminate\Http\Response
   */
  public function edit(Pengguna $pengguna)
  {
    return view('pages.pengguna.edit', compact('pengguna'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pengguna  $pengguna
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'nama' => 'required',
      'umur' => 'numeric',
      'alamat' => 'string',
      'no_telepon' => 'numeric',
      'status' => 'required',
      'email' => 'required|email',
      'password' => 'required',
    ], [
      'nama.required' => 'Nama Pengguna wajib diisi',
      'umur.required' => 'Umur Pengguna wajib diisi',
      'alamat.required' => 'Alamat Pengguna wajib diisi',
      'status.required' => 'Status Pengguna wajib diisi',
      'email.required' => 'Email Pengguna wajib diisi',
    ]);

    try {
      $pengguna = Pengguna::findOrFail($id);
      $pengguna->nama = $request->nama;
      $pengguna->umur = $request->umur;
      $pengguna->no_telepon = $request->no_telepon;

      $pengguna->alamat = $request->alamat;
      $pengguna->status = $request->status;
      $pengguna->email = $request->email;
      $pengguna->save();

      return redirect()->route('pengguna.index')->with('msg-success', 'Berhasil mengubah data');
    } catch (\Throwable $th) {
      echo $th;
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pengguna  $pengguna
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pengguna $pengguna)
  {
    if (Pengguna::count() == 1 && $pengguna->status == 'apoteker') {
      return back()->with('msg-error', 'Gagal menghapus data pengguna. Pengguna merupakan apoteker master' . $pengguna->nama);
    }
    $pengguna->delete();
    return redirect()->route('pengguna.index')->with('msg-success', 'Berhasil menghapus data pengguna ' . $pengguna->nama);
  }

  public function cetak_pdf()
  {
    $pengguna = Pengguna::all();
    $pdf = PDF::loadview('pages.pengguna.pengguna_pdf', ['pengguna' => $pengguna]);
    return $pdf->stream();
  }

  public function getCustomer()
  {
    return DataTables::of(Pengguna::where('status', 'customer')->get())->toJson();
  }
  public function getDokter()
  {
    return DataTables::of(Pengguna::where('status', 'dokter')->get())->toJson();
  }
}

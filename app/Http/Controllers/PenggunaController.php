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
    // $data=[
    //     'dataPengguna' => Pengguna::all()
    // ];

    // return view('pages.pengguna.tampil-pengguna', $data);

    if ($request->ajax()) {
      return DataTables::of(Pengguna::query())->toJson();
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
        'umur' => 'required',
        'alamat' => 'required',
        'status' => 'required',
        'email' => 'required',
        'password' => 'required',
      ],
      [
        'nama.required' => 'Nama Pengguna wajib diisi',
        'umur.required' => 'Umur Pengguna wajib diisi',
        'alamat.required' => 'Alamat Pengguna wajib diisi',
        'status.required' => 'Status Pengguna wajib diisi',
        'email.required' => 'Email Pengguna wajib diisi',
        'password.required' => 'Password Pengguna wajib diisi',
      ]
    );

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

      // $request->session()->flash('msg', "Data dengan nama $nama berhasil ditambahkan!");
      // return redirect('pengguna')->with('msg', "Data dengan nama $nama berhasil ditambahkan!");
      return redirect()->to('pengguna')->with('msg-success', 'Berhasil menambahkan data');
    } catch (\Throwable $th) {
      echo $th;
    }

    // $data = [
    //     'nama' => $request->nama,
    //     'umur' => $request->umur,
    //     'alamat' => $request->alamat,
    //     'status' => $request->status,
    //     'email' => $request->email,
    //     'password' => $request->password,
    // ];
    // Pengguna::create($data);
    // return redirect()->to('obat')->with('msg-success', 'Berhasil menambahkan data');
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
    $request->validate(
      [
        'nama' => 'required',
        'umur' => 'required',
        'alamat' => 'required',
        'status' => 'required',
        'email' => 'required|unique:pengguna,email',
        'password' => 'required',
      ],
      [
        'nama.required' => 'Nama Pengguna wajib diisi',
        'umur.required' => 'Umur Pengguna wajib diisi',
        'alamat.required' => 'Alamat Pengguna wajib diisi',
        'status.required' => 'Status Pengguna wajib diisi',
        'email.required' => 'Email Pengguna wajib diisi',
        'email.unique' => 'Email Pengguna yang diisikan sudah ada dalam database',
        'password.required' => 'Password Pengguna wajib diisi',
      ]
    );

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

      // $request->session()->flash('msg', "Data dengan nama $nama berhasil ditambahkan!");
      // return redirect('pengguna')->with('msg', "Data dengan nama $nama berhasil ditambahkan!");
      return redirect()->to('pengguna')->with('msg-success', 'Berhasil melakukan update data');
    } catch (\Throwable $th) {
      echo $th;
    }

    // $data = [
    //     'nama_obat' => $request->nama_obat,
    //     'jenis_obat' => $request->jenis_obat,
    // ];
    // Pengguna::where('id_obat',$id)->update($data);
    // return redirect()->to('obat')->with('msg-success', 'Berhasil melakukan update data');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pengguna  $pengguna
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pengguna $pengguna)
  {
    if (Pengguna::count() == 1 && $pengguna->status == 'admin') {
      return back()->with('msg-error', 'Gagal menghapus data pengguna. Pengguna merupakan admin master' . $pengguna->nama);
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

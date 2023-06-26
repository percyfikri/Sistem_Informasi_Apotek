<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use PDF;

class DokterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
if ($request->ajax()) {
      return DataTables::of(Pengguna::where('status', 'dokter')->get())->toJson();
    }
    return view('pages.dokter.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.dokter.create');
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
      ],
      [
        'nama.required' => 'Nama Pengguna wajib diisi',
        'umur.required' => 'Umur Pengguna wajib diisi',
        'alamat.required' => 'Alamat Pengguna wajib diisi',
        'status.required' => 'Status Pengguna wajib diisi',
        'email.required' => 'Email Pengguna wajib diisi',
      ]
    );

    $nama = $request->nama;
    $umur = $request->umur;
    $alamat = $request->alamat;
    $status = $request->status;
    $email = $request->email;
    $password = null;

    try {
      $dokter = new Pengguna();
      $dokter->nama = $nama;
      $dokter->umur = $umur;
      $dokter->alamat = $alamat;
      $dokter->status = $status;
      $dokter->email = $email;
      $dokter->password = bcrypt($password);
      $dokter->save();

      // $request->session()->flash('msg', "Data dengan nama $nama berhasil ditambahkan!");
      // return redirect('pengguna')->with('msg', "Data dengan nama $nama berhasil ditambahkan!");
      return redirect()->to('dokter')->with('msg-success', 'Berhasil menambahkan data');
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
  public function show(Pengguna $dokter)
  {
    return view('pages.dokter.show', compact('dokter'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pengguna  $pengguna
   * @return \Illuminate\Http\Response
   */
  public function edit(Pengguna $dokter)
  {
    return view('pages.dokter.edit', compact('dokter'));
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
        'email' => 'required|unique:dokter,email',
      ],
      [
        'nama.required' => 'Nama Dokter wajib diisi',
        'umur.required' => 'Umur Dokter wajib diisi',
        'alamat.required' => 'Alamat Dokter wajib diisi',
        'status.required' => 'Status Dokter wajib diisi',
        'email.required' => 'Email Dokter wajib diisi',
        'email.unique' => 'Email Dokter yang diisikan sudah ada dalam database',
      ]
    );

    $nama = $request->nama;
    $umur = $request->umur;
    $alamat = $request->alamat;
    $status = $request->status;
    $email = $request->email;
    $password = null;

    try {
      $dokter = new Pengguna();
      $dokter->nama = $nama;
      $dokter->umur = $umur;
      $dokter->alamat = $alamat;
      $dokter->status = $status;
      $dokter->email = $email;
      $dokter->password = bcrypt($password);
      $dokter->save();

      // $request->session()->flash('msg', "Data dengan nama $nama berhasil ditambahkan!");
      // return redirect('pengguna')->with('msg', "Data dengan nama $nama berhasil ditambahkan!");
      return redirect()->to('dokter')->with('msg-success', 'Berhasil melakukan update data');
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
  public function destroy(Pengguna $dokter)
  {
    $dokter->delete();
    return redirect()->route('dokter.index')->with('msg-success', 'Berhasil menghapus data dokter ' . $dokter->nama);
  }

  public function cetak_pdf()
  {
    $customer = Pengguna::all();
    $pdf = PDF::loadview('pages.dokter.dokter_pdf', ['customer' => $customer]);
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

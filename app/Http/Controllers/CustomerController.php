<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use PDF;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      return DataTables::of(Pengguna::where('status', 'customer')->get())->toJson();
    }
    return view('pages.customer.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.customer.create');
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
        // 'umur' => 'required',
        // 'alamat' => 'required',
        'status' => 'required',
        // 'email' => 'required',
      ],
      [
        'nama.required' => 'Nama Customer wajib diisi',
        // 'umur.required' => 'Umur Customer wajib diisi',
        // 'alamat.required' => 'Alamat Customer wajib diisi',
        // 'status.required' => 'Status Customer wajib diisi',
        // 'email.required' => 'Email Customer wajib diisi',
      ]
    );

    $nama = $request->nama;
    $umur = $request->umur;
    $alamat = $request->alamat;
    $status = $request->status;
    $email = $request->email;
    $no_telepon = $request->no_telepon;
    $password = null;

    try {
      $customer = new Pengguna();
      $customer->nama = $nama;
      $customer->umur = $umur;
      $customer->no_telepon = $no_telepon;
      $customer->alamat = $alamat;
      $customer->status = $status;
      $customer->email = $email;
      $customer->password = bcrypt($password);
      $customer->save();

      // $request->session()->flash('msg', "Data dengan nama $nama berhasil ditambahkan!");
      // return redirect('pengguna')->with('msg', "Data dengan nama $nama berhasil ditambahkan!");
      return redirect()->to('customer')->with('msg-success', 'Berhasil menambahkan data');
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
  public function show(Pengguna $customer)
  {
    return view('pages.customer.show', compact('customer'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pengguna  $pengguna
   * @return \Illuminate\Http\Response
   */
  public function edit(Pengguna $customer)
  {
    return view('pages.customer.edit', ['customer' => $customer]);
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
      // 'umur' => 'required',
      // 'alamat' => 'required',
      'status' => 'required',
      // 'email' => 'required',
    ], [
      'nama.required' => 'Nama Customer wajib diisi',
      // 'umur.required' => 'Umur Customer wajib diisi',
      // 'alamat.required' => 'Alamat Customer wajib diisi',
      // 'status.required' => 'Status Customer wajib diisi',
      // 'email.required' => 'Email Customer wajib diisi',
    ]);

    try {
      $customer = Pengguna::findOrFail($id);
      $customer->nama = $request->nama;
      $customer->umur = $request->umur;
      $customer->no_telepon = $request->no_telepon;
      $customer->alamat = $request->alamat;
      $customer->status = $request->status;
      $customer->email = $request->email;
      $customer->save();

      return redirect()->route('customer.index')->with('msg-success', 'Berhasil mengubah data');
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
  public function destroy(Pengguna $customer)
  {
    $customer->delete();
    return redirect()->route('customer.index')->with('msg-success', 'Berhasil menghapus data pengguna ' . $customer->nama);
  }

  public function cetak_pdf()
  {
    $customer = Pengguna::all();
    $pdf = PDF::loadview('pages.customer.customer_pdf', ['customer' => $customer]);
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

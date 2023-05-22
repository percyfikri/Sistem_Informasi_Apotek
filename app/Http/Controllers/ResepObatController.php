<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResepObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(ResepObat::with('customer', 'dokter')->get())->toJson();
        }
        return view('pages.resep-obat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resepObat = ResepObat::all();
        $dokters = Pengguna::where('status', 'dokter')->get();
        $customers = Pengguna::where('status', 'customer')->get();
        return view('pages.resep-obat.create', compact(['dokters', 'customers', 'resepObat']));
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
                'nama_resep' => 'required|unique:obat,nama_obat',
                'id_customer' => 'required',
                'id_dokter' => 'required',
                'status' => 'required',
                'deskripsi' => 'required',

            ],
            [
                'nama_resep.required' => 'Nama Resep wajib diisi',
                'id_customer.required' => 'Nama Customer wajib diisi',
                'id_dokter.required' => 'Nama Dokter wajib diisi',
                'status.required' => 'Status wajib diisi',
                'deskripsi.required' => 'Mohon diisi terlebih dahulu pada kolom Deskripsi',
            ]
        );
        $resepObat = new ResepObat;
        $resepObat->nama_resep = $request->get('nama_resep');
        $resepObat->deskripsi = $request->get('deskripsi');
        $resepObat->tanggal = $request->get('tanggal');
        $resepObat->status = $request->get('status');

        $customer = new Pengguna;
        $customer->id_pengguna = $request->get('id_customer');

        $dokter = new Pengguna;
        $dokter->id_pengguna = $request->get('id_dokter');

        $resepObat->customer()->associate($customer);
        $resepObat->dokter()->associate($dokter);
        $resepObat->save();
        return redirect()->route('resep-obat.index')->with('msg-success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function show($id_resep)
    {
        $resepObat = ResepObat::with('customer', 'dokter')->where('id_resep', $id_resep)->first();
        return view('pages.resep-obat.show', ['resepObat' => $resepObat]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function edit(ResepObat $resepObat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResepObat $resepObat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResepObat $resepObat)
    {
        //
    }
}

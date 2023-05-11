<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Pengguna;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Penjualan::with('customer','apoteker','jasa')->get())->toJson();
            // return DataTables::of(Pengguna::with('customer','apoteker')->get())->toJson();
            // return DataTables::of(Jasa::query())->toJson();
        }
        return view('pages.penjualan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show($id_penjualan)
    {
        $penjualan = Penjualan::with('customer','apoteker','jasa')->where('id_penjualan', $id_penjualan)->first();
        return view('pages.penjualan.show', ['penjualan' => $penjualan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_penjualan)
    {
        $penjualan = Penjualan::with('customer','apoteker','jasa')->where('id_penjualan', $id_penjualan)->first();
        return view('pages.penjualan.edit', compact('penjualan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('msg-success', 'Berhasil menghapus data penjualan ' . $penjualan->id_penjualan);
    }
}

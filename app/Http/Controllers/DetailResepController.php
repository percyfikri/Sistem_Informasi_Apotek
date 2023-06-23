<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Obat;
use App\Models\Racikan;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DetailResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id_resep)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_resep)
    {
        $obat = Obat::all();
        $racikan = Racikan::all();
        $detailResep = DetailResep::with('resep')->where('id_resep', $id_resep)->first();
        return view('pages.detail-resep.create', compact('detailResep', 'obat', 'racikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_resep)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'id_obat' => 'required',
            'id_racikan' => 'required',
            'kuantitas' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
        ]);

        // Simpan data resep obat ke database
        $detailResep = new DetailResep();
        $detailResep->id_resep = $id_resep;
        $detailResep->id_obat = $request->input('id_obat');
        $detailResep->id_racikan = $request->input('id_racikan');
        $detailResep->kuantitas = $request->input('kuantitas');
        $detailResep->satuan = $request->input('satuan');
        $detailResep->harga = $request->input('harga');
        $detailResep->save();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('detail-resep.show', $detailResep->id_resep)->with('success', 'Detail Resep Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailResep  $detailResep
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id_resep)
    {
        $resepObat = ResepObat::where('id_resep', $id_resep)->first();
        if ($request->ajax()) {
            return DataTables::of(DetailResep::with('resep', 'obat', 'racikan')->where('id_resep', $id_resep)->get())->toJson();
        }
        return view('pages.detail-resep.index', compact('resepObat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailResep  $detailResep
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailResep $detailResep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailResep  $detailResep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailResep $detailResep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailResep  $detailResep
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailResep $detailResep)
    {
        //
    }
}

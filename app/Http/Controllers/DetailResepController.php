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
    public function index()
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

    public function store1(Request $request)
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
        // $detailResep->id_resep = $id_resep;
        $detailResep->id_obat = $request->input('id_obat');
        $detailResep->id_racikan = $request->input('id_racikan');
        $detailResep->kuantitas = $request->input('kuantitas');
        $detailResep->satuan = $request->input('satuan');
        $detailResep->harga = $request->input('harga');

        $resep = new ResepObat();
        $resep->id_resep = $request->get('id_resep');
        $detailResep->resep()->associate($resep);

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
    public function edit($id_resep, $id_detail)
    {
        $obat = Obat::all();
        $racikan = Racikan::all();
        $detailResep = DetailResep::find($id_detail);
        return view('pages.detail-resep.edit', compact('detailResep', 'obat', 'racikan',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailResep  $detailResep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_resep, $id_detail)
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
        $detailResep = DetailResep::find($id_detail);
        // $detailResep = new DetailResep();

        // $detailResep->id_resep = $id_resep;
        $detailResep->id_obat = $request->id_obat;
        $detailResep->id_racikan = $request->id_racikan;
        $detailResep->kuantitas = $request->kuantitas;
        $detailResep->satuan = $request->satuan;
        $detailResep->harga = $request->harga;
        $detailResep->save();
        
        // Redirect ke halaman yang diinginkan
        return redirect()->route('detail-resep.show', $detailResep->id_resep)->with('success', 'Detail Resep Obat berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailResep  $detailResep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_resep, $id_detail)
    {
        DetailResep::find($id_detail)->delete();
        return redirect()->route('detail-resep.show', $id_resep)
            ->with('msg-success', 'Data Berhasil Dihapus');
    }

    public function tambah()
    {
        $resepObat = ResepObat::all(); //mendapatkan data dari tabel DetailResep
        $obat = Obat::all();
        $racikan = Racikan::all();
        return view('pages.detail-resep.tambah', [
            'resepObat' => $resepObat, 
            'obat' => $obat,
            'racikan' => $racikan
    ]);
    }
}

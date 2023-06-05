<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
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
        // $resepObat = ResepObat::where('id_resep', $id_resep)->first();
        // if ($request->ajax()) {
        //     return DataTables::of(DetailResep::with('resep', 'obat', 'racikan')->where('id_resep',$id_resep)->get())->toJson();
        // }
        // return view('pages.detail_resep.index', compact('resepObat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

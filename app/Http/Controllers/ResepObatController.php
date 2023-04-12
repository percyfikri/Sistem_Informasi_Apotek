<?php

namespace App\Http\Controllers;

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
            return DataTables::of(ResepObat::query()->with('customer')->get())->toJson();
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
        return view('pages.resep-obat.create');
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
     * @param  \App\Models\ResepObat  $resepObat
     * @return \Illuminate\Http\Response
     */
    public function show(ResepObat $resepObat)
    {
        //
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

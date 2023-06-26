@extends('layouts.app')

@section('title', 'Halaman Tambah Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Detail Resep Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('resep-obat.index') }}">Resep Obat</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('resep-obat.create') }}">Tambah Resep Obat</a></div>
                </div>
            </div>

            <div class="section-body">
                @if ($errors->any())
                    <div class="pt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Detail Resep Obat</h4>

                    </div>
                    {{-- <form action="{{ route('resep-obat.store', $id_resep->id_resep) }}" method="POST"> --}}
                    <form action="{{ route('detail-resep.store', $resepObat->id_resep) }}" method="POST">

                        <div class="card-body">
                            @csrf
                            <div class="form-group ">
                                <label for="id_obat">Nama Resep</label>
                                <input hidden readonly type="text" name="id_resep" class="form-control"
                                    value="{{ $resepObat->id_resep }}">
                                <input readonly type="text" name="nama_resep" class="form-control"
                                    value="{{ $resepObat->nama_resep }}">
                            </div>
                            <div class="form-group ">
                                <label for="nama_obat">Nama Obat</label>
                                <select class="form-control" name="id_obat" id="id_obat">
                                    @foreach ($obat as $o)
                                        <option value="{{ $o->id_obat }}">{{ $o->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="nama_racikan">Nama Racikan</label>
                                <select class="form-control" name="id_racikan" id="id_racikan">
                                    @foreach ($racikan as $r)
                                        <option value="{{ $r->id_racikan }}">{{ $r->nama_racikan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>Kuantitas</label>
                                <input type="text" name="kuantitas"
                                    class="form-control @if (old('kuantitas')) is-valid @endif
                                @error('kuantitas') is-invalid @enderror"
                                    value="{{ old('kuantitas') }}">
                            </div>
                            <div class="form-group ">
                                <label class="text-left">Satuan</label>
                                <input type="text" name="satuan"
                                    class="form-control @if (old('satuan')) is-valid @endif
                                @error('satuan') is-invalid @enderror"
                                    value="{{ old('satuan') }}">
                            </div>
                            <div class="form-group ">
                                <label>Harga</label>
                                <input type="text" name="harga"
                                    class="form-control @if (old('harga')) is-valid @endif
                                @error('harga') is-invalid @enderror"
                                    value="{{ old('harga') }}">
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-primary" href="{{ route('detail-resep.index') }}">Kembali</a>
                        </div>
                </div>
                </form>
            </div>
    </div>
    </section>

    </div>
@endsection

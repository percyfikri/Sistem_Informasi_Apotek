@extends('layouts.app')

@section('title', 'Halaman Detail obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Obat</a></div>
                    <div class="breadcrumb-item">Detail Obat</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('stok-obat.show', $obat->id_obat) }}"
                                        class="btn btn-icon btn-success icon-left"><i class="fas fa-pills"></i>
                                        Stok Obat</a>
                                    <a href="{{ route('obat.edit', $obat->id_obat) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('obat.destroy', $obat->id_obat) }}" data-toggle="modal"
                                        data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                        Delete</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Obat</label>
                                        <input readonly type="text" class="form-control" value="{{ $obat->nama_obat }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Jenis Obat</label>
                                        <input readonly type="text" class="form-control" value="{{ $obat->jenis_obat }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Stok Obat</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $obat->stok_obat->sum('kuantitas') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('obat.index') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <x-modal.confirm-delete />

    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

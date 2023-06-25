@extends('layouts.app')

@section('title', 'Halaman Detail obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Informasi Resep Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('resep-obat.index') }}">Resep Obat</a></div>
                    <div class="breadcrumb-item">Informasi Resep Obat</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    
                                    <a href="{{ route('resep-obat.edit', $resepObat->id_resep) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    
                                    <a href="{{ route('detail-resep.show', $resepObat->id_resep) }}"
                                        class="btn btn-icon btn-primary icon-left"><i class="fas fa-circle-info"></i>
                                        Detail Resep</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Resep</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $resepObat->nama_resep }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Customer</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $resepObat->customer->nama }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Dokter</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $resepObat->dokter->nama }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $resepObat->status }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tanggal</label>
                                        <input readonly type="text" class="form-control datepicker"
                                            value="{{ \Carbon\Carbon::parse($resepObat->tanggal)->format('d-m-Y') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Deskripsi</label>
                                        <textarea readonly class="form-control" style="resize: none; height: auto;">{{ $resepObat->deskripsi }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('resep-obat.index') }}">Kembali</a>
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

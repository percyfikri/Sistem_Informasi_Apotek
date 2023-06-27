@extends('layouts.app')

@section('title', 'Halaman Detail Penjualan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Penjualan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('penjualan.index') }}">Penjualan</a></div>
                    <div class="breadcrumb-item">Detail Penjualan</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('detail_penjualan.show', $penjualan->id_penjualan) }}"
                                        class="btn btn-icon btn-success icon-left"><i class="fas fa-pills"></i>
                                        Detail Penjualan</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Customer</label>
                                        @if ($penjualan->customer?->nama)
                                            <input readonly type="text" class="form-control"
                                                value="{{ $penjualan->customer->nama }}">
                                        @else
                                            <input readonly type="text" class="form-control" value="-">
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Dokter</label>
                                        @if ($penjualan->dokter?->nama)
                                            <input readonly type="text" class="form-control"
                                                value="{{ $penjualan->dokter->nama }}">
                                        @else
                                            <input readonly type="text" class="form-control" value="-">
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama Apoteker</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $penjualan->apoteker->nama }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Tanggal</label>
                                        <input readonly type="datetime" class="form-control"
                                            value="{{ $penjualan->tanggal }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('penjualan.index') }}">Kembali</a>
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

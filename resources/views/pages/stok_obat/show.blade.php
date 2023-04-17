@extends('layouts.app')

@section('title', 'Halaman Detail Stok Obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Stok Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Obat</a></div>
                    <div class="breadcrumb-item">Detail Stok Obat</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action"> 
                                    <a href="{{ route('stok_obat.create') }}" class="btn btn-icon btn-primary icon-left"><i
                                        class="far fa-plus"></i>
                                    Tambah</a>   
                                    <a href="{{ route('stok_obat.edit', $stokObat->id_obat) }}" class="btn btn-icon btn-warning icon-left"><i
                                            class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('stok_obat.destroy', $stokObat->id_obat) }}" data-toggle="modal"
                                        data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                        Delete</button>
        
                                </div>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nama Obat</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $stokObat->obat->nama_obat }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Satuan</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $stokObat->satuan }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Kuantitas</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $stokObat->kuantitas }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input readonly type="number" name="harga"
                                                class="form-control"
                                                value="{{ $stokObat->harga }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a class="btn btn-primary float-left" href="{{ route('stok_obat.index') }}">Kembali</a></div>
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

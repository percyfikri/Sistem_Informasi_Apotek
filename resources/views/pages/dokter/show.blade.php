@extends('layouts.app')

@section('title', 'Halaman Detail Dokter')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Dokter</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('dokter.index') }}">Dokter</a></div>
                    <div class="breadcrumb-item">Detail Dokter</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-action">
                                    <a href="{{ route('dokter.edit', $dokter->id_pengguna) }}"
                                        class="btn btn-icon btn-warning icon-left"><i class="far fa-edit"></i>
                                        Edit</a>
                                    <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('dokter.destroy', $dokter->id_pengguna) }}"
                                        data-toggle="modal" data-target="#confirm-delete-modal"> <i
                                            class="fas fa-trash"></i>
                                        Delete</button>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Nama</label>
                                        <input readonly type="text" class="form-control" value="{{ $dokter->nama }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Umur</label>
                                        <input readonly type="number" class="form-control" value="{{ $dokter->umur }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Status</label>
                                        <input readonly type="text" class="form-control" value="{{ $dokter->status }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>No Telepon</label>
                                        <input readonly type="text" class="form-control"
                                            value="{{ $dokter->no_telepon }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Alamat</label>
                                        <textarea readonly class="form-control summernote-simple">{{ $dokter->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Email</label>
                                        <input readonly type="text" class="form-control" value="{{ $dokter->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a class="btn btn-primary float-left" href="{{ route('dokter.index') }}">Kembali</a>
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

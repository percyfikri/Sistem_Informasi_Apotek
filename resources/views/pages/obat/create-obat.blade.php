@extends('layouts.app')

@section('title', 'Halaman Tambah Obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Tambah Obat</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah Obat</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Obat</label>
                                            <input type="text"
                                                class="form-control @error('nama_obat')
                                                is-invalid @enderror"
                                                name="nama_obat"
                                                value="{{ old('nama_obat') }}"
                                                placeholder="Masukkan Nama Obat"
                                                required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Obat</label>
                                            <input type="text"
                                                class="form-control @error('jenis_obat')
                                                is-invalid @enderror"
                                                name="jenis_obat"
                                                value="{{ old('jenis_obat') }}"
                                                placeholder="Masukkan Jenis Obat"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

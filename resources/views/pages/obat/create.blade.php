@extends('layouts.app')

@section('title', 'Halaman Tambah Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Obat</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('obat.create') }}">Tambah Obat</a></div>
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
                        <h4>Tambah Obat</h4>

                    </div>
                    <form action="{{ route('obat.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama obat</label>
                                <input type="text" name="nama_obat"
                                    class="form-control @if (old('nama_obat')) is-valid @endif
                                @error('nama_obat') is-invalid @enderror"
                                    value="{{ old('nama_obat') }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis obat</label>
                                <input type="text" name="jenis_obat"
                                    class="form-control @if (old('jenis_obat')) is-valid @endif
                                @error('jenis_obat') is-invalid @enderror"
                                    value="{{ old('jenis_obat') }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
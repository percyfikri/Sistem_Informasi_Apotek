@extends('layouts.app')

@section('title', 'Halaman Tambah Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah RESEP OBAT</h1>
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
                        <h4>Tambah Resep Obat</h4>

                    </div>
                    <form action="{{ route('resep-obat.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama Resep</label>
                                <input type="text" name="nama_resep"
                                    class="form-control @if (old('nama_resep')) is-valid @endif
                                @error('nama_resep') is-invalid @enderror"
                                    value="{{ old('nama_resep') }}">
                            </div>
                            <div class="form-group">
                                <label for="id_customer">Nama Customer</label>
                                <select class="form-control" name="id_customer" id="id_customer">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id_pengguna }}">{{ $customer->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_dokter">Nama Dokter</label>
                                <select class="form-control" name="id_dokter" id="id_dokter">
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id_pengguna }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="racikan" @if (old('status') == 'racikan') selected @endif>Racikan
                                    </option>
                                    <option value="non racikan" @if (old('status') == 'non racikan') selected @endif>
                                        Non-Racikan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="" rows="60" style="resize: none; height: 8rem" class="form-control"
                                    @if (old('deskripsi')) is-valid @endif @error('deskripsi') is-invalid @enderror
                                    value="{{ old('deskripsi') }}"></textarea>

                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group date" id="tanggal-picker" data-target-input="nearest">
                                    <input type="date" name="tanggal" class="form-control datetimepicker-input"
                                        data-target="#tanggal-picker" value="{{ old('tanggal') }}" />
                                    <div class="input-group-append" data-target="#tanggal-picker"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-primary" href="{{ route('resep-obat.index') }}">Kembali</a>
                        </div>
                </div>
                </form>
            </div>
    </div>
    </section>

    </div>
@endsection

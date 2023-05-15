@extends('layouts.app')

@section('title', 'Halaman Tambah Racikan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Tambah Racikan</a></div>
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
                        <h4>Tambah Racikan</h4>

                    </div>
                    <form action="{{ route('racikan.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama Racikan</label>
                                <input type="text" name="nama_racikan"
                                    class="form-control @if (old('nama_racikan')) is-valid @endif
                                @error('nama_racikan') is-invalid @enderror"
                                    value="{{ old('nama_racikan') }}">
                                    @error('nama_racikan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Obat Racikan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="number" name="harga"
                                    class="form-control @if (old('harga')) is-valid @endif
                                    @error('harga') is-invalid @enderror"
                                    value="{{ old('harga') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Catatan Racikan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Catatan Racikan
                                        </div>
                                    </div>
                                    <input type="text" name="catatan"
                                    class="form-control @if (old('catatan')) is-valid @endif
                                    @error('catatan') is-invalid @enderror"
                                    value="{{ old('catatan') }}">
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

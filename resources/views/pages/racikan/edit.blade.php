@extends('layouts.app')

@section('title', 'Halaman Edit Racikan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Edit Racikan</div>
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
                        <h4>Edit Racikan</h4>

                    </div>
                    <form action="{{ route('racikan.update', $racikan->id_racikan) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Racikan</label>
                                <input type="text" name="nama_racikan"
                                    class="form-control @if (old('nama_racikan')) is-valid @endif 
                                @error('nama_racikan') is-invalid @enderror"
                                    value="{{ old('nama_racikan', $racikan->nama_racikan) }}">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga"
                                    class="form-control @if (old('harga')) is-valid @endif 
                                @error('harga') is-invalid @enderror"
                                    value="{{ old('harga', $racikan->harga) }}">
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea name="catatan"
                                    class="form-control @if (old('catatan')) is-valid @endif
                                @error('catatan') is-invalid @enderror"
                                    data-height="150">{{ old('catatan', $racikan->catatan) }}</textarea>
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
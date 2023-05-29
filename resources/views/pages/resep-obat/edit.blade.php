@extends('layouts.app')

@section('title', 'Halaman Edit Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Resep Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('resep-obat.index') }}">Resep Obat</a></div>
                    <div class="breadcrumb-item">Edit Resep Obat</div>
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
                        <h4>Edit Resep Obat</h4>

                    </div>
                    <form action="{{ route('resep-obat.update', $resepObat->id_resep) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Resep</label>
                                <input type="text" name="nama_resep"
                                    class="form-control @if (old('nama_resep')) is-valid @endif 
                                @error('nama_resep') is-invalid @enderror"
                                    value="{{ old('nama_resep', $resepObat->nama_resep) }}">
                            </div>
                            <div class="form-group">
                                <label for="id_customer">Nama Customer</label>
                                <select class="form-control" name="id_customer" id="id_customer">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id_pengguna }}" {{ $customer->id_pengguna == $resepObat->customer->id_pengguna ? 'selected' : '' }}>
                                            {{ $customer->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_dokter">Nama Dokter</label>
                                <select class="form-control" name="id_dokter" id="id_dokter">
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id_pengguna }}" {{ $dokter->id_pengguna == $resepObat->dokter->id_pengguna ? 'selected' : '' }}>
                                            {{ $dokter->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="racikan" @if (old('status') == 'racikan') selected @endif>Racikan</option>
                                    <option value="non racikan" @if (old('status') == 'non racikan') selected @endif>Non-Racikan</option>
                                </select>
                            </div>   
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" rows="60" style="resize: none; height: 8rem" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $resepObat->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>                            
                            {{-- <div class="form-group">
                                <label>Tanggal</label>
                                <div class="input-group date" id="tanggal-picker" data-target-input="nearest">
                                    <input type="date" name="tanggal" class="form-control datetimepicker-input"
                                        data-target="#tanggal-picker" value="{{ old('tanggal') }}" />
                                    <div class="input-group-append" data-target="#tanggal-picker" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label>Tanggal</label>
                                <input type="text" name="tanggal" class="form-control datepicker @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('d/m/Y', strtotime($resepObat->tanggal))) }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        
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
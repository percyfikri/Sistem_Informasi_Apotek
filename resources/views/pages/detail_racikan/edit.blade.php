@extends('layouts.app')

@section('title', 'Halaman Edit Data Obat Racikan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Obat Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Edit Obat Racikan</div>
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
                        <h4>Edit Data Obat Racikan</h4>

                    </div>
                    
                    <form action="{{ route('detail_racikan.update', ['detail_racikan' => $detailRacikan->id_racikan]) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_racikan">Nama Racikan</label>
                                <select class="form-control" name="id_racikan" id="id_racikan">
                                    @foreach ($racikan as $prk)
                                        <option value="{{$prk->id_racikan}}" {{$prk->id_racikan == $prk->id_racikan ? 'selected' : ''}}>{{$prk->nama_racikan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_obat">Nama Obat</label>
                                <select class="form-control" name="id_obat" id="id_obat">
                                    @foreach ($obat as $obt)
                                        <option value="{{$obt->id_obat}}" {{$obt->id_obat == $obt->id_obat ? 'selected' : ''}}>{{$obt->nama_obat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kuantitas</label>
                                <input type="text" name="kuantitas"
                                    class="form-control @if (old('kuantitas')) is-valid @endif 
                                @error('kuantitas') is-invalid @enderror"
                                value="{{ old('kuantitas', $detailRacikan->kuantitas) }}">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" name="satuan"
                                    class="form-control @if (old('satuan')) is-valid @endif 
                                @error('satuan') is-invalid @enderror"
                                value="{{ old('satuan', $detailRacikan->satuan) }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection
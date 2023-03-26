@extends('layouts.app')

@section('title', 'Halaman Edit Obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            @if ($errors->any())
                <div class="pt-3">
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action='{{ url('obat/'.$obat->id_obat) }}' method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Form Edit Obat</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text"
                                        class="form-control @error('nama_obat')
                                        is-invalid @enderror"
                                        name="nama_obat"
                                        id="nama_obat"
                                        value="{{ $obat->nama_obat }}"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Obat</label>
                                    <input type="text"
                                        class="form-control @error('jenis_obat')
                                        is-invalid @enderror"
                                        name="jenis_obat"
                                        id="jenis_obat"
                                        value="{{ $obat->jenis_obat }}"
                                        required="">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href='{{ url('obat') }}' class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
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

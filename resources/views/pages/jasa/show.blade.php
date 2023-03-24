@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Default Layout</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('jasa') }}">Jasa</a></div>

                    <div class="breadcrumb-item"><a href="{{ url('jasa/' . $jasa->id_jasa) }}">Detail Jasa</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">This is Example Page</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $jasa->id_jasa }}</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $jasa->id_apoteker }}</p>
                        <p>{{ $jasa->nama_jasa }}</p>
                        <p>{{ $jasa->tingkatan }}</p>
                        <p>{{ $jasa->harga }}</p>

                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
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

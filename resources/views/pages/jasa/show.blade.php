@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Jasa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('jasa.index') }}">Jasa</a></div>
                    <div class="breadcrumb-item">Detail Jasa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $jasa->nama_jasa }}</h4>
                        <div class="card-header-action">

                            <a href="{{ route('jasa.edit', $jasa->id_jasa) }}" class="btn btn-icon btn-warning icon-left"><i
                                    class="far fa-edit"></i>
                                Edit</a>
                            <button class="btn btn-danger btn-icon icon-left"
                                data-action="{{ route('jasa.destroy', $jasa->id_jasa) }}" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                Delete</button>

                        </div>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <x-modal.confirm-delete />

    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

@extends('layouts.app')

@section('title', 'Halaman Detail Racikan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Detail Racikan</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12">
                        <div class="card">
                                <div class="card-header">
                                    <div class="card-header-action">
                                        <a href="{{route('detail_racikan.show', $racikan->id_racikan) }}" class="btn btn-icon btn-success icon-left"><i
                                        class="fas fa-pills"></i>
                                        Detail Racikan</a>
                                        <a href="{{ route('racikan.edit', $racikan->id_racikan) }}" class="btn btn-icon btn-warning icon-left"><i
                                            class="far fa-edit"></i>
                                        Edit</a>
                                        <button class="btn btn-danger btn-icon icon-left"
                                        data-action="{{ route('racikan.destroy', $racikan->id_racikan) }}" data-toggle="modal"
                                        data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                        Delete</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Nama Racikan</label>
                                            <input readonly type="text"
                                                class="form-control"
                                                value="{{ $racikan->nama_racikan }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Harga</label>
                                            <input readonly type="number"
                                                class="form-control"
                                                value="{{ $racikan->harga }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Catatan</label>
                                            <textarea readonly class="form-control summernote-simple">{{ $racikan->catatan }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a class="btn btn-primary float-left" href="{{ route('racikan.index') }}">Kembali</a></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-modal.confirm-delete />

    </div>
@endsection

{{-- @section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Detail Racikan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $racikan->nama_racikan }}</h4>
                        <div class="card-header-action">

                            <a href="{{ route('racikan.edit', $racikan->id_racikan) }}" class="btn btn-icon btn-warning icon-left"><i
                                    class="far fa-edit"></i>
                                Edit</a>
                            <button class="btn btn-danger btn-icon icon-left"
                                data-action="{{ route('racikan.destroy', $racikan->id_racikan) }}" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                Delete</button>

                        </div>
                    </div>
                    <div class="card-body">
                        <p>{{ $racikan->nama_racikan }}</p>
                        <p>{{ $racikan->harga}}</p>
                        <p>{{ $racikan->catatan }}</p>


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
@endsection --}}

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

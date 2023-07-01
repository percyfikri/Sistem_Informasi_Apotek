@extends('layouts.app')

@section('title', 'Halaman Data Stok Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Stok Obat</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('obat.index') }}">Obat</a></div>
                </div>
            </div>
            <div class="section-body">
                @if (session('msg-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Sukses</div>
                            {{ session('msg-success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Stok Obat</h4>
                                <div class="card-header-action">

                                    <a href="{{ url('stok-obat/tambah') }}" class="btn btn-icon btn-primary icon-left"><i
                                            class="fas fa-plus"></i>
                                        Tambah Baru</a>
                                    <span class="tooltip-icon" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Gunakan untuk menambah data stok obat baru">
                                    <i class="fas fa-question-circle"></i>
                                    <br>
                                    </span>
                                    <a href="{{ route('stok-obat.create', $obat->id_obat) }}"
                                        class="btn btn-icon btn-success icon-left"><i class="fas fa-plus"></i>
                                        Tambah Stok</a>
                                    <span class="tooltip-icon" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Gunakan untuk menambah data stok obat yang sudah ada">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="users-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Satuan</th>
                                                <th>Kuantitas</th>
                                                <th>Harga</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- {{dd($obat)}} --}}
        <x-modal.confirm-delete />
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/select.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                orderClasses: false,
                deferRender: true,
                order: [
                    [1, 'asc']
                ],
                ajax: '{!! route('stok-obat.show', $obat) !!}',
                columns: [{
                        data: null,
                        orderable: false
                    },
                    {
                        data: 'obat.nama_obat',
                        name: 'obat.nama_obat'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'kuantitas',
                        name: 'kuantitas'
                    }, {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `<div class="buttons text-center">
                                                    <a
                                                        href="${window.location.href}/edit/${data.satuan}"class="btn btn-icon icon-left btn-warning"><i
                                                            class="fas fa-pencil-alt"></i>Edit</a>
                                                    <button class="btn btn-danger btn-icon icon-left"
                              data-action="${window.location.href}/${data.satuan}" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                Delete</button>
                                                </div>`
                        }
                    },


                ],
                rowCallback: function(row, data, index) {
                    $('td:eq(0)', row).html(index + 1);
                },
                select: {
                    style: 'single',
                    search: {

                        search: true
                    }
                }
            });
        });
    </script>
@endpush

@extends('layouts.app')

@section('title', 'Halaman Data Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Resep Obat</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('resep-obat.index') }}">Resep Obat</a></div>
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
                                <h4>Data Resep Obat</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('cetak.pdf.resep-obat') }}" target="_blank"
                                        class="btn btn-icon btn-primary icon-left"><i class="fas fa-print"></i>
                                        Print PDF</a>
                                    <a href="{{ route('resep-obat.create') }}" class="btn btn-icon btn-primary icon-left"><i
                                            class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="users-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Resep</th>
                                                <th>Customer</th>
                                                <th>Dokter</th>
                                                <th>Status</th>
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
                ajax: '{!! route('resep-obat.index') !!}',
                columns: [{
                        data: null,
                        orderable: false
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'nama_resep',
                        name: 'nama_resep'
                    },
                    {
                        data: 'customer.nama',
                        name: 'customer.nama',
                        defaultContent: '-'

                    },
                    {
                        data: 'dokter.nama',
                        name: 'dokter.nama',
                        defaultContent: '-'

                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                            <div class="buttons text-center">
                                <a href="${window.location.href}/${data.id_resep}" class="btn btn-primary btn-block mb-2"><i class="fas fa-circle-info"></i> More</a>

                                <a href="${window.location.href}/${data.id_resep}/edit" class="btn btn-warning btn-block mb-2"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                            
                                <button class="btn btn-danger btn-block mb-2" data-action="${window.location.href}/${data.id_resep}" data-toggle="modal" data-target="#confirm-delete-modal"><i class="fas fa-trash"></i> Delete</button>
                            </div>`;
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

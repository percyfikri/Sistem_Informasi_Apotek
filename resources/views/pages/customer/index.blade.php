@extends('layouts.app')

@section('title', 'Halaman Data Customer')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Customer</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></div>
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
                @if (session('msg-error'))
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        <div class="alert-icon"><i class="far fa-times"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Error</div>
                            {{ session('msg-error') }}
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
                                <h4>Data Customer</h4>
                                <div class="card-header-action">

                                    <a href="{{ route('cetak.pdf.customer') }}" class="btn btn-icon btn-primary icon-left">
                                        <i class="fas fa-print"></i>
                                        Print PDF</a>
                                    <a href="{{ route('customer.create') }}" class="btn btn-icon btn-primary icon-left">
                                        <i class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="customer-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Umur</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
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
            $('#customer-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                orderClasses: false,
                deferRender: true,
                order: [
                    [1, 'asc']
                ],
                ajax: '{!! route('customer.index') !!}',
                columns: [{
                        data: null,
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'umur',
                        name: 'umur'
                    },
                    {
                        data: 'no_telepon',
                        name: 'no_telepon'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `<div class="buttons text-center">
                                                    <a
                                                        href="${window.location.href}/${data.id_pengguna}" class="btn btn-icon icon-left btn-primary"><i
                                                            class="fas fa-circle-info"></i>Detail</a>
                                                    <a
                                                        href="${window.location.href}/${data.id_pengguna}/edit"class="btn btn-icon icon-left btn-warning"><i
                                                            class="fas fa-pencil-alt"></i>Edit</a>
                                                    <button class="btn btn-danger btn-icon icon-left"
                                data-action="${window.location.href}/${data.id_pengguna}}}" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                Delete</button>
                                                </div>`
                        }
                    },


                ],
                rowCallback: function(row, data, index) {
                    $('td:eq(0)', row).html(index + 1);
                }

            });
        });
    </script>
@endpush

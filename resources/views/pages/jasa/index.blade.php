@extends('layouts.app')

@section('title', 'DataTables')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
    {{-- <link href="https://cdn.datatables.net/select/1.6.2/css/select.bootstrap4.min.css" rel="stylesheet" /> --}}
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Jasa</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Jasa</div>
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
                                <h4>Data Jasa</h4>
                                <div class="card-header-action">

                                    <a href="{{ route('jasa.create') }}" class="btn btn-icon btn-primary icon-left"><i
                                            class="fas fa-plus"></i>
                                        Tambah</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table display" style="width:100%" id="jasa-table">
                                        <thead>
                                            <tr>
                                                {{-- <th></th> --}}
                                                {{-- <th>#</th> --}}
                                                <th>Nama</th>
                                                <th>Tingkatan</th>
                                                <th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tingkatan</th>
                                                <th>Harga</th>
                                            </tr>
                                        </tfoot>
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

    {{-- <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>

    <script>
        $(function() {
            $('#jasa-table tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title +
                    '" />');
            });


            const table = $('#jasa-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                orderClasses: false,
                deferRender: true,

                select: {
                    style: 'multi',
                },
                order: [
                    [2, 'asc']
                ],

                ajax: '{!! route('jasa.index') !!}',
                columns: [
                    // {
                    //       data: null,
                    //       defaultContent: '',
                    //       orderable: false,
                    //       className: 'select-checkbox',
                    //   },
                    //   {
                    //       data: 'id_jasa',
                    //       // name: 'id_jasa'

                    //       orderable: false,
                    //       // visible: false,
                    //       searchable: false,
                    //   },
                    {
                        data: 'nama_jasa',
                        name: 'nama_jasa'
                    },
                    {
                        data: 'tingkatan',
                        name: 'tingkatan'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<div class="buttons text-center">
                                                    <a
                                                        href="${window.location.href}/${data.id_jasa}" class="btn btn-icon icon-left btn-primary"><i
                                                            class="fas fa-circle-info"></i>Detail</a>
                                                    <a
                                                        href="${window.location.href}/${data.id_jasa}/edit"class="btn btn-icon icon-left btn-warning"><i
                                                            class="fas fa-pencil-alt"></i>Edit</a>
                                                    <button class="btn btn-danger btn-icon icon-left"
                                data-action="${window.location.href}/${data.id_jasa}}}" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                Delete</button>
                                                </div>`
                        }
                    },


                ],

                // rowCallback: function(row, data, index) {
                //     $('td:eq(0)', row).html(index + 1);
                // },

            });

            // Apply the search
            table.columns().every(function() {
                var that = this;
                $("input", this.footer()).on("keyup change clear", function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
@endpush

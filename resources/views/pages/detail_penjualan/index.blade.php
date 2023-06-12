@extends('layouts.app')

@section('title', 'Halaman Data Detail Penjualan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Penjualan</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></div>
                    <div class="breadcrumb-item active"><a href="#">Detail Penjualan</a></div>
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
                                <h4>Data Detail Penjualan</h4>
                                <div class="card-header-action">

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="detail-penjualan-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>

                                                <th>Nama Item</th>
                                                <th>Jenis</th>
                                                <th>Kuantitas</th>
                                                <th>Satuan</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-primary float-left" href="{{ route('penjualan.index') }}">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    {{-- {{dd($penjualan)}} --}}
    <x-modal.confirm-delete />
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/select.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>

    <script>
        // console.log(@json($penjualan))
        $(function() {
            $('#detail-penjualan-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                orderClasses: false,
                deferRender: true,
                order: [
                    [1, 'asc']
                ],
                ajax: '{!! route('detail_penjualan.show', ['detail_penjualan' => $penjualan->id_penjualan]) !!}',
                columns: [{
                        data: null,
                        orderable: false
                    },

                    {
                        data: 'nama_item',
                        name: 'nama_item'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'kuantitas',
                        name: 'kuantitas'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'subtotal',
                        name: 'subtotal'
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

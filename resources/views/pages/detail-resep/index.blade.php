@extends('layouts.app')

@section('title', 'Halaman Data Detail Resep')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Resep Obat</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('resep-obat.index') }}">Resep Obat</a></div>
                    {{-- <div class="breadcrumb-item"><a href="{{ route('resep-obat.index') }}">Informasi Resep Obat</a></div> --}}
                    <div class="breadcrumb-item" style="color: #6777ef">Informasi Resep Obat</div>
                    <div class="breadcrumb-item">Detail Resep Obat</div>
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

                                    <a href="{{ route('detail-resep.create', $resepObat->id_resep) }}"
                                        class="btn btn-icon btn-primary icon-left mb-3"><i class="fas fa-plus"></i>
                                        Tambah
                                    </a>
                                    <span class="tooltip-icon" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Gunakan untuk menambah data detail resep baru">
                                        <i class="fas fa-question-circle"></i>
                                    </span>
                                    {{-- <a href="{{ url('detail-resep/tambah') }}" class="btn btn-icon btn-success icon-left">
                                        <i class="fas fa-plus"></i>
                                        Tambah 2
                                    </a>
                                    <span class="tooltip-icon" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Gunakan Button Ini untuk menambahkan data pertama kali">
                                        <i class="fas fa-question-circle"></i>
                                    </span> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table table-bordered w-100" id="detail-resep-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Resep</th>
                                                <th>Nama Obat</th>
                                                <th>Nama Racikan</th>
                                                <th>Kuantitas</th>
                                                <th>Satuan</th>
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
            $('[data-bs-toggle="tooltip"]').tooltip();

            $('#detail-resep-table').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                orderClasses: false,
                deferRender: true,
                order: [
                    [1, 'asc']
                ],
                ajax: '{!! route('detail-resep.show', ['id_resep' => $resepObat->id_resep]) !!}',
                columns: [{
                        data: null,
                        orderable: false
                    },
                    {
                        data: 'resep.nama_resep',
                        name: 'resep.nama_resep',
                        defaultContent: '-'

                    },
                    {
                        data: 'obat.nama_obat',
                        name: 'obat.nama_obat',
                        defaultContent: '-'
                    },
                    {
                        data: 'racikan.nama_racikan',
                        name: 'racikan.nama_racikan',
                        defaultContent: '-'

                    },
                    {
                        data: 'kuantitas',
                        name: 'kuantitas'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan',
                        defaultContent: '-'

                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: null,
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                            <div class="buttons text-center">
                                <a href="${window.location.href}/${data.id_detail}/edit" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                            
                                <button class="btn btn-danger" data-action="${window.location.href}/${data.id_detail}" data-toggle="modal" data-target="#confirm-delete-modal"><i class="fas fa-trash"></i></button>
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

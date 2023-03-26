@extends('layouts.app')

@section('title', 'Halaman Obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Obat</h1>
            </div>

            <div class="section-body">
                @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Obat</h4>
                                <div class="card-header-form">
                                    <form action="{{ url('obat') }}" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="katakunci"
                                                value="{{ Request::get('katakunci') }}"
                                                class="form-control"
                                                placeholder="Masukkan kata kunci">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="card-header">
                                    <div class="card-header-action">
                                        <a href="{{ url('create-obat') }}"
                                            class="btn btn-primary">Add</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-striped table-md table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Jenis Obat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($obat as $row)
                                                <tr>
                                                    <th>{{ $loop->iteration }}</th>
                                                    <td>{{ $row->nama_obat }}</td>
                                                    <td>{{ $row->jenis_obat }}</td>
                                                    <td>
                                                        <button onclick="window.location='{{ url('obat/'.$row->id_obat.'/edit') }}'" class="btn btn-sm btn-info" title="Edit Data">
                                                            <i class="fas fa-pencil"></i>
                                                        </button>
                                                        <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus data?')" action="{{ url('obat/'.$row->id_obat) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" 
                                                                name="submit" class="btn btn-sm btn-danger" title="Delete Data">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

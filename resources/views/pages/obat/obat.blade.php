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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Obat</h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                            <tr>
                                                @php $no = 1; @endphp
                                                @forelse ($posts as $post)
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $post->nama_obat }}</td>
                                                <td>{{ $post->jenis_obat }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ url('pages.destroy', $post->id) }}" method="POST">
                                                    <a href="{{ url('pages.edit', $post->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                                @empty
                                                <div class="alert alert-danger">
                                                    Data Post belum Tersedia.
                                                </div>
                                                @endforelse
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

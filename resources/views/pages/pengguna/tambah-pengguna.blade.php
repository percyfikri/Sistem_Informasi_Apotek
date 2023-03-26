@extends('layouts.app')

@section('title', 'Halaman Pengguna')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Tambah Pengguna</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengguna</a></div>
                    <div class="breadcrumb-item">Tambah Pengguna</a></div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Table</h2>
                <p class="section-lead">Example of some Bootstrap table components.</p> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4>Tambah Pengguna</h4>
                            </div> --}}
                            <div class="card-body">
                                {{-- <div class="alert alert-info">
                                    <b>Note!</b> Not all browsers support HTML5 type input.
                                </div> --}}

                                @if (session('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('msg') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                @endif

                                <form action="{{ url('pengguna/simpan-pengguna') }}" method="post">
                                    @csrf
                                    <div class="section-title mt-0">Nama</div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control"
                                            placeholder="Masukkan nama lengkap"
                                            name="nama">
                                    </div>
                                    <div class="section-title mt-0">Umur</div>
                                    <div class="form-group">
                                        <input type="number"
                                            class="form-control"
                                            placeholder="Masukkan umur"
                                            name="umur">
                                    </div>
                                    <div class="section-title mt-0">Status</div>
                                    <div class="form-group">
                                        <select class="form-control" name="status">
                                            <option selected>Pilih status</option>
                                            <option value="apoteker">Apoteker</option>
                                            <option value="dokter">Dokter</option>
                                            <option value="customer">Customer</option>
                                        </select>
                                    </div>
                                    <div class="section-title mt-0">Alamat</div>
                                    <div class="form-group">
                                        <textarea class="form-control"
                                            data-height="150"
                                            placeholder="Masukkan alamat lengkap"
                                            name="alamat"></textarea>
                                    </div>
                                    <div class="section-title mt-0">Email</div>
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control"
                                            placeholder="Masukkan email"
                                            name="email">
                                    </div>
                                    <div class="section-title mt-0">Password</div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control"
                                            placeholder="Masukkan password"
                                            name="password">
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1"
                                            type="submit">Submit</button>
                                        <button class="btn btn-dark"
                                            type="reset">Reset</button>
                                    </div>
                                </form>
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
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush

@extends('layouts.app')

@section('title', 'Halaman Tambah Pengguna')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Pengguna</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('pengguna.index') }}">Pengguna</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pengguna.create') }}">Tambah Pengguna</a></div>
                </div>
            </div>

            <div class="section-body">
                @if ($errors->any())
                <div class="pt-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pengguna</h4>

                    </div>
                    <form action="{{ route('pengguna.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}">
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number" name="umur"
                                    class="form-control @if (old('umur')) is-valid @endif
                                @error('umur') is-invalid @enderror"
                                    value="{{ old('umur') }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    value="{{ old('alamat') }}">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status"
                                    class="form-control @if (old('status')) is-valid @endif
                                @error('status') is-invalid @enderror"
                                    value="{{ old('status') }}">
                                    <option selected>Pilih status</option>
                                    <option value="apoteker">Apoteker</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @if (old('email')) is-valid @endif
                                @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @if (old('passowrd')) is-valid @endif
                                @error('password') is-invalid @enderror"
                                    value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        // $('#id-apoteker').select2({
        //     placeholder: 'Pilih Apoteker',
        //     ajax: {
        //         url: '/obat/autocomplete/apoteker',
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function(data) {
        //             return {
        //                 results: $.map(data, function(item) {
        //                     return {
        //                         text: item.nama,
        //                         id: item.id_pengguna
        //                     }
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // });
        // $('#id-apoteker').on('change', function(e) {
        //     var title = $(this).select2('data')[0].text;
        //     $('#nama-apoteker').val(title);
        // });

        // new Cleave('.currency', {
        //     numeral: true,
        //     numeralThousandsGroupStyle: 'thousand'
        // });
    </script>
@endpush

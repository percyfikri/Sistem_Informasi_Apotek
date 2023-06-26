@extends('layouts.app')

@section('title', 'Halaman Tambah Customer')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Customer</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('customer.index') }}">Customer</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('customer.create') }}">Tambah Customer</a></div>
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
                        <h4>Tambah Customer</h4>

                    </div>
                    <form action="{{ route('customer.store') }}" method="POST">
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
                                <label>No Telepon</label>
                                <input type="text" name="no_telepon"
                                    class="form-control @if (old('no_telepon')) is-valid @endif
                                @error('no_telepon') is-invalid @enderror"
                                    value="{{ old('no_telepon') }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    data-height="150">{{ old('alamat') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="hidden" name="status" value="customer">
                                <input readonly type="text"
                                    class="form-control @if (old('status')) is-valid @endif @error('status') is-invalid @enderror"
                                    value="{{ old('status', 'Customer') }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @if (old('email')) is-valid @endif
                                @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
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
    <script type="text/javascript"></script>
@endpush

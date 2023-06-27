@extends('layouts.app')

@section('title', 'Halaman Edit Customer')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Customer</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('customer.index') }}">Customer</a></div>
                    <div class="breadcrumb-item">Edit Customer</div>
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
                        <h4>Edit Customer</h4>

                    </div>
                    <form action="{{ route('customer.update', $customer->id_pengguna) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $customer->nama) }}">
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number" name="umur"
                                    class="form-control @if (old('umur')) is-valid @endif
                                @error('umur') is-invalid @enderror"
                                    value="{{ old('umur', $customer->umur) }}">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="no_telepon"
                                    class="form-control @if (old('no_telepon')) is-valid @endif
                                @error('no_telepon') is-invalid @enderror"
                                    value="{{ old('no_telepon', $customer->no_telepon) }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat"
                                    class="form-control @if (old('alamat')) is-valid @endif
                                @error('alamat') is-invalid @enderror"
                                    data-height="150">{{ old('alamat', $customer->alamat) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="hidden" name="status" value="customer">
                                <input readonly type="text"
                                    class="form-control @if (old('status')) is-valid @endif @error('status') is-invalid @enderror"
                                    value="{{ old('status', 'Costumer', $customer->status) }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control @if (old('email')) is-valid @endif
                                @error('email') is-invalid @enderror"
                                    value="{{ old('email', $customer->email) }}">
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

@extends('layouts.app')

@section('title', 'Edit Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Obat</a></div>
                    <div class="breadcrumb-item">Edit Obat</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $obat->nama_obat }}</h4>
                        <div class="card-header-action">
                            <button class="btn btn-danger btn-icon icon-left"
                                data-action="{{ route('obat.destroy', $obat->id_obat) }}" data-toggle="modal"
                                data-target="#confirm-delete-modal"> <i class="fas fa-trash"></i>
                                Delete</button>
                        </div>
                    </div>
                    <form action="{{ route('obat.update', $obat->id_obat) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Obat</label>
                                <input type="text" name="nama_obat"
                                    class="form-control @if (old('nama_obat')) is-valid @endif
                                     @error('nama_obat') is-invalid @enderror"
                                    value="{{ old('nama_obat', $obat->nama_obat) }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Obat</label>
                                <input type="text" name="jenis_obat"
                                    class="form-control @if (old('jenis_obat')) is-valid @endif
                                     @error('jenis_obat') is-invalid @enderror"
                                    value="{{ old('jenis_obat', $obat->jenis_obat) }}">
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
        <x-modal.confirm-delete />
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $('#id-apoteker').select2({
            placeholder: 'Pilih Apoteker',
            ajax: {
                url: '/obat/autocomplete/apoteker',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
                                id: item.id_pengguna
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id-apoteker').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama-apoteker').val(title);
        });

        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush

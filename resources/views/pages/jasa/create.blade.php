@extends('layouts.app')

@section('title', 'Buat Jasa')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Jasa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('jasa.index') }}">Jasa</a></div>
                    <div class="breadcrumb-item">Detail Jasa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Jasa</h4>

                    </div>
                    <form action="{{ route('jasa.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama Jasa</label>
                                <input type="text" name="nama_jasa"
                                    class="form-control @if (old('nama_jasa')) is-valid @endif 
                                @error('nama_jasa') is-invalid @enderror"
                                    value="{{ old('nama_jasa') }}">
                                @error('nama_jasa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Apoteker</label>
                                <select id="id-apoteker" name="id_apoteker" class="form-control" required>
                                    @if (old('id_apoteker'))
                                        <option value="{{ old('id_apoteker') }}" selected>{{ old('nama_apoteker') }}
                                        </option>
                                    @endif
                                </select>
                                @error('id_apoteker')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" id="nama-apoteker" name="nama_apoteker"
                                value="{{ old('nama_apoteker') }}">
                            <div class="form-group">
                                <label class="form-label">Tingkatan</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="tingkatan" value="1" class="selectgroup-input"
                                            @if (old('tingkatan') == 1) checked @endif required>
                                        <span class="selectgroup-button">Rendah</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="tingkatan" value="2" class="selectgroup-input"
                                            @if (old('tingkatan') == 2) checked @endif>
                                        <span class="selectgroup-button">Sedang</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="tingkatan" value="3" class="selectgroup-input"
                                            @if (old('tingkatan') == 3) checked @endif>
                                        <span class="selectgroup-button">Tinggi</span>
                                    </label>
                                </div>
                                @error('tingkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="text" name="harga"
                                        class="form-control currency @if (old('harga')) is-valid @endif 
                                    @error('harga') is-invalid @enderror"
                                        value="{{ old('harga') }}">
                                </div>
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
        $('#id-apoteker').select2({
            placeholder: 'Pilih Apoteker',
            ajax: {
                url: '/autocomplete/apoteker',
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
    </script>
@endpush

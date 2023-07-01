@extends('layouts.app')

@section('title', 'Halaman Edit Stok Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Stok Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Obat</a></div>
                    <div class="breadcrumb-item">Edit Stok Obat</div>
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
                        <h4>Edit Stok Obat</h4>

                    </div>
                    <form action="{{ route('stok-obat.update', [$stokObat->id_obat, $stokObat->satuan]) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_obat">Nama Obat</label>
                                <input readonly hidden type="text" name="id_obat" class="form-control"
                                    value="{{ $stokObat->id_obat }}">
                                <input readonly type="text" name="nama obat" class="form-control"
                                    value="{{ $stokObat->obat->nama_obat }}">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" name="satuan"
                                    class="form-control @if (old('satuan')) is-valid @endif 
                                @error('satuan') is-invalid @enderror"
                                    value="{{ old('satuan', $stokObat->satuan) }}">
                            </div>
                            <div class="form-group">
                                <label>Kuantitas</label>
                                <input type="number" name="kuantitas"
                                    class="form-control @if (old('kuantitas')) is-valid @endif 
                                @error('kuantitas') is-invalid @enderror"
                                    value="{{ old('kuantitas', $stokObat->kuantitas) }}">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Rp
                                        </div>
                                    </div>
                                    <input type="number" name="harga"
                                        class="form-control @if (old('harga')) is-valid @endif 
                                    @error('harga') is-invalid @enderror"
                                        value="{{ old('harga', $stokObat->harga) }}">
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
                            <button action="{{ route('stok-obat.index') }}" class="btn btn-warning">Back</button>
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
        $('#id-obat').select2({
            placeholder: 'Pilih Nama Obat',
            ajax: {
                url: '/autocomplete/obat',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_obat,
                                id: item.id_obat
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id-obat').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama-obat').val(title);
        });

        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush

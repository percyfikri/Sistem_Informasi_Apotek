@extends('layouts.app')

@section('title', 'Halaman Tambah Obat Racikan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Obat Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Tambah Obat Racikan</div>
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
                        <h4>Tambah Obat Racikan</h4>

                    </div>
                    <form action="{{ route('detail_racikan.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="id_obat">Nama Racikan</label>
                                <select class="form-control" name="id_racikan" id="id_racikan">
                                    @foreach ($racikan as $rck)
                                        <option value="{{ $rck->id_racikan }}">{{ $rck->nama_racikan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_obat">Nama Obat</label>
                                <select class="form-control" name="id_obat" id="id_obat">
                                    @foreach ($obat as $obt)
                                        <option value="{{ $obt->id_obat }}">{{ $obt->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kuantitas</label>
                                <div class="input-group">
                                    <input type="number" name="kuantitas"
                                        class="form-control @if (old('kuantitas')) is-valid @endif 
                                @error('kuantitas') is-invalid @enderror"
                                        value="{{ old('kuantitas') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" name="satuan"
                                    class="form-control @if (old('satuan')) is-valid @endif 
                                @error('satuan') is-invalid @enderror"
                                    value="{{ old('satuan') }}">
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
        $('#id-racikan').select2({
            placeholder: 'Pilih Nama Racikan',
            ajax: {
                url: '/autocomplete/racikan',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama_racikan,
                                id: item.id_racikan
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id_racikan').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama_racikan').val(title);
        });

        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush

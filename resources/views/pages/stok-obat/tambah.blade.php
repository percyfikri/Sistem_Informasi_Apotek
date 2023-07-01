@extends('layouts.app')

@section('title', 'Halaman Tambah Stok Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Stok Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('obat.index') }}">Obat</a></div>
                    <div class="breadcrumb-item">Tambah Stok Obat</div>
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
                        <h4>Tambah Stok Obat</h4>

                    </div>
                    <form action="{{ route('stok-obat.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Obat</label>
                                <select id="id-obat" name="id_obat" class="form-control" required
                                    onchange="changeObat(event)">
                                    @if (old('id_obat'))
                                        <option value="{{ old('id_obat') }}" selected>{{ old('nama_obat') }}
                                        </option>
                                    @endif
                                </select>
                                @error('id_obat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="id_obat">Nama Obat</label>
                                <select class="form-control" name="id_obat" id="id_obat">
                                    @foreach ($obat as $obt)
                                        <option value="{{ $obt->id_obat }}">{{ $obt->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" name="satuan"
                                    class="form-control @if (old('satuan')) is-valid @endif
                                @error('satuan') is-invalid @enderror"
                                    value="{{ old('satuan') }}">
                            </div>
                            <div class="form-group">
                                <label>Kuantitas</label>
                                <input type="number" name="kuantitas"
                                    class="form-control @if (old('kuantitas')) is-valid @endif
                                @error('kuantitas') is-invalid @enderror"
                                    value="{{ old('kuantitas') }}">
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
        const changeObat = e => {
            selectSatuan(e.target.value)
        }
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
        const selectSatuan = (id) => {
            $.ajax({
                url: '/autocomplete/satuan',
                dataType: 'json',
                data: {
                    id_obat: id
                },
                success: function(data) {
                    $('#satuan').find('option').remove();
                    data.forEach(e => {
                        $('#satuan').append(` <option value="${e.satuan}">${e.satuan}
                                        </option>`)
                    });

                }
            })

        }
        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush

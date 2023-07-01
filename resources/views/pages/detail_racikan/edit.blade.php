@extends('layouts.app')

@section('title', 'Halaman Edit Data Obat Racikan')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Obat Racikan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('racikan.index') }}">Racikan</a></div>
                    <div class="breadcrumb-item">Edit Obat Racikan</div>
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
                        <h4>Edit Data Obat Racikan</h4>

                    </div>

                    <form action="{{ route('detail_racikan.update', $detailRacikan->id_detail_racikan) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_racikan">Nama Racikan</label>
                                <input hidden readonly type="text" name="id_racikan" class="form-control"
                                    value="{{ $detailRacikan->id_racikan }}">
                                <input readonly type="text" name="nama_racikan" class="form-control"
                                    value="{{ $detailRacikan->racikan->nama_racikan }}">
                            </div>
                            <div class="form-group">
                                <label>Obat</label>
                                <select id="id-obat" name="id_obat" class="form-control" required
                                    onchange="changeObat(event)">
                                    @if (old('id_obat', $detailRacikan->id_obat))
                                        <option value="{{ old('id_obat', $detailRacikan->id_obat) }}" selected>
                                            {{ old('nama_obat', $detailRacikan->obat->nama_obat) }}
                                        </option>
                                    @endif
                                </select>
                                @error('id_obat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" id="nama-obat" name="nama_obat"
                                value="{{ old('nama_obat', $detailRacikan->obat->nama_obat) }}">
                            <div class="form-group">
                                <label>Kuantitas</label>
                                <input type="text" name="kuantitas"
                                    class="form-control @if (old('kuantitas')) is-valid @endif 
                                @error('kuantitas') is-invalid @enderror"
                                    value="{{ old('kuantitas', $detailRacikan->kuantitas) }}">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select id="satuan" name="satuan" class="form-control">

                                    @if (old('satuan', $detailRacikan->satuan))
                                        <option value="{{ old('satuan', $detailRacikan->satuan) }}" selected>
                                            {{ old('satuan', $detailRacikan->satuan) }}
                                        </option>
                                    @else
                                        <option value="" disabled selected>Pilih Obat Terlebih Dahulu
                                        </option>
                                    @endif
                                </select>
                                @error('satuan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
                        $('#satuan').append(` <option value="${e.satuan}" >${e.satuan}
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

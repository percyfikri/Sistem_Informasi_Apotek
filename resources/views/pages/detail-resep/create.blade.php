@extends('layouts.app')

@section('title', 'Halaman Tambah Obat')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Detail Resep Obat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('dashboard-general-dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('resep-obat.index') }}">Resep Obat</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('resep-obat.create') }}">Tambah Resep Obat</a></div>
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
                        <h4>Tambah Detail Resep Obat</h4>

                    </div>
                    {{-- <form action="{{ route('resep-obat.store', $id_resep->id_resep) }}" method="POST"> --}}
                    <form action="{{ route('detail-resep.store', $resepObat->id_resep) }}" method="POST">

                        <div class="card-body">
                            @csrf
                            <div class="form-group ">
                                <label for="id_resep">Nama Resep</label>
                                <input hidden readonly type="text" name="id_resep" class="form-control"
                                    value="{{ $resepObat->id_resep }}">
                                <input readonly type="text" name="nama_resep" class="form-control"
                                    value="{{ $resepObat->nama_resep }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Jenis</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis" value="obat" class="selectgroup-input"
                                            @if (old('jenis') == 'obat') checked @endif required>
                                        <span class="selectgroup-button">Obat</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis" value="racikan" class="selectgroup-input"
                                            @if (old('jenis') == 'racikan') checked @endif>
                                        <span class="selectgroup-button">Racikan</span>
                                    </label>

                                </div>
                                @error('jenis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Obat / Racikan</label>
                                <select id="id-item" name="id_item" class="form-control" required
                                    onchange="changeObat(event)">
                                    <option value="" selected disabled>Pilih Jenis Terlebih Dahulu</option>
                                    @if (old('id_item'))
                                        <option value="{{ old('id_item') }}" selected>{{ old('nama_item') }}
                                        </option>
                                    @endif
                                </select>
                                @error('id_item')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <input type="hidden" id="nama-item" name="nama_item" value="{{ old('nama_item') }}">
                            <div class="form-group ">
                                <label>Kuantitas</label>
                                <input type="text" name="kuantitas"
                                    class="form-control @if (old('kuantitas')) is-valid @endif
                                @error('kuantitas') is-invalid @enderror"
                                    value="{{ old('kuantitas') }}">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <select id="satuan" name="satuan" class="form-control" required>
                                    <option value="" disabled selected>Pilih Obat Terlebih Dahulu
                                    </option>
                                    @if (old('satuan'))
                                        <option value="{{ old('satuan') }}" selected>{{ old('satuan') }}
                                        </option>
                                    @endif
                                </select>
                                @error('satuan')
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
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a class="btn btn-primary" href="{{ route('detail-resep.index') }}">Kembali</a>
                        </div>
                </div>
                </form>
            </div>
    </div>
    </section>

    </div>
@endsection
@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        const selectJenis = document.getElementsByName('jenis');
        const changeItem = () => {
            const jenis = document.querySelector('input[name="jenis"]:checked').value;
            if (jenis == 'obat') {
                $("#satuan").prop('disabled', false)
                $('#satuan').append(`<option value="" disabled selected>Pilih Obat Terlebih Dahulu</option>`)
                selectObat()
            } else {
                selectRacikan()
                $("#satuan").prop('disabled', true)
                $('#satuan').find('option').remove();
                $('#satuan').append(`<option value="" disabled selected>Pilih Obat Terlebih Dahulu</option>`)

            }
        }
        const changeObat = e => {
            const jenis = document.querySelector('input[name="jenis"]:checked').value;
            if (jenis == 'obat') selectSatuan(e.target.value)
        }

        const selectObat = () => {
            $('#id-item').select2({
                placeholder: 'Pilih Obat',
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
        }

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
        const selectRacikan = () => {
            $('#id-item').select2({
                placeholder: 'Pilih Racikan',
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
        }
        selectJenis.forEach(e => {
            e.addEventListener('change', function() {
                $("#id-item").empty()
                changeItem()
            })
        });
        $('#id-item').on('change', function(e) {
            var title = $(this).select2('data')[0].text;
            $('#nama-item').val(title);
        });
        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush

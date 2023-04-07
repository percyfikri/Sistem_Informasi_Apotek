@extends('layouts.app')

@section('title', 'Kasir')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kasir</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Kasir</div>
                </div>
            </div>
            <div class="section-body">

                @if (session('msg-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Sukses</div>
                            {{ session('msg-success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="form-group p-4">
                                <div class="input-group">
                                    <select id="input-cari" name="keyword" class="custom-select">
                                    </select>

                                    <input type="hidden" id="nama-obat" name="nama_obat" value="{{ old('nama_obat') }}">
                                </div>
                            </div>
                            <div class="card-header">
                                <h4>Daftar Item</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="item-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Tingkatan</th>
                                                <th>Harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kasir.store') }}" method="POST">
                                    <div class="form-group">
                                        <label>Subtotal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="text" name="subtotal"
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
                                    <form action="{{ route('kasir.store') }}" method="POST">
                                        <div class="form-group">
                                            <label>Biaya Jasa</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input type="text" name="jasa"
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
                                        <div class="text-center p-1">
                                            <button class="btn btn-success btn-lg" type="submit">
                                                Bayar
                                            </button>
                                        </div>
                                    </form>

                            </div>
                        </div>
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
        $('#input-cari').select2({
            placeholder: 'Cari Produk',

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
        $('#input-cari').on('change', function(e) {
            const title = $(this).select2('data')[0].text;
            $('#nama-obat').val(title);
            addItemToTable($(this).select2('data')[0])
        });

        const addItemToTable = (item) => {
            console.log(item)
            const itemTable = document.getElementById("item-table");
            var row = itemTable.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = item.id
            cell2.innerHTML = item.text

        }


        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush

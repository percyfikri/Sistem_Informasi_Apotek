@extends('layouts.app')

@section('title', 'Kasir')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/dataTables.bootstrap4.min.css') }}">
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
                <form action="{{ route('kasir.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card h-100">
                                {{--
                                <div class="form-group p-4">
                                    <div class="input-group">

                                        <select id="input-cari" name="keyword" class="custom-select select2">
                                        </select>
                                        <input type="hidden" id="nama-obat" name="nama_obat"
                                            value="{{ old('nama_obat') }}">
                                    </div>
                                </div> --}}
                                <div class="card-header">
                                    <h4>Daftar Item</h4>
                                </div>
                                <div class="card-body mh-100">
                                    <div class="table-responsive  h-100">
                                        <table class="table-striped table" id="item-table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Jenis</th>
                                                    <th>Satuan</th>
                                                    <th>Kuantitas</th>
                                                    <th>SubTotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="table-placeholder">
                                                    <td colspan="4" class="text-center">No data available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12 col-sm-12">


                            <div class="card">
                                <div class="card-header">
                                    <h4>Pilih Produk</h4>
                                </div>
                                <div class="card-body pt-0">
                                    <ul class="nav nav-pills row no-gutters justify-content-around">
                                        <li class="nav-item col-auto  ">
                                            <button type="button" class="px-3 py-2 btn btn-primary btn-icon icon-left"
                                                data-toggle="modal" data-target="#select-obat"> <i
                                                    class="fas fa-pills"></i>Obat</button>
                                        </li>
                                        <li class="nav-item col-auto ">
                                            <button type="button" class="px-3 py-2 btn btn-primary btn-icon icon-left"
                                                data-toggle="modal" data-target="#select-resep"> <i
                                                    class="fas fa-prescription"></i>Resep</button>
                                        </li>
                                        <li class="nav-item col-auto">
                                            <button type="button" class="px-3 py-2 btn btn-primary btn-icon icon-left"
                                                data-toggle="modal" data-target="#select-jasa"> <i
                                                    class="fas fa-user-nurse"></i>Jasa</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="m-0 list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <img alt="image" class="rounded-circle mr-3" width="50"
                                                src="{{ asset('img/avatar/avatar-1.png') }}">
                                            <div class="media-body">
                                                <div class="media-title text-primary">
                                                    Customer
                                                </div>
                                                <input type="hidden" id="customer-id" name="customer">
                                                <div class="media-title d-none" id="customer-name">Customer</div>
                                            </div>
                                            <div class="media-cta">
                                                <button type="button" class="btn btn-outline-primary" id="btn-add-customer"
                                                    data-toggle="modal" data-target="#select-customer">Tambah</button>
                                                <button type="button" class="btn btn-outline-danger d-none"
                                                    id="btn-remove-customer" onclick="removeCustomer()">Hapus</button>
                                            </div>

                                        </li>
                                        <li class="media">
                                            <img alt="image" class="rounded-circle mr-3" width="50"
                                                src="{{ asset('img/avatar/avatar-1.png') }}">
                                            <div class="media-body">
                                                <div class="media-title text-primary">
                                                    Dokter
                                                </div>
                                                <input type="hidden" id="dokter-id"name="dokter">
                                                <div class="media-title d-none" id="dokter-name">Budi</div>
                                            </div>
                                            <div class="media-cta">
                                                <button type="button" class="btn btn-outline-primary" id="btn-add-dokter"
                                                    data-toggle="modal" data-target="#select-dokter">Tambah</button>
                                                <button type="button" class="btn btn-outline-danger d-none"
                                                    id="btn-remove-dokter" onclick="removeDokter()">Hapus</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-statistic-2">
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4 class="text-primary">Total</h4>
                                    </div>
                                    <div class="card-body pb-4">
                                        Rp <span id="total">0
                                        </span>
                                        <button class="btn btn-success btn-lg w-100 ">Bayar</button>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="card">
                                <div class="card-header">
                                    <h4>Pembayaran</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Customer</label>
                                        <select id="id-customer" name="id_customer" class="form-control" required>
                                            @if (old('id_customer'))
                                                <option value="{{ old('id_customer') }}" selected>
                                                    {{ old('id_customer') }}
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jasa</label>
                                        <select id="id-jasa" name="id_jasa" class="form-control" required>
                                            @if (old('id_jasa'))
                                                <option value="{{ old('id_jasa') }}" selected>
                                                    {{ old('id_jasa') }}
                                                </option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Biaya Jasa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>

                                            <input type="text" id="harga-jasa" name="jasa"
                                                class="form-control currency @if (old('jasa')) is-valid @endif
                                    @error('jasa') is-invalid @enderror"
                                                value="{{ old('jasa') }}">
                                        </div>
                                        @error('jasa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input type="text" name="subtotal" id="subtotal-input"
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

                                </div>
                            </div>
                        </div> --}}
                </form>
            </div>
        </section>
        <x-modal.select-obat />
        <x-modal.select-jasa />
        <x-modal.select-resep />
        <x-modal.create-obat />
        <x-modal.select-customer />
        <x-modal.select-dokter />




    </div>
@endsection
@push('scripts')
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        const addToTable = (event) => {
            let target = event.target
            if (target.tagName != 'BUTTON') {
                target = target.closest('button');
            }
            const id = target.dataset.id
            const nama = target.dataset.nama
            const type = target.dataset.type
            const harga = target.dataset.harga || 0
            addTableRow({
                id,
                nama,
                type,
                harga
            })
        }
        let items = []
        let obats = []
        let itemCount = 0;
        const total = document.getElementById('total')

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
                cache: true,

            }
        });


        const checkTableRow = () => {
            const table = document.getElementById("item-table");
            const tbody = table.querySelector('tbody');
            const rows = tbody.querySelectorAll('tr');
            const placeholder = document.getElementById("table-placeholder")
            if (rows.length === 0) {
                placeholder.classList.remove('d-none');

            } else {
                placeholder.classList.add('d-none');
            }
        }

        const sumSubTotal = (e) => {
            const id = e.target.id.split('-')[1]
            const kuantitas = document.getElementById(`kuantitas-${id}`)
            const satuan = document.getElementById(`satuan-${id}`)
            const subtotal = document.getElementById(`subtotal-${id}`);
            const type = document.getElementById(`type-${id}`);
            let item = items.find(item => item.id == id)
            if (item.type === 'obat') {
                const obat = obats.find(o => o['id_obat'] == id)
                const satuan_item = obat['stok_obat'].find(stok => stok.satuan == satuan.value)
                subtotal.value = parseInt(satuan_item.harga) * kuantitas.value || 0
            } else {
                subtotal.value = item.harga * kuantitas.value || 0
            }

            const subtotals = Array.from(document.querySelectorAll('.item-subtotal'));
            const sum = subtotals.reduce((acc, curr) => acc + parseFloat(curr.value), 0);
            total.innerHTML = sum

        }
        const addTableRow = (item) => {
            checkTableRow()
            const itemTable = document.getElementById("item-table");
            const row = itemTable.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            cell1.innerHTML = `<input type="text" name="ids[]" id="id-${item.id}"
                                    class="form-control" hidden value="${item.id}">

                                    <input type="text" name="nama[]"
                                    class="form-control" disabled value="${item.nama}">`

            cell2.innerHTML = ` <input type="text" name="type[]"
                                    class="form-control" id="type-${item.id}" disabled value="${item.type}">`
            cell3.innerHTML = `<select type="text"  ${item.type!='obat'?'disabled':''} id="satuan-${item.id}" name="satuan[]"
                                    class="form-control"  onchange="sumSubTotal(event)"></select>`
            cell4.innerHTML = `<input type="text" id="kuantitas-${item.id}" name="kuantitas[]"
                                    class="form-control" onchange="sumSubTotal(event)">`
            cell5.innerHTML = `<input type="text" id="subtotal-${item.id}" name="harga[]"
                                    class="form-control item-subtotal" value="0" >`
            items.push(item)
            if (item.type === 'obat') getItem(item.id)
            itemCount++;
        }

        const getItem = (id) => {
            $.ajax({
                url: `/api/obat/${id}`,
                type: 'GET',
                success: function(response) {
                    const select = document.getElementById(`satuan-${id}`)
                    obats.push(response[0])
                    response[0]['stok_obat'].forEach(function(item) {
                        let option = document.createElement('option');
                        option.value = item.satuan;
                        option.text = item.satuan;
                        select.appendChild(option);
                    });
                }
            });
        }


        $('#input-cari').on('change', function(e) {
            const title = $(this).select2('data')[0].text;
            $('#nama-obat').val(title);
            addItemToTable($(this).select2('data')[0])
            $("#input-cari").empty()
        });

        $('#id-jasa').select2({
            placeholder: 'Pilih Jasa',
            ajax: {
                url: '/autocomplete/jasa',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: `${item.nama_jasa} - ${item.harga}`,
                                id: item.id_jasa
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('#id-jasa').on('change', function(e) {
            const title = $(this).select2('data')[0].text;
            const hargaJasa = title.split('-')[1].trim()
            $('#harga-jasa').val(hargaJasa);
        });

        $('#id-customer').select2({
            placeholder: 'Pilih Customer',
            ajax: {
                url: '/autocomplete/customer',
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
        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
    @stack('kasir-scripts')
    {{-- <script src="{{ asset('js/modal/select-obat.js') }}"></script> --}}
@endpush

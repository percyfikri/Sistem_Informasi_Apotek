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
                            {!! session()->get('msg-success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

                <form action="{{ route('kasir.store') }}" id="kasir-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                            <div class="card h-100">

                                <div class="card-header">
                                    <h4>Daftar Item</h4>
                                </div>
                                <div class="card-body mh-100">
                                    <div class="table-responsive  h-100">
                                        <table class="table-striped table" id="item-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:20%">Nama</th>
                                                    <th style="width:10%">Jenis</th>
                                                    <th style="width:25%">Satuan</th>
                                                    <th style="width:10%">Kuantitas</th>
                                                    <th style="width:30%">SubTotal</th>
                                                    <th style="width:5%"></th>

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
                                                <button type="button" class="btn btn-outline-primary"
                                                    id="btn-add-dokter" data-toggle="modal"
                                                    data-target="#select-dokter">Tambah</button>
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
                                        <span id="total">0
                                        </span>
                                        <button class="btn btn-success btn-lg w-100 ">Bayar</button>
                                    </div>
                                </div>
                            </div>


                </form>
            </div>
        </section>
        <x-modal.select-obat />
        <x-modal.select-jasa />
        <x-modal.select-resep />
        {{-- <x-modal.create-obat />r
        <x-modal.create-resep />
        <x-modal.create-jasa /> --}}
        <x-modal.create-customer />
        <x-modal.create-dokter />
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
            const same = items.find(item => item.id == id)
            if (same) return;
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

        const setMax = (e, max) => {
            console.log(e, max)
            if (e.target.value > max) {
                e.target.value = max
            }
            sumSubTotal(e)

        };
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
            const subtotalText = document.getElementById(`subtotal-text-${id}`);
            const type = document.getElementById(`type-${id}`);
            let item = items.find(item => item.id == id)
            if (item.type === 'obat') {
                const obat = obats.find(o => o['id_obat'] == id)
                const satuan_item = obat['stok_obat'].find(stok => stok.satuan == satuan.value)
                subtotal.value = parseInt(satuan_item.harga) * kuantitas.value || 0
            } else {
                subtotal.value = item.harga * kuantitas.value || 0
            }

            subtotalText.innerHTML = Number(subtotal.value).toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            const subtotals = Array.from(document.querySelectorAll('.item-subtotal'));
            const sum = subtotals.reduce((acc, curr) => acc + parseFloat(curr.value), 0);
            total.innerHTML = sum.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

        }
        const addTableRow = async (item) => {
            checkTableRow()
            const itemTable = document.getElementById("item-table");
            const row = itemTable.insertRow();
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);
            let cell4 = row.insertCell(3);
            let cell5 = row.insertCell(4);
            let cell6 = row.insertCell(5)


            cell1.innerHTML = `<input type="text" name="ids[]" id="id-${item.id}"
                                    class="form-control" hidden value="${item.id}">
<p class="m-0">${item.nama}</p> 
                                    <input hidden type="text" name="nama[]"
                                    class="form-control" disabled value="${item.nama}">`

            cell2.innerHTML = `<p class="m-0">${item.type}</p> <input type="hidden"  name="type[]"
                                    class="form-control" id="type-${item.id}" value="${item.type}">`
            cell3.innerHTML =
                `<select type="text"  id="satuan-${item.id}" name="satuan[]"
                                    class="form-control" onchange="sumSubTotal(event)"> ${item.type!='obat'?`<option value="${item.type}" selected></option>`:''}"</select>`
            if (item.type === 'obat') {
                await getItem(item.id);
                const satuan = document.getElementById(`satuan-${item.id}`)
                const obat = obats.find(o => o['id_obat'] == item.id)
                const satuan_item = obat['stok_obat'].find(stok => stok.satuan == satuan.value)

                cell4.innerHTML = `<input type="number" id="kuantitas-${item.id}" name="kuantitas[]" min="1" max="${satuan_item.kuantitas}"  onchange="setMax(event,${satuan_item.kuantitas})" value="0"
                                    class="form-control"   data-toggle="tooltip"
                                    data-placement="left" title="Stok yang tersedia : ${satuan_item.kuantitas}" >
                                    `
            } else if (item.type === 'resep') {
                console.log('resep')
            } else {

                cell4.innerHTML = `<input type="number" id="kuantitas-${item.id}" name="kuantitas[]" value="0"
                                  class="form-control kuantitas" onchange="sumSubTotal(event)">`
            }
            cell5.innerHTML = `<span class="m-0" id="subtotal-text-${item.id}">${ Number(0).toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            })}</span> <input type="hidden" id="subtotal-${item.id}" name="harga[]"
                                    class="form-control item-subtotal" value="0"  >`
            cell6.innerHTML =
                `<button  type="button" class="btn btn-icon btn-sm btn-danger"  onclick="removeItem(event,${item.id})"><i class="fas fa-times"></i></button>`
            items.push(item)
            itemCount++;
        }
        const removeItem = (e, id) => {
            let target = e.target
            if (target.tagName != 'TR') {
                target = target.closest('tr');
            }
            target.remove()

            let indexToRemove = items.findIndex((item) => item.id == id);
            if (indexToRemove !== -1) {
                items.splice(indexToRemove, 1);
            }
            const subtotals = Array.from(document.querySelectorAll('.item-subtotal'));
            const sum = subtotals.reduce((acc, curr) => acc + parseFloat(curr.value), 0);
            total.innerHTML = sum.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

        }
        const getItem = async (id) => {
            await $.ajax({
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

        new Cleave('.currency', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
    @stack('kasir-scripts')
@endpush

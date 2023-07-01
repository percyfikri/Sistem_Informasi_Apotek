@extends('layouts.app')

@section('title', 'Dashboard ')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengguna</h4>
                            </div>
                            <div class="card-body">
                                {{ $penggunaCount }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Penjualan</h4>
                            </div>
                            <div class="card-body">
                                {{ $penjualanCount }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-prescription"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Resep</h4>
                            </div>
                            <div class="card-body">
                                {{ $resepCount }}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-prescription-bottle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Racikan</h4>
                            </div>
                            <div class="card-body">
                                {{ $racikanCount }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Penjualan</h4>
                            <div class="card-header-action">
                                <div class="card-header-action">
                                    <a href="#summary-week" data-tab="summary-tab" class="btn  active">Minggu</a>
                                    <a href="#summary-month" data-tab="summary-tab" class="btn ">Bulan</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <div class="summary-chart  active" data-tab-group="summary-tab" id="summary-week">
                                    <canvas id="penjualan-weekly-chart" height="100"></canvas>
                                </div>
                                <div class="summary-chart " data-tab-group="summary-tab" id="summary-month">
                                    <canvas id="penjualan-monthly-chart" height="100"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penjualan Terbaru</h4>
                            <div class="card-header-action">
                                <a href="{{ route('penjualan.index') }}" class="btn btn-success">Lihat Lainnya<i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table-striped table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Nama Apoteker</th>
                                        <th>Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($newestTransaction as $nt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $nt->customer?->nama }}</td>
                                            <td>{{ $nt->apoteker?->nama }}</td>
                                            <td>{{ \Carbon\Carbon::parse($nt->tanggal)->diffForhumans() }}</td>
                                            <td><a href="{{ route('penjualan.show', $nt->id_penjualan) }}"
                                                    class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                    {{-- <div class="card">
                        <div class="card-header">
                            <h4>Penjualan Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="rounded-circle mr-3" width="50"
                                        src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">Now</div>
                                        <div class="media-title">Panadol</div>
                                        <span class="text-small text-muted">Rp 10,000</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3" width="50"
                                        src="{{ asset('img/avatar/avatar-2.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">12m</div>
                                        <div class="media-title">Panadol</div>
                                        <span class="text-small text-muted">Rp 10,000</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3" width="50"
                                        src="{{ asset('img/avatar/avatar-3.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">17m</div>
                                        <div class="media-title">Panadol</div>
                                        <span class="text-small text-muted">Rp 20,000</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3" width="50"
                                        src="{{ asset('img/avatar/avatar-4.png') }}" alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">21m</div>
                                        <div class="media-title">Bodrex</div>
                                        <span class="text-small text-muted">Rp 10,000</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="#" class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="card">
                        <div class="card-header">
                            <h4>This Week Stats</h4>
                            <div class="card-header-action">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-primary"
                                        data-toggle="dropdown">Filter</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i>
                                            Electronic</a>
                                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i>
                                            T-shirt</a>
                                        <a href="#" class="dropdown-item has-icon"><i class="far fa-circle"></i>
                                            Hat</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="summary">
                                <div class="summary-info">
                                    <h4>$1,053</h4>
                                    <div class="text-muted">Sold 3 items on 2 customers</div>
                                    <div class="d-block mt-2">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                                <div class="summary-item">
                                    <h6>Item List <span class="text-muted">(3 Items)</span></h6>
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/products/product-1-50.png') }}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">$405</div>
                                                <div class="media-title"><a href="#">PlayStation 9</a></div>
                                                <div class="text-muted text-small">by <a href="#">Hasan Basri</a>
                                                    <div class="bullet"></div> Sunday
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/products/product-2-50.png') }}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">$499</div>
                                                <div class="media-title"><a href="#">RocketZ</a></div>
                                                <div class="text-muted text-small">by <a href="#">Hasan Basri</a>
                                                    <div class="bullet"></div> Sunday
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <a href="#">
                                                <img class="mr-3 rounded" width="50"
                                                    src="{{ asset('img/products/product-3-50.png') }}" alt="product">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-right">$149</div>
                                                <div class="media-title"><a href="#">Xiaomay Readme 4.0</a></div>
                                                <div class="text-muted text-small">by <a href="#">Kusnaedi</a>
                                                    <div class="bullet"></div> Tuesday
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
    <script>
        // var ctx = document.getElementById("penjualan-chart").getContext('2d');

        function report_penjualan_weekly() {
            $.ajax({
                type: "GET",
                url: "{{ route('penjualan.report.weekly') }}",
                success: function(response) {
                    1

                    let ctx = $('#penjualan-weekly-chart');
                    let config = {
                        type: 'line',
                        data: {
                            labels: response.labels,
                            datasets: [{
                                label: 'Penjualan Minggu Ini',
                                data: response.values,
                                backgroundColor: 'rgba(103, 119, 239, 0.5)',

                            }]
                        }
                    };
                    let chart = new Chart(ctx, config);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        }

        function report_penjualan_monthly() {
            $.ajax({
                type: "GET",
                url: "{{ route('penjualan.report.monthly') }}",
                success: function(response) {
                    1

                    let ctx = $('#penjualan-monthly-chart');
                    let config = {
                        type: 'line',
                        data: {
                            labels: response.labels,
                            datasets: [{
                                label: 'Penjualan Bulan Ini',
                                data: response.values,
                                backgroundColor: 'rgba(103, 119, 239, 0.5)',

                            }, ]
                        }
                    };
                    let chart = new Chart(ctx, config);
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON);
                }
            });
        }
        report_penjualan_monthly()
        report_penjualan_weekly()

        // var myChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],

        //         datasets: [{
        //             label: 'Statistics',
        //             data: [460, 458, 330, 502, 430, 610, 488],
        //             borderWidth: 2,
        //             backgroundColor: '#6777ef',
        //             borderColor: '#6777ef',
        //             borderWidth: 2.5,
        //             pointBackgroundColor: '#ffffff',
        //             pointRadius: 4
        //         }]
        //     },
        //     options: {
        //         legend: {
        //             display: false
        //         },
        //         scales: {
        //             yAxes: [{
        //                 gridLines: {
        //                     drawBorder: false,
        //                     color: '#f2f2f2',
        //                 },
        //                 ticks: {
        //                     beginAtZero: true,
        //                     stepSize: 150
        //                 }
        //             }],
        //             xAxes: [{
        //                 ticks: {
        //                     display: false
        //                 },
        //                 gridLines: {
        //                     display: false
        //                 }
        //             }]
        //         },
        //     }
        // });

        // ajax_chart(myChart, json_url);

        // function ajax_chart(chart, url, data) {
        //     var data = data || {};

        //     $.getJSON(url, data).done(function(response) {
        //         chart.data.labels = response.labels;
        //         chart.data.datasets[0].data = response.data.quantity; // or you can iterate for multiple datasets
        //         chart.update(); // finally update our chart
        //     });
        // }
    </script>
@endpush

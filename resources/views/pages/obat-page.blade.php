@extends('layouts.app')

@section('title', 'Halaman Obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Obat</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Obat</h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table-md table">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Jenis Obat</th>
                                            <th>Created At</th>
                                            <th>Update At</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Bodrex</td>
                                            <td>Pil</td>
                                            <td>2023-01-13</td>
                                            <td>2023-01-16</td>
                                            <td><a href="#"
                                                    class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Amoxilin</td>
                                            <td>Pil</td>
                                            <td>2022-08-10</td>
                                            <td>2022-08-14</td>
                                            <td><a href="#"
                                                    class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Panadol</td>
                                            <td>Cair</td>
                                            <td>2022-09-07</td>
                                            <td>2022-09-10</td>
                                            <td><a href="#"
                                                    class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Sangobion</td>
                                            <td>Kapsul</td>
                                            <td>2023-01-05</td>
                                            <td>2023-01-07</td>
                                            <td><a href="#"
                                                    class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>CDR</td>
                                            <td>Pil</td>
                                            <td>2023-04-02</td>
                                            <td>2023-04-16</td>
                                            <td><a href="#"
                                                    class="btn btn-primary">Detail</a></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

@extends('layouts.app')

@section('title', 'Halaman Edit Obat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form>
                            <div class="card-header">
                                <h4>Form Edit Obat</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text"
                                        class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Obat</label>
                                    <input type="text"
                                        class="form-control"
                                        required="">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
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
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

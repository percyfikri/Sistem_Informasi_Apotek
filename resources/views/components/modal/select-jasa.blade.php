<div class="modal fade" tabindex="-1" role="dialog" id="select-jasa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Jasa</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-striped table w-100" id="jasa-table">
                        <thead>
                            <tr>
                                <th>Nama Jasa</th>
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
            {{-- <div class="modal-footer bg-whitesmoke br">
                <button type="" class="btn btn-icon btn-primary icon-left" data-dismiss="modal"
                    data-toggle="modal" data-target="#create-jasa"> <i class="fas fa-plus">Tambah</i>
                </button>
            </div> --}}
        </div>
    </div>
</div>
@push('kasir-scripts')
    <script>
        $("#jasa-table").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagingType: "simple",
            orderClasses: false,
            deferRender: true,
            pageLength: 5,
            bLengthChange: false,

            order: [
                [1, "asc"]
            ],

            ajax: '{!! route('jasa.index') !!}',
            columns: [{
                    data: "nama_jasa",
                    name: "nama_jasa",
                },
                {
                    data: "tingkatan",
                    name: "tingkatan",
                },
                {
                    data: "harga",
                    name: "harga",
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `<div class="text-center"> <button data-dismiss="modal"  type="button" class="btn check-product btn-icon btn-success" data-id="${data.id_jasa}" data-type="jasa"
            data-nama="${data.nama_jasa}" data-harga="${data.harga}" onclick="addToTable(event)">
            <i class="fas fa-check"></i>
        </button></div>`;
                    },
                },
            ],
        });
    </script>
@endpush

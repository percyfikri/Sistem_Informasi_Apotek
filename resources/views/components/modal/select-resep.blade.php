<div class="modal fade" tabindex="-1" role="dialog" id="select-resep">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Resep</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-striped table w-100" id="resep-table">
                        <thead>
                            <tr>
                                <th>Nama Resep</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-icon btn-primary icon-left" data-toggle="modal"
                    data-target="#create-resep"> <i class="fas fa-plus">Tambah</i>
                </button>
            </div>
        </div>
    </div>
</div>
@push('kasir-scripts')
    <script>
        // $('#choose-product').on('show.bs.modal', function(event) {
        // const button = $(event.relatedTarget)
        // const action = button.data('action')
        // const form = $(this).find('#confirm-delete-form')
        // form.attr('action', `${action}`);
        // console.log(form)
        // })
        $("#resep-table").DataTable({
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

            ajax: "/resep-obat",
            columns: [{
                    data: "nama_resep",
                    name: "nama_resep",
                },
                {
                    data: "status",
                    name: "status",
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `<div class="text-center"> <button data-dismiss="modal"  type="button" class="btn check-product btn-icon btn-success" data-id="${data.id_resep}" data-type="resep"
            data-nama="${data.nama_resep}" data-type="resep" data-harga="10000" onclick="addToTable(event)">
            <i class="fas fa-check"></i>
        </button></div>`;
                    },
                },
            ],
        });
    </script>
@endpush

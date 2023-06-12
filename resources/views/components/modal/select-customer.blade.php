<div class="modal fade" tabindex="-1" role="dialog" id="select-customer">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Customer</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-striped table w-100" id="customer-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="" class="btn btn-icon btn-primary icon-left" data-dismiss="modal"
                    data-toggle="modal" data-target="#create-customer"> <i class="fas fa-plus">Tambah</i>
                </button>
            </div>
        </div>
    </div>
</div>
@push('kasir-scripts')
    <script>
        $("#customer-table").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            pagingType: "simple",
            orderClasses: false,
            deferRender: true,
            pageLength: 5,
            bLengthChange: false,

            order: [
                [0, "asc"]
            ],

            ajax: "/api/pengguna/customer",
            columns: [{
                    data: "nama",
                    name: "nama",
                },

                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `<div class="text-center"> <button data-dismiss="modal"  type="button" class="btn check-product btn-icon btn-success" data-id="${data.id_pengguna}"
            data-nama="${data.nama}" onclick="addCustomer(event)">
            <i class="fas fa-check"></i>
        </button></div>`;
                    },
                },
            ],
        })

        const addCustomer = (e) => {
            let target = event.target
            if (target.tagName != 'BUTTON') {
                target = target.closest('button');
            }
            const id = target.dataset.id
            const nama = target.dataset.nama
            $('#customer-id').val(id)
            $('#customer-name').removeClass('d-none')
            $('#customer-name').html(nama)
            $('#btn-remove-customer').removeClass('d-none')
            $('#btn-add-customer').addClass('d-none')
        }
        const removeCustomer = (e) => {
            $('#customer-id').val('')
            $('#customer-name').addClass('d-none')
            $('#customer-name').html()
            $('#btn-remove-customer').addClass('d-none')
            $('#btn-add-customer').removeClass('d-none')
        }
    </script>
@endpush

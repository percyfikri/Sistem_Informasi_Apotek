<div class="modal fade" tabindex="-1" role="dialog" id="select-dokter">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Dokter</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table-striped table w-100" id="dokter-table">
                        <thead>
                            <tr>
                                <th>Nama</th>

                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="" class="btn btn-icon btn-primary icon-left" data-dismiss="modal"
                    data-toggle="modal" data-target="#create-dokter"> <i class="fas fa-plus">Tambah</i>
                </button>


            </div>
        </div>
    </div>
</div>
@push('kasir-scripts')
    <script>
        $("#dokter-table").DataTable({
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

            ajax: "/api/pengguna/dokter",
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
            data-nama="${data.nama}" onclick="addDokter(event)">
            <i class="fas fa-check"></i>
        </button></div>`;
                    },
                },
            ],
        });
        const addDokter = (e) => {
            let target = event.target
            if (target.tagName != 'BUTTON') {
                target = target.closest('button');
            }
            const id = target.dataset.id
            const nama = target.dataset.nama
            $('#dokter-id').val(id)
            $('#dokter-name').html(nama)
            $('#dokter-name').removeClass('d-none')
            $('#btn-remove-dokter').removeClass('d-none')
            $('#btn-add-dokter').addClass('d-none')
        }
        const removeDokter = (e) => {
            $('#dokter-id').val('')
            $('#dokter-name').addClass('d-none')
            $('#dokter-name').html()
            $('#btn-remove-dokter').addClass('d-none')
            $('#btn-add-dokter').removeClass('d-none')
        }
    </script>
@endpush

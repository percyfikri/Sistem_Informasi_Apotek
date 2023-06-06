// $('#choose-product').on('show.bs.modal', function(event) {
//     const button = $(event.relatedTarget)
//     const action = button.data('action')
//     const form = $(this).find('#confirm-delete-form')
//     form.attr('action', `${action}`);
//     console.log(form)
// })
$("#obat-table").DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pagingType: "simple",
    orderClasses: false,
    deferRender: true,
    pageLength: 5,
    bLengthChange: false,

    order: [[1, "asc"]],

    ajax: "/obat",
    columns: [
        {
            data: "nama_obat",
            name: "nama_obat",
        },
        {
            data: "jenis_obat",
            name: "jenis_obat",
        },
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data, type, row) {
                return `<div class="text-center"> <button class="btn  btn-icon btn-success" data-id="${data.id_obat}" data-name="${data.nama_obat}" onclick="addToTable(event)"> <i class="fas fa-check"></i>
                                </button></div>`;
            },
        },
    ],
});

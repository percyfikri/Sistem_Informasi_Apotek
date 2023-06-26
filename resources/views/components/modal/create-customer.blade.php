<div class="modal fade" tabindex="-1" role="dialog" id="create-customer">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Customer</h5>

                <button type="button" class="close" id="dismiss-customer" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pengguna.store') }}" id="create-customer-form" method="POST">
                <div class="modal-body">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama"
                                class="form-control @if (old('nama')) is-valid @endif
                                @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}">
                        </div>


                        <select class="form-control"hidden name="status"
                            class="form-control @if (old('status')) is-valid @endif
                                @error('status') is-invalid @enderror"
                            value="{{ old('status') }}">
                            <option selected value="customer">Customer</option>
                        </select>

                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('kasir-scripts')
    <script>
        $('#create-customer-form').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: '{!! route('customer.store') !!}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $("#dismiss-customer").trigger({
                        type: "click"
                    });
                    $("#btn-add-customer").trigger({
                        type: "click"
                    });
                    $('#customer-table').DataTable().ajax.reload();

                }
            })
        })
    </script>
@endpush

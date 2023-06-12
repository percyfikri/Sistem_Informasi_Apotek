<div class="modal fade" tabindex="-1" role="dialog" id="create-obat">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Obat</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('obat.store') }}" id="create-obat-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama obat</label>
                        <input type="text" name="nama_obat"
                            class="form-control @if (old('nama_obat')) is-valid @endif
                                @error('nama_obat') is-invalid @enderror"
                            value="{{ old('nama_obat') }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis obat</label>
                        <input type="text" name="jenis_obat"
                            class="form-control @if (old('jenis_obat')) is-valid @endif
                                @error('jenis_obat') is-invalid @enderror"
                            value="{{ old('jenis_obat') }}">
                    </div>

                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </div>
    </div>
</div>
@push('kasir-scripts')
    <script>
        $('#create-obat-form').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: '!!{{ route('obat.store') }}!!',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#myModal .modal-body').html('<p>Form submitted successfully!</p>');
                }
            })
        })
    </script>
@endpush

<div class="modal fade" tabindex="-1" role="dialog" id="create-resep">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jasa</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('resep-obat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Resep</label>
                        <input type="text" name="nama_resep"
                            class="form-control @if (old('nama_resep')) is-valid @endif
                                @error('nama_resep') is-invalid @enderror"
                            value="{{ old('nama_resep') }}">
                    </div>
                    <div class="form-group">
                        <label for="id_customer">Nama Customer</label>
                        <select class="form-control" name="id_customer" id="id_customer">
                            {{-- @foreach ($customers as $customer)
                                <option value="{{ $customer->id_pengguna }}">{{ $customer->nama }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_dokter">Nama Dokter</label>
                        <select class="form-control" name="id_dokter" id="id_dokter">
                            {{-- @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id_pengguna }}">{{ $dokter->nama }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="racikan" @if (old('status') == 'racikan') selected @endif>Racikan</option>
                            <option value="non racikan" @if (old('status') == 'non racikan') selected @endif>Non-Racikan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="" rows="60" style="resize: none; height: 8rem" class="form-control"
                            @if (old('deskripsi')) is-valid @endif @error('deskripsi') is-invalid @enderror
                            value="{{ old('deskripsi') }}"></textarea>
                        {{-- <input type="text" name="deskripsi"
                                    class="form-control > --}}
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date" id="tanggal-picker" data-target-input="nearest">
                            <input type="date" name="tanggal" class="form-control datetimepicker-input"
                                data-target="#tanggal-picker" value="{{ old('tanggal') }}" />
                            <div class="input-group-append" data-target="#tanggal-picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
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
        $('#create-resep-form').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: '!!{{ route('resep-obat.store') }}!!',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#myModal .modal-body').html('<p>Form submitted successfully!</p>');
                }
            })
        })
    </script>
@endpush

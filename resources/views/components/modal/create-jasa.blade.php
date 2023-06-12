<div class="modal fade" tabindex="-1" role="dialog" id="create-jasa">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jasa</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jasa.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Jasa</label>
                        <input type="text" name="nama_jasa"
                            class="form-control @if (old('nama_jasa')) is-valid @endif 
                                @error('nama_jasa') is-invalid @enderror"
                            value="{{ old('nama_jasa') }}">
                        @error('nama_jasa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Apoteker</label>
                        <select id="id-apoteker" name="id_apoteker" class="form-control" required>
                            @if (old('id_apoteker'))
                                <option value="{{ old('id_apoteker') }}" selected>{{ old('nama_apoteker') }}
                                </option>
                            @endif
                        </select>
                        @error('id_apoteker')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" id="nama-apoteker" name="nama_apoteker" value="{{ old('nama_apoteker') }}">
                    <div class="form-group">
                        <label class="form-label">Tingkatan</label>
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="tingkatan" value="1" class="selectgroup-input"
                                    @if (old('tingkatan') == 1) checked @endif required>
                                <span class="selectgroup-button">Rendah</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="tingkatan" value="2" class="selectgroup-input"
                                    @if (old('tingkatan') == 2) checked @endif>
                                <span class="selectgroup-button">Sedang</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="tingkatan" value="3" class="selectgroup-input"
                                    @if (old('tingkatan') == 3) checked @endif>
                                <span class="selectgroup-button">Tinggi</span>
                            </label>
                        </div>
                        @error('tingkatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" name="harga"
                                class="form-control currency @if (old('harga')) is-valid @endif 
                                    @error('harga') is-invalid @enderror"
                                value="{{ old('harga') }}">
                        </div>
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
        $('#create-jasa-form').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: '!!{{ route('jasa.store') }}!!',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#myModal .modal-body').html('<p>Form submitted successfully!</p>');
                }
            })
        })
    </script>
@endpush

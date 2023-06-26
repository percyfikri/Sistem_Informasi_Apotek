  <div class="modal fade" tabindex="-1" role="dialog" id="confirm-delete-modal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">

              <div class="modal-header">
                  <h5 class="modal-title">Konfirmasi Penghapusan!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus data ini!</p>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <form id="confirm-delete-form" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
              </div>
          </div>
      </div>
  </div>

  @push('scripts')
      <script>
          $('#confirm-delete-modal').on('show.bs.modal', function(event) {
              const button = $(event.relatedTarget)
              const action = button.data('action')
              const form = $(this).find('#confirm-delete-form')
              form.attr('action', `${action}`);
              console.log(form)
          })
      </script>
  @endpush

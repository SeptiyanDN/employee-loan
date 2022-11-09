<!-- Modal -->
<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="" class='form-horizontal' method="POST">
        @csrf
        @method('post')
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="deskripsi" class="col-sm-12 control-label">Jenis pengeluaran</label>
                    <div class="col-sm-12">
                      <input type="text" name="deskripsi_pemasukan" id="deskripsi_pemasukan" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="col-sm-12 control-label">Keterangan</label>
                    <div class="col-sm-12">
                      <input type="text" name="keterangan" id="keterangan" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nominal" class="col-sm-2 control-label">Nominal</label>
                    <div class="col-sm-12">
                        <input type="number" name="nominal" id="nominal" class="form-control" required autofocus readonly>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="form-group" >
                    <label for="nominal" class="col-sm-12 control-label">Bukti Transaksi</label>
                    <div class='col-sm-12'>
                        <img src="" style="height:100px;width:100px" >

                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button"  class="btn btn-secondary" class="close" data-bs-dismiss="modal">Close</button>
            </div>
          </div>

      </form>
    </div>
  </div>

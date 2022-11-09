<<div class="modal inmodal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" class="form-horizontal" method="post">
            @csrf
            @method('post')
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required
                        autofocus>
                    <span class="help-block with-errors"></span>
                </div>
            </div>        </div>
        <div class="modal-footer">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
    </div>
  </div>

<div class="modal inmodal" id="modal-supplier" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-supplier">
    <div class="modal-dialog modal-lg">
            <div class="modal-content animated fadeIn">
                <div class="modal-header">
          <h5 class="modal-title">Pilihan Supplier</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="ibox-content">
                <div class="table-responsive">
                    <table id="table-supplier" class="table table-striped table-bordered table-hover table-supplier">
                        <thead>
                            <th>Nama Penanggung Jawab</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th width="5%"><i class="fa fa-cog"></i></th>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $item)
                            <tr>
                                <td>{{$item->nama_supplier}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>{{$item->kelurahan}}</td>
                                <td>
                                    <a href="{{ route('pembelian.create', $item->id) }}"
                                        class="btn btn-xs btn-primary"><i class="fa fa-plus-circle">
                                            Pilih</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

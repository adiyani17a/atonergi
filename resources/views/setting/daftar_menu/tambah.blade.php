<!-- Modal -->
<div id="daftar-menu" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Daftar Menu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <table class="table tabel_modal">
            <tr>
              <td>Nama Menu</td>
              <td>
                <input type="text" name="nama" class="nama form-control huruf_besar">
                  <input type="hidden" name="id" class="id" >
              </td>
            </tr>
            <tr>
              <td>Grup Menu</td>
              <td>
                <select name="grup_menu" class="grup_menu form-control">
                  @foreach($grup_menu as $val)
                  <option value="{{ $val->gm_id }}">{{ $val->gm_nama }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary simpan" >Save Data</button>
        <button type="button" class="btn btn-warning">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="tambah-akun" class="modal fade" role="dialog">
  <div class="modal-dialog modal-m">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Setting Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
            <table class="table tabel_modal"">
              <tr>
                <td>Username</td>
                <td>
                  <input type="text" name="user"  placeholder="username" class="username form-control form-control-sm">
                  <input type="hidden" name="id" class="id">
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="text" name="pass" placeholder="password" class="password form-control form-control-sm"></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" placeholder="nama" class="nama huruf_besar form-control form-control-sm"></td>
              </tr>
              <tr>
                <td>Akun Level</td>
                <td>
                  <select class="level" name="level" class="form-control">
                    <option value="0">Pilih - Level</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Photo</td>
                <td>
                  <div class="file-upload">
                    <div class="file-select">
                      <div class="file-select-button" id="fileName">Gambar</div>
                      <div class="file-select-name" id="noFile">Pilih Gambar...</div> 
                      <input type="file" name="ed_img" id="chooseFile">
                      <img width="200" height="100">
                    </div>
                  </div>
                </td>
              </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary simpan" >Save Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
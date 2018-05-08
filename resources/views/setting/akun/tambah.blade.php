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
                  <label style="color: red" class="valid_username"><b>Username Harus Diisi</b></label>
                  <input type="hidden" name="id" class="id">
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td>
                  <input type="text" name="pass" placeholder="password" class="password form-control form-control-sm">
                  <label style="color: red" class="valid_password"><b>Password Harus Diisi</b></label>
                </td>
              </tr>
              <tr>
                <td>Name</td>
                <td>
                  <input type="text" name="nama" placeholder="nama" class="nama huruf_besar form-control form-control-sm">
                  <label style="color: red" class="valid_name"><b>Nama Harus Diisi</b></label>
                </td>
              </tr>
              <tr>
                <td>Account Level</td>
                <td>
                  <select class="level" name="level" class="form-control">
                    <option value="0">Choose - Level</option>
                    @foreach($level as $val)
                      <option value="{{$val->j_id}}">{{$val->j_nama}}</option>
                    @endforeach
                  </select>
                  <label style="color: red" class="valid_level"><b>Level Harus Dipilih</b></label>
                </td>
              </tr>
              <tr>
                <td>Photo</td>
                <td>
                  <div class="file-upload">
                    <div class="file-select">
                      <div class="file-select-button" id="fileName">Image</div>
                      <div class="file-select-name" id="noFile">Choose Image...</div> 
                      <input type="file" name="image" onchange="loadFile(event)" id="chooseFile">
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Preview</td>
                <td align="center">
                  <div>
                      <img style="width: 100px;height: 100px;border:1px solid pink" id="output" >
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
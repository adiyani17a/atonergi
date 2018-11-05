<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h4 class="modal-title">Tambah Master Data Akun Keuangan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
            <div class="col-md-3 col-sm-12 col-xs-12">
              <label>Tipe Akun</label>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm" id="">
                  <option disabled selected>--Pilih--</option>
                  <option value="gnr">General</option>
                  <option value="dtl">Detail</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Kelompok Akun</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                    <select class="form-control form-control-sm" name="kelompok_akun" id="kelompok_akun">
                      <option disabled selected>--Pilih--</option>
                      <option value="1">Aset Lancar</option>
                      <option value="2">Aset Tidak Lancar</option>
                      <option value="3">Kewajiban Jangka Pendek</option>
                      <option value="4">Ekuitas</option>
                      <option value="5">Pendapatan</option>
                      <option value="6">Beban Usaha</option>
                      <option value="7">Pendapatan Lain-Lain</option>
                      <option value="8">Beban Lain-Lain</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Nomor Akun</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <div class="input-group">
                      <span class="input-group-addon bg-default border-default">1.</span>
                      <input type="text" name="" class="form-control" placeholder="Masukkan Nomor Akun">
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Nama Akun</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <input type="text" name="" class="form-control" placeholder="Masukkan Nama Akun">
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Debet / Kredit</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                    <select class="form-control form-control-sm" id="">
                      <option disabled selected>--Pilih--</option>
                      <option value="dbt">DEBET</option>
                      <option value="kdt">KREDIT</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Group Neraca</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <input type="text" name="" class="form-control" placeholder="Masukkan Group Neraca">
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Group Laba Rugi</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <input type="text" name="" class="form-control" placeholder="Masukkan Group Laba Rugi">
                  </div>
                </div>
              </div>
            </div>
          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="button">Simpan</button>
      </div>
    </div>

  </div>
</div>

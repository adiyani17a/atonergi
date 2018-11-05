<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Edit Master Akun Keuangan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
            <div class="col-md-3 col-sm-12 col-xs-12">
              <label>Tipe Akun</label>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm" id="" disabled>
                  <option disabled >--Pilih--</option>
                  <option value="gnr" selected>General</option>
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
                    <select class="form-control form-control-sm" name="kelompok_akun" id="kelompok_akun" disabled>
                      <option disabled >--Pilih--</option>
                      <option value="1" selected>Aset Lancar</option>
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
                      <!-- <span class="input-group-addon bg-default border-default">1.</span> -->
                      <input type="text" name="" class="form-control" value="1.00.01" disabled>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Nama Akun</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <input type="text" name="" class="form-control" value="Kas Besar">
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Debet / Kredit</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group">
                    <select class="form-control form-control-sm" id="">
                      <option disabled >--Pilih--</option>
                      <option value="dbt" selected>DEBET</option>
                      <option value="kdt">KREDIT</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Group Neraca</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <select name="group_neraca_detail" id="group_neraca_detail" class="form-control form-control-sm">
                      <option disabled >--Pilih--</option>
                      <option value="A1-00" selected>kas (A1-00)</option>
                      <option value="1.01_(bank)">bank (1.01 (bank))</option>
                      <option value="A1-05">piutang usaha (A1-05)</option>
                      <option value="A-5.00">Pendapatan Penjualan (A-5.00)</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <label>Group Laba Rugi</label>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group form-group-sm">
                    <select name="group_neraca_detail" id="group_neraca_detail" class="form-control form-control-sm">
                      <option disabled >--Pilih--</option>
                      <option value="A1-00" selected>kas (A1-00)</option>
                      <option value="1.01_(bank)">bank (1.01 (bank))</option>
                      <option value="A1-05">piutang usaha (A1-05)</option>
                      <option value="A-5.00">Pendapatan Penjualan (A-5.00)</option>
                    </select>
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

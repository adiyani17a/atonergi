
<!-- Modal -->
<form id="form_cari">
<div id="cari" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:400px">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Cari</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">

            
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <label>Vendor</label>
                </div>
                <div class="col-md-10 col-sm-6 col-xs-12">
                  <div class="form-group">
                      <select class="form-control form-control-sm" name="cari_vendor" id="cari_vendor">
                        <option selected="" value="">- Pilih -</option>
                          @foreach ($vendor as $v)
                              <option value="{{ $v->s_kode }}" data-name="{{ $v->s_name }}">{{ $v->s_kode }} - {{ $v->s_company }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <label>No.ro</label>
                </div>
                <div class="col-md-10 col-sm-6 col-xs-12">
                  <div class="form-group">
                      <select class="form-control form-control-sm" name="cari_ro" id="cari_ro">
                        <option selected="" value="">- Pilih -</option>
                      </select>
                  </div>
                </div>

              
              </div>

              
           </div>

        
         

         
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" id="create_po" style="margin-right: 0.1px;">Process</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal" style="margin-right: 50px;">Close</button>
      </div>
    </div>

  </div>
</div>
</div>
</form>
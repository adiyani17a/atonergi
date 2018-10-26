@extends('main')
@section('extra_style')
<style type="text/css">
  .min-width{
    min-width: 200px;
  }
</style>
@endsection
@section('content')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">HRD</li>
          <li class="breadcrumb-item"><a href="{{url('hrd/payroll/payroll')}}">Payroll</a></li>
          <li class="breadcrumb-item active" aria-current="page">Form Payroll</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Payroll</h4>
                <div class="row">
                  
                  <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <label>Date</label>
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <input type="text" readonly="" class="form-control form-control-sm" value="10" name="">
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <label>Month</label>
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <select class="form-control form-control-sm" id="cb_month">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <label>Year</label>
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="form-group">
                          <select class="form-control" id="cb_year">
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2027">2027</option>
                              <option value="2028">2028</option>
                              <option value="2029">2029</option>
                              <option value="2030">2030</option>
                              <option value="2031">2031</option>
                              <option value="2032">2032</option>
                              <option value="2033">2033</option>
                              <option value="2034">2034</option>
                              <option value="2035">2035</option>
                              <option value="2036">2036</option>
                              <option value="2037">2037</option>
                              <option value="2038">2038</option>
                              <option value="2039">2039</option>
                              <option value="2040">2040</option>
                              <option value="2041">2041</option>
                              <option value="2042">2042</option>
                              <option value="2043">2043</option>
                              <option value="2044">2044</option>
                              <option value="2045">2045</option>
                              <option value="2046">2046</option>
                              <option value="2047">2047</option>
                              <option value="2048">2048</option>
                              <option value="2049">2049</option>
                              <option value="2050">2050</option>
                              <option value="2051">2051</option>
                              <option value="2052">2052</option>
                              <option value="2053">2053</option>
                              <option value="2054">2054</option>
                              <option value="2055">2055</option>
                              <option value="2056">2056</option>
                              <option value="2057">2057</option>
                              <option value="2058">2058</option>
                              <option value="2059">2059</option>
                              <option value="2060">2060</option>
                              <option value="2061">2061</option>
                              <option value="2062">2062</option>
                              <option value="2063">2063</option>
                              <option value="2064">2064</option>
                              <option value="2065">2065</option>
                              <option value="2066">2066</option>
                              <option value="2067">2067</option>
                              <option value="2068">2068</option>
                              <option value="2069">2069</option>
                              <option value="2070">2070</option>
                              <option value="2071">2071</option>
                              <option value="2072">2072</option>
                              <option value="2073">2073</option>
                              <option value="2074">2074</option>
                              <option value="2075">2075</option>
                              <option value="2076">2076</option>
                              <option value="2077">2077</option>
                              <option value="2078">2078</option>
                              <option value="2079">2079</option>
                              <option value="2080">2080</option>
                              <option value="2081">2081</option>
                              <option value="2082">2082</option>
                              <option value="2083">2083</option>
                              <option value="2084">2084</option>
                              <option value="2085">2085</option>
                              <option value="2086">2086</option>
                              <option value="2087">2087</option>
                              <option value="2088">2088</option>
                              <option value="2089">2089</option>
                              <option value="2090">2090</option>
                              <option value="2091">2091</option>
                              <option value="2092">2092</option>
                              <option value="2093">2093</option>
                              <option value="2094">2094</option>
                              <option value="2095">2095</option>
                              <option value="2096">2096</option>
                              <option value="2097">2097</option>
                              <option value="2098">2098</option>
                              <option value="2099">2099</option>
                              <option value="2100">2100</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="btn-group">
                      <button class="btn btn-primary" onclick="select()">Show</button>
                      <button class="btn btn-info">Save</button>
                      <button class="btn btn-success">Pay Salary</button>
                    </div>
                  </div>
                  
              </div>

              <div id="amx_30_b2_brennus" class="d-none" style="margin-top: 15px;">
                <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <label>Total Salary</label>
                  </div>
                  <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" readonly="" class="form-control-sm form-control" name="">
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <label>Total Taxes</label>
                  </div>
                  <div class="col-md-9 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" readonly="" class="form-control-sm form-control" name="">
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-hover data-table table-striped" cellspacing="0">
                    <thead class="bg-gradient-info">
                      <tr>
                        <th>Name</th>
                        <th title="Jabatan">Position</th>
                        <th title="Kehadiran">Presence</th>
                        <th title="Gaji Pokok">Basic Salary</th>
                        <th title="Tunjangan">Allowance</th>
                        <th title="Gaji + Tunjangan - Potongan">Salary + Allowance - Discount</th>
                        <th>QPE</th>
                        <th>K5</th>
                        <th>PPH 21</th>
                        <th>Total Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <input type="text" class="form-control-sm form-control min-width" name="">
                        </td>
                        <td>
                          <input type="text" class="form-control-sm form-control min-width" name="">
                        </td>
                        <td>
                          <input type="text" class="form-control-sm form-control min-width" name="">
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div> <!-- end div amx 30 b2 brennus -->

              <div class="row" style="margin-top: 15px;">
                <div class="col-md-12 col-sm-12 col-xs-12" align="right">
                  <a href="{{url('hrd/payroll/payroll')}}" class="btn btn-secondary">Back</a>
                </div>
              </div>

            </div>
        </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
  
  function select(){
    var div = $('#amx_30_b2_brennus');
    var month = $('#month');
    var year  = $('#year');
    if (month.val() != '' || year.val() != '') 
    {
      div.removeClass('d-none');
    } else {
      div.addClass('d-none');
    }
  }

  
</script>
@endsection
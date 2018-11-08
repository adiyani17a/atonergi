<!DOCTYPE html>
<html>
<head>
	<title>Schedule Jadwal Uji Coba & Dokumentasi</title>

	<link rel="stylesheet" href="{{asset('assets/node_modules/font-awesome/css/font-awesome.min.css')}}" />

	<style type="text/css">
		html,body{
			padding: 0;
			margin: 0;
			height: 99%
		}
		*:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(small):not(label){
			font-size: 14px;
			font-family: "arial";
		}
		.alamraya-no-padding {
			padding: 0px;
		}
		tr.alamraya-tr-padding > td {
			padding: 10px;
		}
		.s16{
			font-size: 16px !important;
		}
		.calibri{
			font-family: 'calibri';
		}
		.arial{
			font-family: 'arial';
		}
		.div-width{
			width: 900px;
			padding: 160px 0 15px 0;
			background: transparent;
			position: absolute;
		}
		.div-width-background{
			position: relative;
			z-index: -1;
			
			padding: 0;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			width: 900px;
			height: 100%;
		}
		.underline{
			text-decoration: underline;
		}
		.italic{
			font-style: italic;
		}
		.bold{
			font-weight: bold;
		}
		.unbold{
			font-weight: 100;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.text-left{
			text-align: left;
		}
		.border-none-right{
			border-right: hidden;
		}
		.border-none-left{
			border-left:hidden;
		}
		.border-none-bottom{
			border-bottom: hidden;
		}
		.border-none-top{
			border-top: hidden;
		}
		.float-left{
			float: left;
		}
		.float-right{
			float: right;
		}
		.top{
			vertical-align: text-top;
		}
		.vertical-baseline{
			vertical-align: baseline;
		}
		.bottom{
			vertical-align: text-bottom;
		}
		.ttd{
			width: 150px;
		}
		.relative{
			position: relative;
		}
		.absolute{
			position: absolute;
		}
		.empty{
			height: 18px;
		}
		table,td{
			border:1px solid rgba(0,0,0,1);
		}
		table{
			border-collapse: collapse;
		}
		table.border-none ,.border-none td{
			border:none !important;
		}
		.position-top{
			vertical-align: top;
		}
		th, tr, td {
		    padding: 20px;
		    text-align: left;
		    color: black;
		}
		.tw-100 {
			width: 85px;
		}
		.tw-125 {
			width: 112px;
		}
		.tw-150 {
			width: 150px;
		}
		.tw-350 {
			width: 380px;
		}
		@page {
			size: portrait;
			margin:0 0 0 0;
		}
		@media print {
			html, body {
		        height: auto;    
		    }
			.div-width{
				margin: auto;
				padding: 120px 15px 15px 15px;
				width: 95vw;
				position: absolute;
			}
			.btn-print{
				display: none;
			}
			header{
				top:0;
				left: 0;
				right: 0;
				position: absolute;
				width: 100%;
			}
			footer{
				bottom: 0;
				left: 0;
				right: 0;
				position: absolute;
				width: 100%;
			}
			.div-width-background{
				
				position: relative;
				z-index: -1;
				margin: auto;
				width: 100vw;
				height: 100vh;
			}
		}
		fieldset{
			border: 1px solid black;
			margin:-.5px;
		}
		header{
			top: 0;
			width: 900px;
		}
		footer{
			bottom: 0;
			width: 900px;
		}
		.border-top{
			border-top: 1px solid black;
		}
		.btn-print{
			position: fixed;
			width: 100%;
			text-align: right;
			left: 0;
			top: 0;
			background: rgba(0,0,0,.2);
		}
		.btn-print button, .btn-print a{
			margin: 10px;
		}
		.btn-lg, .btn-group-lg > .btn, .ajax-upload-dragdrop .btn-group-lg > .ajax-file-upload, .swal2-modal .swal2-buttonswrapper .btn-group-lg > .swal2-styled, .wizard > .actions .btn-group-lg > a {
		    padding: 0.94rem 1.94rem;
		    font-size: 1.25rem;
		    line-height: 1.5;
		    border-radius: 0.1875rem;
		}
		.btn-primary, .wizard > .actions a {
		    color: #fff;
		    background-color: #00bbd9;
		    border-color: #00bbd9;
		}
		.btn, .ajax-upload-dragdrop .ajax-file-upload, .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .swal2-styled.swal2-confirm, .swal2-modal .swal2-buttonswrapper .swal2-styled.swal2-cancel, .wizard > .actions a {
		    display: inline-block;
		    font-weight: 400;
		    text-align: center;
		    white-space: nowrap;
		    vertical-align: middle;
		    user-select: none;
		    border: 1px solid transparent;
		    padding: 0.56rem 1.375rem;
		    font-size: 1rem;
		    line-height: 1;
		    border-radius: 0.1875rem;
		    transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}
		.border-bottom-dotted{
			border-bottom: 1px dotted black !important;
		}
		.div-page-break-after{
			page-break-after: always;
		}
		.div-page-break-after:last-child{
			page-break-after: auto;
		}
		.block{
			display: block;
		}
		.grey{
			color: grey;
		}
		.m-auto{
			margin: auto;
		}
		.w-50percent{
			width: 50%;
		}
		.title-atonergi{
			width: 75%;
			background-color: yellow;
			border: 1px solid black;
			margin: auto;
		}
		.mb-1{
			margin-bottom: 1rem;
		}
		.mb-2{
			margin-bottom: 2rem;
		}
		.mb-3{
			margin-bottom: 3rem;
		}
		.mb-4{
			margin-bottom: 4rem;
		}
		.mb-5{
			margin-bottom: 5rem;
		}
		.row{
			display: flex;
			flex-wrap: wrap;
			margin: auto;
			padding-right: 45px;
			padding-left: 45px;
		}
		.col-6{
			flex: 0 0 50%;
			max-width: 50%;
		}
		.col-12{
			flex: 0 0 99%;
			max-width: 100%;
		}
		.w-tab{
			margin-left: 80px;
		}
		.ttd-container {
			padding:10px; 
			width: 350px;
		}
		.ttd-date-section {

		}
		.ttd-title-section {
			margin-top: 20px;
		}
		.ttd-signature-name {
			margin-top: 100px;
		}
	</style>
</head>
<body>
	<div class="div-page-break-after">

		@php

		setlocale(LC_ALL, "id_ID");

		

		@endphp

		<div class="btn-print" align="right">
			<button onclick="javascript:window.print();" class="btn btn-primary btn-lg">
				<i class="fa fa-print"></i>&nbsp;&nbsp;Print
			</button>
		</div>
				
		<div class="div-width">
			<h1 class="grey w-tab unbold">
				Installation Factsheet
			</h1><br><br>
			<h2 class="grey w-tab bold m-auto">
				Customer / Partner
			</h2><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">End Customer</td>
							<td class="tw-350">Alfrida Tumanan</td>	
						</tr>
						<tr>
							<td class="tw-150">Installer</td>
							<td class="tw-350">PT.REJA ATON ENERGI (Eko Budiyanto)</td>	
						</tr>
						<tr>
							<td class="tw-150">Contact data of Installer</td>
							<td class="tw-350">081218044394 /ekobudiyanto@atonergi.com</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h2 class="grey w-tab bold m-auto">
				Installation Location
			</h2><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Country</td>
							<td class="tw-350">Indonesia</td>	
						</tr>
						<tr>
							<td class="tw-150">Province, state</td>
							<td class="tw-350">PT.REJA ATON ENERGI (Eko Budiyanto)</td>	
						</tr>
						<tr>
							<td class="tw-150">City, village, town</td>
							<td class="tw-350">BIAK</td>	
						</tr>
						<tr>
							<td class="tw-150">Longitude</td>
							<td class="tw-350">
								<div class="float-left">1233486749867390485731</div>
								<div class="float-right">East</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Latitude</td>
							<td class="tw-350">
								<div class="float-left">1233486749867390485731</div>
								<div class="float-right">South</div>
							</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h2 class="grey w-tab bold m-auto">
				Installation Date
			</h2><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Date</td>
							<td class="tw-350">3 oktober 2018</td>	
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
			
	</div>
	<div class="div-page-break-after">
		<div class="div-width">
			<h2 class="grey w-tab bold m-auto">
				Application type
			</h2><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Application</td>
							<td class="tw-350">Air bersih</td>	
						</tr>
						<tr>
							<td class="tw-150">Other applications</td>
							<td class="tw-350"></td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				For Drinking Water Projects
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">How many people are supplied from the system?</td>
							<td class="tw-350">300 orang</td>	
						</tr>
						<tr>
							<td class="tw-150">How many animals are supplied by the system?</td>
							<td class="tw-350"></td>	
						</tr>
						<tr>
							<td class="tw-150">What type of animals does the system supply?</td>
							<td class="tw-350"></td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				For Irrigation Projects
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">What crop is grown?</td>
							<td class="tw-350">-</td>	
						</tr>
						<tr>
							<td class="tw-150">What area of land is irrigated?</td>
							<td class="tw-350">
								<div class="float-left">-</div>
								<div class="float-right">m<sup>2</sup> /  ha /  ac</div>
							</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				For Swimming Pool Filtration Projects
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Pool size</td>
							<td class="tw-350">
								<div class="float-left">-</div>
								<div class="float-right">m<sup>3</sup>   litres   USG</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Pool type</td>
							<td class="tw-350">Freshwater Salt</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>
	<div class="div-page-break-after">
		<div class="div-width">
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Additional Information</td>
							<td class="tw-350"></td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				Pump System
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-125"></td>
							<td class="tw-125 bold">Type</td>
							<td class="tw-125 bold">Pump</td>
							<td class="tw-125 bold">Controller</td>	
						</tr>
						<tr>
							<td class="tw-125">Pump System(s)</td>
							<td class="tw-125">Surface</td>
							<td class="tw-125">C-SF4-6-</td>
							<td class="tw-125">PS2-1800 -1,8  kvA</td>
						</tr>
					</tbody>
				</table>
			</div><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150 bold">Item</td>
							<td class="tw-350 bold">Serial Number</td>	
						</tr>
						<tr>
							<td class="tw-150">Controller</td>
							<td class="tw-350"></td>
						</tr>
						<tr>
							<td class="tw-150">Motor / EC Drive</td>
							<td class="tw-350"></td>
						</tr>
						<tr>
							<td class="tw-150">Pump End</td>
							<td class="tw-350"></td>
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				Installation Details
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Total dynamic head</td>
							<td class="tw-350">
								<div class="float-left">30</div>
								<div class="float-right">m ft</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Static head</td>
							<td class="tw-350">
								<div class="float-left"> </div>
								<div class="float-right">m</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Daily flow rate</td>
							<td class="tw-350">
								<div class="float-left">37</div>
								<div class="float-right">m<sup>3</sup></div>
							</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>
	<div class="div-page-break-after">
		<div class="div-width">
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Water source</td>
							<td class="tw-350"></td>	
						</tr>
						<tr>
							<td class="tw-150">Pipe length</td>
							<td class="tw-350">
								<div class="float-left"></div>
								<div class="float-right">m</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Pipe diameter</td>
							<td class="tw-350">
								<div class="float-left"></div>
								<div class="float-right">mm</div>
							</td>
						</tr>
						<tr>
							<td class="tw-150">Cable length</td>
							<td class="tw-350">
								<div class="float-left"></div>
								<div class="float-right">m</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Type of water storage</td>
							<td class="tw-350"></td>	
						</tr>
						<tr>
							<td class="tw-150">Size of water storage</td>
							<td class="tw-350">
								<div class="float-left"></div>
								<div class="float-right">m<sup>3</sup></div>
							</td>	
						</tr>
					</tbody>
				</table>
			</div><br>
			<h6 class="grey w-tab m-auto">
				Below only for surface pumps
			</h6><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Suction head</td>
							<td class="tw-350">
								<div class="float-left"></div>
								<div class="float-right">m&nbsp; ft</div>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Inlet pipe size</td>
							<td class="tw-350">
								<div class="float-left"></div>
								<div class="float-right">mm&nbsp; inch</div>
							</td>	
						</tr>
					</tbody>
				</table>
			</div><br>
			<h3 class="grey w-tab bold m-auto">
				PV Generator
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">PV module manufacturer</td>
							<td class="tw-350">Seraphim</td>	
						</tr>
						<tr>
							<td class="tw-150">Model</td>
							<td class="tw-350">SRP-280-BPB</td>	
						</tr>
						<tr>
							<td class="tw-150">Type</td>
							<td class="tw-350">Polycristallene</td>	
						</tr>
						<tr>
							<td class="tw-150">Quantity</td>
							<td class="tw-350"></td>
						</tr>
					</tbody>
				</table>
			</div><br>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>
	<div class="div-page-break-after">
		<div class="div-width">
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Power (each)</td>
							<td class="tw-350">280 wp</td>	
						</tr>
						<tr>
							<td class="tw-150">Power (total)</td>
							<td class="tw-350">3360 wp</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				Battery System
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Quantity</td>
							<td class="tw-350">-</td>	
						</tr>
						<tr>
							<td class="tw-150">Capacity</td>
							<td class="tw-350">-</td>	
						</tr>
						<tr>
							<td class="tw-150">Voltage</td>
							<td class="tw-350">-</td>	
						</tr>
					</tbody>
				</table>
			</div><br>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>
	<div class="div-page-break-after">
		<div class="div-width">
			<div class="text-center mb-2 unbold">
				<h1>CHECKLIST PARTS OF LORENTZ SYSTEM</h1>
			</div>
			<div class="grey w-tab m-auto">
				<table>
					<thead>
						<tr>
							<td>No.</td>
							<td class="tw-150">Description</td>
							<td>Quantity</td>
							<td>Check<br> ( ✔ / ✘ )</td>
							<td class="tw-150">Remarks</td>
						</tr>
					</thead>
					<tbody class="center">
						<tr class="alamraya-tr-padding">
							<td>1</td>
							<td>Lorentz Pump Type : surface C-SF4-6</td>
							<td>1</td>
							<td>
								<input type="checkbox" class="checkbox" name="" checked>
							</td>
							<td>
								Tidak terpasang,kabel terlalu jauh.
							</td>
						</tr>
					</tbody>
				</table>
			</div><br>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>

	<div class="div-page-break-after">
		<div class="div-width">
			<h3 class="grey w-tab bold m-auto">
				PV Mounting System
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr>
							<td class="tw-150">Manufacturer</td>
							<td class="tw-350">custom</td>	
						</tr>
						<tr>
							<td class="tw-150">Type</td>
							<td class="tw-350">-</td>	
						</tr>
						<tr>
							<td class="tw-150">Model</td>
							<td class="tw-350">For tracked enter tracking system model</td>	
						</tr>
						<tr>
							<td class="tw-150">Quantity</td>
							<td class="tw-350">1</td>	
						</tr>
					</tbody>
				</table>
			</div><br><br>
			<h3 class="grey w-tab bold m-auto">
				Usage of Data and Illustrations
			</h3><br>
			<div class="grey w-tab m-auto">
				<table>
					<tbody class="center">
						<tr class="alamraya-tr-padding">
							<td class="tw-150 text-center">
								<!-- <input type="checkbox" class="checkbox" name="" checked> -->
								✔
							</td>
							<td class="tw-350">
								<p>
									I declare that I am the owner of the installation described or have been granted permission by the owner to make use of the data of the installation. I am the owner of all rights of use of the attached photographs of the installation or have been granted permission by the owner to make use of the photographs.
								</p>
							</td>	
						</tr>
						<tr class="alamraya-tr-padding">
							<td class="tw-150 text-center">
								✔
							</td>
							<td class="tw-350">
								<p>
									I grant Bernt Lorentz GmbH & Co. KG the right to publish the installation data on its website or in other forms and use the photographs for illustration alongside the description of installation or in other places or to allow other customers of LORENTZ to use the data and photographs to promote LORENTZ products.
								</p>
							</td>	
						</tr>
						<tr>
							<td class="tw-150">Your Name</td>
							<td class="tw-350"></td>	
						</tr>
						<tr>
							<td class="tw-150">Signature</td>
							<td class="tw-350"></td>	
						</tr>
						<tr>
							<td class="tw-150">E-mail address</td>
							<td class="tw-350"></td>	
						</tr>
					</tbody>
				</table>
			</div><br>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>
	<div class="div-page-break-after">
		<div class="div-width">
			<div class="float-left">
				<div class="ttd-container">
					<div class="ttd-date-section text-center">
						BIAK, 12 Desember 2018
					</div>
					<div class="ttd-title-section text-center">
						Jabatan Penandatangan
					</div>
					<div class="ttd-signature-name text-center">
						(____________________)
					</div>
				</div>
			</div>
			<div class="float-right">
				<div class="ttd-container">
					<div class="ttd-date-section text-center">
						BIAK, 12 Desember 2018
					</div>
					<div class="ttd-title-section text-center">
						Jabatan Penandatangan
					</div>
					<div class="ttd-signature-name text-center">
						(____________________)
					</div>
				</div>
			</div>
		</div>
		<div class="div-width-background">
			<img width="100%" height="99.6%" src="{{asset('assets/images/Installation_Factsheet-1.png')}}">
		</div>
	</div>
	<!-- <div class="div-page-break-after"> -->
		<!-- <div class="div-width-background"> -->
			<!-- <img width="100%" height="99.6%" src="{{asset('assets/images/atonergi-bg-end.png')}}"> -->
		<!-- </div> -->
	<!-- </div> -->
</body>
</html>
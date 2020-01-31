
<section class="section">
	
	<div class="columns">	
	
		<div class="column is-12">
			<div class="tile is-ancestor">
				<div class="tile is-parent is-vertical">
					
					<div class="tile is-child box">
						<p class="subtitle">
							<span class="icon">
								<i class="fas fa-lg fa-list"></i>
							</span>
							&nbsp;
							Laporan Administrasi
						</p>
						
						<div class="tabs is-right">
							<ul>
								<li class="" ng-class="page.id == 10 ? 'is-active' : ''" ng-hide="page.id==10?false:true">
									<a ng-click="setpage(10)">Laporan</a>
								</li>
								<li class="" ng-class="page.id == 1 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="setpage(1)">Kendaraan</a>
								</li>
								<li class="" ng-class="page.id == 2 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="setpage(2)">Jembatan Timbang</a>
								</li>
								<!--<li class="" ng-class="page.id == 3 ? 'is-active' : ''">
									<a ng-click="setpage(3)">PO - Material</a>
								</li>-->
								<li class="" ng-class="page.id == 4 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="setpage(4)">Hasil Timbang</a>
								</li>
								<li class="" ng-class="page.id == 5 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="setpage(5)">Potongan</a>
								</li>
								<li class="" ng-class="page.id == 6 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="setpage(6)">Data GR</a>
								</li>
								<li class="" ng-class="page.id == 7 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="setpage(7)">Posting SAP</a>
								</li>
								<!--<li class="" ng-class="page.id == 8 ? 'is-active' : ''">
									<a ng-click="setpage(8)">Exit Note</a>
								</li>-->
								<li class="" ng-class="page.id == 9 ? 'is-active' : ''" ng-hide="page.id!=10?false:true">
									<a ng-click="vehicleclose()">
										Tutup
									</a>
								</li>
							</ul>
						</div>

						<div ng-hide="page.id == 10 ? false : true">
							<div class="level">
								<div class="level-left">
									<div class="level-item">
										<input type="date">
									</div>
									<div class="level-item">
										<a class="button is-info" ng-href="{{host.target}}">
											<span class="icon">
												<i class="fas fa-file-csv"></i>
											</span>
											<span>{{report.data.length}} data</span>
										</a>
									</div>
								</div>
								<div class="level-right">
									<div class="level-item">										
										<p class="control has-icons-left">
											<input class="input is-info" type="text" placeholder="Kata kunci ..." ng-model="filter.search">
											<span class="icon is-small is-left">
												<i class="fas fa-search"></i>
											</span>
										</p>
									</div>
									<div class="level-item">
										<div class="select is-info">
											<select ng-model="filter.limit" ng-options="key as value for (key , value) in filter.pages"></select>
										</div>
									</div>
									
								</div>
							</div>
							
							
							<table class="table is-fullwidth is-narrow">
								<thead>
									<tr>
										<th>Route</th>
										<th>No Tiket</th>
										<th>Vendor</th>
										<th>Kendaraan</th>
										<th>Sopir</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr dir-paginate="x in report.data | filter:filter.search | itemsPerPage:filter.limit">
										<td>
											<a ng-click="reportselectvehicle(x.id)">{{x.bank_routecode}}</a>
										</td>
										<td>
											<a ng-click="reportselectvehicle(x.id)">{{x.bank_routeflag}}</a>
										</td>
										<td>
											<a ng-click="reportselectvehicle(x.id)">{{x.bank_vendorname}}</a>
										</td>
										<td>{{x.bank_vehiclenumber}}</td>
										<td>{{x.bank_vehicledriver}}</td>
										<td>
											<a class="button is-small is-rounded is-primary" ng-click="reportselectvehicle(x.id)">
												Buka
											</a>
										</td>
									</tr>
								</tbody>
							</table>
							<dir-pagination-controls max-size="7" direction-links="true" boundary-links="true" auto-hide="true" template-url="<?php echo base_url('asset/html/dirPaginationControl.html'); ?>" ></dir-pagination-controls>
						</div>
						
						<div ng-hide="page.id == 1 ? false : true">
							<div class="columns">
								<div class="column">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>Deskripsi</th>
												<th>Data</th>
												<th>&nbsp;<th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Nomor Kartu</td>
												<td>{{vehicle.bank[0].bank_rfidplate}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Jalur Proses</td>
												<td>{{vehicle.bank[0].bank_routecode}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Nomor Tiket</td>
												<td>{{vehicle.bank[0].bank_routeflag}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Nama Vendor</td>
												<td>{{vehicle.bank[0].bank_vendorname}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Nomor Kendaraan</td>
												<td>{{vehicle.bank[0].bank_vehiclenumber}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Nama Sopir</td>
												<td>{{vehicle.bank[0].bank_vehicledriver}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Catatan Security</td>
												<td>{{vehicle.bank[0].bank_vehiclenote}}</td>
												<td>&nbsp;</td>
											</tr>
											<tr>
												<td>Catatan Admin</td>
												<td>{{vehicle.bank[0].bank_exitnote}}</td>
												<td>&nbsp;</td>
											</tr>
										</tbody>
									</table>
									
								</div>
								
								<div class="column">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>Timestamp</th>
												<th>Tanggal-Jam</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Masuk Antrian</td>
												<td>{{vehicle.bank[0].t0}}</td>
											</tr>
											<tr>
												<td>Masuk Proses</td>
												<td>{{vehicle.bank[0].t1}}</td>
											</tr>
											<tr>
												<td>Keluar Area</td>
												<td>{{vehicle.bank[0].t2}}</td>
											</tr>
										</tbody>
									</table>
									
								</div>
								
								<div class="column">
								</div>
							</div>
						</div>
						
						<div ng-hide="page.id == 2 ? false : true">
							<div class="columns">
                                <div class="column is-3">
                                	<table class="table is-fullwidth is-narrow">
                                		<thead>
                                			<tr>
                                				<th>Tanggal-Jam</th>
												<th>Berat</th>
                                			 </tr>
                                		</thead>
                                		<tbody>
                                			<tr ng-repeat="x in vehicle.weight">
												<td>{{x.weight_datetime}}</td>
												<td>{{x.weight_gross}}</td>
                                			</tr>
                                			<tr ng-if="vehicle.weight.length >= 2 ? true : false">
												<td>Berat Bersih</td>
												<td>{{vehicle.weight[0].weight_gross - vehicle.weight[vehicle.weight.length-1].weight_gross}}</td>
											</tr>
                                		</tbody>
                                	</table>
                                	<a ng-hide="vehicle.bank[0].id == '' ? true : false" href="<?php echo site_url('control/printPageJembatan'); ?>/{{vehicle.bank[0].id}}" target="_blank" class="button is-small is-rounded is-primary">Cetak Jembatan Timbang</a>
								</div>
								<div class="column is-3">
									<div class="columns" ng-repeat="x in vehicle.weight">
										<div class="column is-12">
											<img src="<?php echo base_url('../uploads'); ?>/{{x.id}}-1.jpg" class="img-fluid">
										</div>
									</div>
								</div>
								<div class="column is-3">
									<div class="columns" ng-repeat="x in vehicle.weight">
										<div class="column is-12">
											<img src="<?php echo base_url('../uploads'); ?>/{{x.id}}-2.jpg" class="img-fluid">
										</div>
									</div>
								</div>
								<div class="column is-3">
									<div class="columns" ng-repeat="x in vehicle.weight">
										<div class="column is-12">
											<img src="<?php echo base_url('../uploads'); ?>/{{x.id}}-3.jpg" class="img-fluid">
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div ng-hide="page.id == 3 ? false : true">
							<div class="columns">
								<div class="column is-2">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>Nomor PO</th>
												<th>&nbsp;</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.data">
												<td>
													<a ng-click="vehiclereloaddetail(x.id)">{{x.data_po}}</a>
												</td>
												<td>
													<a class="button is-small is-rounded is-danger" ng-click="vehicledeletedata(x.id)">
														<span class="icon">
															<i class="fas fa-times"></i>
														</span>
													</a>
												</td>
											</td>
											</tr>
										</tbody>
									</table>
									
									<form class="field has-addons">
										<div class="control has-icons-left is-expanded">
											<input class="input" ng-class="nopo.search == '' ? 'is-danger' : 'is-success'" type="text" placeholder="Nomor PO ..." ng-model="nopo.search">
											<span class="icon is-small is-left">
												<i class="fas fa-keyboard"></i>
											</span>
										</div>
										<div class="control">
											<button class="button is-info" type="submit" ng-click="vehiclenewdata()">
												<span class="icon">
													<i class="fas fa-plus"></i>
												</span>
											</button>
										</div>
									</form>
								</div>
								
								<div class="column">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>No</th>
												<th>Material</th>
												<th>PO Qty</th>
												<th>OS Qty</th>
												<th>Unit</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.detail">
												<td>
													<a ng-click="vehiclereloaddelivery(x.id)">{{x.detail_matnumber}}</a>
												</td>
												<td>
													<a ng-click="vehiclereloaddelivery(x.id)">{{x.detail_matname}}</a>
												</td>
												<td class="has-text-right">{{x.detail_poqty}}</td>
												<td class="has-text-right">{{x.detail_osqty}}</td>
												<td>{{x.detail_matunit}}</td>
											</tr>
										</tbody>
									</table>
									
									
								</div>
							</div>
							<hr>
							
							<div class="field is-horizontal">
								<div class="field-body">
									<div class="field">
										<p class="control is-expanded has-icons-left">
											<input class="input" ng-class="delivery.dataid == '' ? 'is-danger' : 'is-success'" type="text" placeholder="Nomor PO" readonly ng-model="delivery.dataname">
											<span class="icon is-small is-left">
												<i class="fas fa-hand-pointer"></i>
											</span>
										</p>
									</div>
											
									<div class="field">
										<p class="control is-expanded has-icons-left">
											<input class="input" ng-class="delivery.detailid == '' ? 'is-danger' : 'is-success'" type="text" placeholder="Nama Material" readonly ng-model="delivery.detailname">
											<span class="icon is-small is-left">
												<i class="fas fa-hand-pointer"></i>
											</span>
										</p>
									</div>
											
									<div class="field">
										<p class="control is-expanded has-icons-left">
											<input class="input" ng-class="delivery.number == '' ? 'is-danger' : 'is-success'" type="text" placeholder="Nomor Surat Jalan" ng-model="delivery.number">
											<span class="icon is-small is-left">
												<i class="fas fa-keyboard"></i>
											</span>
										</p>
									</div>
											
									<form class="field has-addons">
										<div class="control has-icons-left is-expanded">
										<input class="input" ng-class="delivery.target == '' ? 'is-danger' : 'is-success'" type="text" placeholder="Quantity Surat Jalan" ng-model="delivery.target">
											<span class="icon is-small is-left">
												<i class="fas fa-keyboard"></i>
											</span>
										</div>
										<div class="control">
											<button class="button is-info" type="submit" ng-click="vehiclenewdelivery()">
												<span class="icon">
													<i class="fas fa-plus"></i>
												</span>
											</button>
										</div>
									</form>
										
								</div>
							</div>
							
							<table class="table is-fullwidth is-narrow">
								<thead>
									<tr>
										<th>Nomor SJ</th>
										<th>Material</th>
										<th>SJ Qty</th>
										<th>Gross W</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr ng-repeat="x in vehicle.delivery">
										<td>{{x.delivery_number}}</td>
										<td>{{x.detail_matname}}</td>
										<td class="has-text-right">{{x.delivery_target}}</td>
										<td class="has-text-right">{{x.delivery_gross}}</td>
										<td>
											<a class="button is-small is-rounded is-danger" ng-click="vehicledeletedelivery(x.id)" ng-hide="x.delivery_gross > 0 ? true : false">
												<span class="icon">
													<i class="fas fa-times"></i>
												</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
							
						</div>

						<div ng-hide="page.id == 4 ? false : true">
							<div class="column is-2">
								<span ng-repeat="x in vehicle.delivery">
									<a href="<?php echo site_url('control/printPageTimbangan'); ?>/{{vehicle.bank[0].id}}/{{x.delivery_number}}" target="_blank" class="button is-small is-rounded is-primary">Print {{x.delivery_number}}</a>
								</span>
							</div>
						</div>
						
						<div ng-hide="page.id == 4 ? false : true">
							<div class="columns">
                                <div class="column is-2">
                                	<table class="table is-fullwidth is-narrow">
                                		<thead>
                                			<tr>
                                				<th>Nomor PO</th>
                                			 </tr>
                                		</thead>
                                		<tbody>
                                			<tr ng-repeat="x in vehicle.data">
                                				<td>
                                					<a ng-click="vehiclereloaddetail(x.id)">{{x.data_po}}</a>
                                				</td>
                                			</tr>
                                		</tbody>
                                	</table>
								</div>
								<div class="column is-3">
									<table class="table is-fullwidth is-narrow">
                                		<thead>
											<tr>
												<th>No</th>
												<th>Material</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.detail">
												<td>
													<a ng-click="vehiclereloaddelivery(x.id)">{{x.detail_matnumber}}</a>
												</td>
												<td>
													<a ng-click="vehiclereloaddelivery(x.id)">{{x.detail_matname}}</a>
												</td>
											</tr>
										</tbody>
                                	</table>
								</div>
								<div class="column is-4">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>Nomor SJ</th>
												<th>SJ Qty</th>
												<th>Gross W</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.delivery">
												<td>
													<a ng-click="vehiclereloadpackage(x.id)">{{x.delivery_number}}</a>
												</td>
												<td class="has-text-right">{{x.delivery_target}}</td>
												<td class="has-text-right">{{x.delivery_gross}}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="column is-3">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>Nomor</th>
												<th>Berat Timbang</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.packages">
												<td>{{$index + 1}}</td>
												<td class="has-text-right">{{x.package_value}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<div ng-hide="page.id == 5 ? false : true">
							<div class="columns">
                                <div class="column is-2">
                                	<table class="table is-fullwidth is-narrow">
                                		<thead>
                                			<tr>
                                				<th>Nomor PO</th>
                                			 </tr>
                                		</thead>
                                		<tbody>
                                			<tr ng-repeat="x in vehicle.data">
                                				<td>
                                					<a ng-click="vehiclereloaddetail(x.id)">{{x.data_po}}</a>
                                				</td>
                                			</tr>
                                		</tbody>
                                	</table>
								</div>
								<div class="column is-3">
									<table class="table is-fullwidth is-narrow">
                                		<thead>
											<tr>
												<th>No</th>
												<th>Material</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.detail">
												<td>
													<a ng-click="vehiclereloaddelivery(x.id)">{{x.detail_matnumber}}</a>
												</td>
												<td>
													<a ng-click="vehiclereloaddelivery(x.id)">{{x.detail_matname}}</a>
												</td>
											</tr>
										</tbody>
                                	</table>
								</div>
								<div class="column is-7">
									<table class="table is-fullwidth is-narrow">
										<thead>
											<tr>
												<th>Nomor SJ</th>
												<th>Pack Qty</th>
												<th>Gross W</th>
												<th>Kemasan</th>
												<th>QC</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.delivery">
												<td>
													{{x.delivery_number}}
												</td>
												<td class="has-text-right">{{x.delivery_pack}}</td>
												<td class="has-text-right">{{x.delivery_gross}}</td>
												<td class="has-text-right">{{x.delivery_tare0}}</td>
												<td class="has-text-right">{{x.delivery_tare1}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<div ng-hide="page.id == 6 ? false : true">
							<div class="columns">
                                <div class="column is-2">
                                	<table class="table is-fullwidth is-narrow">
                                		<thead>
                                			<tr>
                                				<th>Nomor PO</th>
                                			 </tr>
                                		</thead>
                                		<tbody>
                                			<tr ng-repeat="x in vehicle.data">
                                				<td>
                                					<a ng-click="vehiclereloaddetail(x.id)">{{x.data_po}}</a>
                                				</td>
                                			</tr>
                                		</tbody>
                                	</table>
								</div>
								<div class="column is-10">
									<table class="table is-fullwidth is-narrow">
                                		<thead>
											<tr>
												<th>No</th>
												<th>Material</th>
												<th>Unit</th>
												<th>PO Qty</th>
												<th>OS Qty</th>
												<th>SJ Qty</th>
												<th>Gross</th>
												<th>Kemasan</th>
												<th>QC</th>
												<th>Net</th>
												<th>NV</th>
												<th>SL</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.detail">
												<td>{{x.detail_matnumber}}</td>
												<td>{{x.detail_matname}}</td>
												<td>{{x.detail_matunit}}</td>
												<td>{{x.detail_poqty}}</td>
												<td>{{x.detail_osqty}}</td>
												<td>{{x.detail_target}}</td>
												<td>{{x.detail_gross}}</td>
												<td>{{x.detail_tare0}}</td>
												<td>{{x.detail_tare1}}</td>
												<td>{{x.calnet}}</td>
												<td>{{x.calnv}}</td>
												<td>{{x.calsl}}</td>
											</tr>
										</tbody>
                                	</table>
								</div>
							</div>
						</div>
						
						<div ng-hide="page.id == 7 ? false : true">
							<div class="columns">
                                <div class="column is-12">
                                	<table class="table is-fullwidth is-narrow">
                                		<thead>
                                			<tr>
                                				<th>Nomor PO</th>
                                				<th>Nomor SPB</th>
                                				<th>Post Status</th>
                                				<th>Post Time</th>
                                				<th>&nbsp;</th>
                                			 </tr>
                                		</thead>
                                		<tbody>
                                			<tr ng-repeat="x in vehicle.data">
                                				<td>{{x.data_po}}</td>
                                				<td>{{x.data_spb}}</td>
                                				<td>{{x.data_status}}</td>
                                				<td>{{x.data_posttime}}</td>
                                				<td>
													<a class="button is-small is-rounded is-primary" ng-click="vehiclepostdata(x.id)">
														Post SAP
													</a>
												</td>
                                			</tr>
                                		</tbody>
                                	</table>
								</div>
								
							</div>
						</div>
						
						<div ng-hide="page.id == 8 ? false : true">
									
							<form class="field has-addons">
								<div class="control has-icons-left is-expanded">
									<input class="input" ng-class="delivery.target == '' ? 'is-danger' : 'is-success'" type="text" placeholder="Catatan Kendaraan Keluar" ng-model="vehicle.bank[0].bank_exitnote">
									<span class="icon is-small is-left">
										<i class="fas fa-keyboard"></i>
									</span>
								</div>
								<div class="control">
									<button class="button is-danger" type="submit" ng-click="vehicleexit()" ng-disabled="vehicle.bank[0].bank_exitflag == '0' ? true : false">
										<span class="icon">
											<i class="fas fa-exclamation"></i>
										</span>
										<span>Selesai Proses</span>
									</button>
								</div>
							</form>
						</div>
			
					</div>
				</div>
			</div>
		</div>
	
	</div>

</section>

<script>
var app = angular.module('app', ['angularUtils.directives.dirPagination']);
app.controller('ctrl', function($scope, $http, $interval) {		
	$scope.host = {};
	$scope.host.method = 'POST';
	$scope.host.url = '<?php echo site_url('ajax/ajax_request'); ?>';
	$scope.host.target = "#";
	
	$scope.response = {resbool: true, restext: "", resdata: [], restimer:0};
	
	$scope.report = {data:[]};
	$scope.rfid = {search: ''};
	$scope.nopo = {search: ''};
	$scope.exit = {search: ''};
	
	$scope.vehicle = {bank:[], weight:[], data:[], detail:[], delivery:[], packages:[]};
	
	$scope.delivery = {dataid:'', dataname:'', detailid:'', detailname:'', number:'', target:''};
	
	$scope.page = {id: 10};
	
	$scope.calendar = {startDate:'', endDate:''};
	
	$scope.filter = {search:'', limit:'10', pages: {'10':'10 baris', '25':'25 baris', '50':'50 baris', '100':'100 baris'}};	
	
	var calendars = bulmaCalendar.attach('[type="date"]', {color:'info',isRange:true,showFooter:false,dateFormat:'DD MMM YYYY',labelFrom:'Awal', labelTo:'Akhir'});
	
	for(var i = 0; i < calendars.length; i++) {
		calendars[i].on('select', date => {
			var start = new Date(calendars[0].startDate);
			
			$scope.calendar.startDate = start.getFullYear().toString();
			$scope.calendar.startDate += "-";
			$scope.calendar.startDate += ("0" + (start.getMonth()+1).toString()).slice(-2);
			$scope.calendar.startDate += "-";
			$scope.calendar.startDate += ("0" + start.getDate().toString()).slice(-2);
			
			var end = new Date(calendars[0].endDate);
			
			$scope.calendar.endDate = end.getFullYear().toString();
			$scope.calendar.endDate += "-";
			$scope.calendar.endDate += ("0" + (end.getMonth()+1).toString()).slice(-2);
			$scope.calendar.endDate += "-";
			$scope.calendar.endDate += ("0" + end.getDate().toString()).slice(-2);
			
			if ($scope.calendar.startDate == '' || $scope.calendar.endDate == '')
			{
				$scope.host.target = '#';
			}
			else
			{
				$scope.host.target = '<?php echo site_url('ajax/download_listadmin_csv'); ?>' + '/' + $scope.calendar.startDate + '/' + $scope.calendar.endDate;
			}
			
			$scope.reportreloadvehicle();
		});
	}
	
	$scope.vehicleopen = function ()
	{
		var postdata = {
			command: "CREATE-RFID-SEARCH",
			paramtext1: $scope.rfid.search
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			$scope.response.resbool = response.data.databool;
			$scope.response.restext = response.data.datatext;
			$scope.response.resdata = response.data.dataset;
			
			if ($scope.response.resbool)
			{
				$scope.vehicle.bank = $scope.response.resdata;
			}
			else
			{
				$scope.vehicle.bank = [];
				
				$scope.setpage(1);
			}
			
			$scope.rfid.search = '';
		},
		function(response){
		});
	}

	$scope.vehicleexit = function ()
	{
		var postdata = {
			command: "CREATE-EXIT-ID",
			paramtext1: $scope.vehicle.bank[0].id,
			paramtext2: $scope.vehicle.bank[0].bank_exitnote
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			$scope.vehicleclose();
		},
		function(response){
		});
	}
	
	$scope.vehicleclose = function ()
	{
		$scope.vehicle.bank = [];
		$scope.vehicle.data = [];
		$scope.vehicle.detail = [];
		$scope.vehicle.delivery = [];
		$scope.vehicle.packages = [];
		
		$scope.setpage(10);
	}
	
	$scope.vehiclereloaddata = function ()
	{
		$scope.vehicle.data = [];
		$scope.vehicle.detail = [];
		$scope.vehicle.delivery = [];
		$scope.vehicle.packages = [];
		
		$scope.delivery.dataid = '';
		$scope.delivery.dataname = '';
		$scope.delivery.detailid = '';
		$scope.delivery.detailname = '';
		$scope.delivery.number = '';
		$scope.delivery.target = '';
		
		var postdata = {
			command: "CREATE-SELECT-DATA",
			paramtext1: $scope.vehicle.bank[0].id
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehicle.data = response.data.dataset;
			}
			else
			{
				$scope.vehicle.data = [];
			}
		},
		function(response){
		});
	}
	
	$scope.vehiclereloaddetail = function (dataid)
	{
		$scope.vehicle.detail = [];
		$scope.vehicle.delivery = [];
		$scope.vehicle.packages = [];
		
		for (var i = 0; i < $scope.vehicle.data.length; i++)
		{
			if ($scope.vehicle.data[i].id == dataid)
			{
				$scope.delivery.dataid = $scope.vehicle.data[i].id;
				$scope.delivery.dataname = $scope.vehicle.data[i].data_po;
				
				break;
			}
		}
		$scope.delivery.detailid = '';
		$scope.delivery.detailname = '';
		
		var postdata = {
			command: "CREATE-SELECT-DETAIL",
			paramtext1: dataid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehicle.detail = response.data.dataset;
				for (var i = 0; i < $scope.vehicle.detail.length; i++)
				{
					$scope.vehicle.detail[i].calnet = parseFloat($scope.vehicle.detail[i].detail_gross - $scope.vehicle.detail[i].detail_tare0 - $scope.vehicle.detail[i].detail_tare1).toFixed(2);
					
					if (parseFloat($scope.vehicle.detail[i].calnet) > parseFloat($scope.vehicle.detail[i].detail_target))
					{
						$scope.vehicle.detail[i].calnv = parseFloat($scope.vehicle.detail[i].calnet - $scope.vehicle.detail[i].detail_target).toFixed(2);
						$scope.vehicle.detail[i].calsl = parseFloat(0).toFixed(2);
					}
					else
					{
						$scope.vehicle.detail[i].calnv = parseFloat(0).toFixed(2);
						$scope.vehicle.detail[i].calsl = parseFloat($scope.vehicle.detail[i].detail_target - $scope.vehicle.detail[i].calnet).toFixed(2);
					}
				}
			}
			else
			{
				$scope.vehicle.detail = [];
			}
		},
		function(response){
		});
	}
	
	$scope.vehiclereloaddelivery = function (detailid)
	{
		$scope.vehicle.delivery = [];
		$scope.vehicle.packages = [];
		
		for (var i = 0; i < $scope.vehicle.detail.length; i++)
		{
			if ($scope.vehicle.detail[i].id == detailid)
			{
				$scope.delivery.detailid = $scope.vehicle.detail[i].id;
				$scope.delivery.detailname = $scope.vehicle.detail[i].detail_matname;
				
				break;
			}
		}
		
		var postdata = {
			command: "CREATE-SELECT-DELIVERY",
			paramtext1: detailid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehicle.delivery = response.data.dataset;
			}
			else
			{
				$scope.vehicle.delivery = [];
			}
		},
		function(response){
		});
	}
	
	$scope.vehiclereloadpackage = function (deliveryid)
	{
		$scope.vehicle.packages = [];
		
		var postdata = {
			command: "CREATE-SELECT-PACKAGE",
			paramtext1: deliveryid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehicle.packages = response.data.dataset;
			}
			else
			{
				$scope.vehicle.packages = [];
			}
		},
		function(response){
		});
	}
	
	$scope.vehiclenewdata = function ()
	{
		var postdata = {
			command: "CREATE-NEW-DATA",
			paramtext1: $scope.vehicle.bank[0].id,
			paramtext2: $scope.nopo.search,
			paramtext3: $scope.vehicle.bank[0].bank_vendornumber
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehiclereloaddata();
			}
			$scope.nopo.search = "";
		},
		function(response){
		});
	}
	
	$scope.vehicledeletedata = function (dataid)
	{
		var postdata = {
			command: "CREATE-DEL-DATA",
			paramtext1: dataid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehiclereloaddata();
			}
		},
		function(response){
		});
	}

	$scope.vehiclereloadweight = function ()
	{
		$scope.vehicle.weight = [];
		
		
		var postdata = {
			command: "CREATE-SELECT-WEIGHT",
			paramtext1: $scope.vehicle.bank[0].id
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				$scope.vehicle.weight = response.data.dataset;
			}
			else
			{
				$scope.vehicle.weight = [];
			}
		},
		function(response){
		});
	}

	$scope.vehiclepostdata = function (dataid)
	{
		var postdata = {
			command: "CREATE-POST-DATA",
			paramtext1: dataid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			console.log(response.data);
			if (response.data.databool)
			{
				$scope.vehiclereloaddata();
			}
		},
		function(response){
			console.log(response);
		});
	}
	
	$scope.vehiclenewdelivery = function ()
	{
		if ($scope.delivery.detailid == '' || $scope.delivery.number == '' || $scope.delivery.target == '')
		{
			return;
		}
		
		var postdata = {
			command: "CREATE-NEW-DELIVERY",
			paramtext1: $scope.delivery.detailid,
			paramtext2: $scope.delivery.number,
			paramtext3: $scope.delivery.target,
			paramtext4: $scope.vehicle.bank[0].bank_routenumber,
			paramtext5: $scope.delivery.detailname
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				for (var i = 0; i < $scope.vehicle.detail.length; i++)
				{
					if ($scope.vehicle.detail[i].id == $scope.delivery.detailid)
					{
						$scope.vehiclereloaddelivery($scope.delivery.detailid);
						break;
					}
				}
			}
			$scope.delivery.number = "";
			$scope.delivery.target = "";
		},
		function(response){
		});
	}
	
	$scope.vehicledeletedelivery = function (deliveryid)
	{
		var postdata = {
			command: "CREATE-DEL-DELIVERY",
			paramtext1: deliveryid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response){
			if (response.data.databool)
			{
				for (var i = 0; i < $scope.vehicle.delivery.length; i++)
				{
					if ($scope.vehicle.delivery[i].id == deliveryid)
					{
						$scope.vehiclereloaddelivery($scope.vehicle.delivery[i].detailid);
						break;
					}
				}
			}
		},
		function(response){
		});
	}
	
	$scope.setpage = function ($id)
	{
		if ($scope.vehicle.bank.length == 0)
		{
			$scope.page.id = 10;
			return;
		}
		else
		{
			$scope.page.id = $id;
		}
		
		if ($scope.page.id > 1 && $scope.page.id < 9)
		{
			$scope.vehiclereloaddata();
			$scope.vehiclereloadweight();
		}

		if ($scope.page.id == 10)
		{
			$scope.vehicleclose();
			$scope.reportreloadvehicle();
		}
	}

	$scope.reportreloadvehicle = function ()
	{
		if ($scope.calendar.startDate == '' || $scope.calendar.endDate == '')
		{
			return;
		}
		
		var postdata = {
			command: "REPORT-LOAD-VEHICLE",
			paramtext1: $scope.calendar.startDate,
			paramtext2: $scope.calendar.endDate
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response) {
			console.log(response);
			$scope.report.data = response.data.dataset;
		},
		function(response){
		});
	}

	$scope.reportselectvehicle = function (bankid)
	{
		var postdata = {
			command: "REPORT-SELECT-VEHICLE",
			paramtext1: bankid
		};
		
		$http({
			method: $scope.host.method,
			url: $scope.host.url,
			data: $.param(postdata),
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			}
		}).then(
		function(response) {
			$scope.vehicle.bank = response.data.dataset;
			$scope.setpage(1);
		},
		function(response){
		});
	}
	
	$scope.responsetimer = function()
	{
		if ($scope.response.restimer > 0)
		{
			$scope.response.restimer--;
		}
	}
	$interval($scope.responsetimer, 1000);
	
	$scope.responseclose = function()
	{
		$response.restimer = 0;
	}
});
</script>

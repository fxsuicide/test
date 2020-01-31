<section class="section">

	<article class="message" ng-class="response.resbool ? 'is-success' : 'is-danger'" ng-hide="response.restimer == 0">
		<div class="message-header">
			<p ng-if="response.resbool">
				<span class="icon">
					<i class="fas fa-lg fa-thumbs-up"></i>
				</span>
				<span>BERHASIL ({{response.restimer}} detik)</span>
			</p>
			<p ng-if="!response.resbool">
				<span class="icon">
					<i class="fas fa-lg fa-thumbs-down"></i>
				</span>
				<span>GAGAL ({{response.restimer}} detik)</span>
			</p>
			<button class="delete" aria-label="delete" ng-click="responseclose()"></button>
		</div>
		<div class="message-body">
			{{response.restext}}
		</div>
	</article>

	<form class="field has-addons">
		<div class="control has-icons-left is-expanded">
			<input class="input is-info" type="text" placeholder="Tap kartu untuk mulai administrasi ..." ng-model="rfid.search">
			<span class="icon is-small is-left">
				<i class="fas fa-search"></i>
			</span>
		</div>
		<div class="control">
			<button class="button is-info" type="submit" ng-click="vehicleopen()">
				<span class="icon">
					<i class="fas fa-folder-open"></i>
				</span>
			</button>
		</div>
	</form>
	
	<div class="columns">
	
	
	
		<div class="column is-12">
			<div class="tile is-ancestor">
				<div class="tile is-parent is-vertical">
					
					<div class="tile is-child box">
						<p class="subtitle">
							<span class="icon">
								<i class="fas fa-lg fa-layer-group"></i>
							</span>
							&nbsp;
							Administrasi
						</p>
						
						<div class="tabs is-right">
							<ul>
								<li class="" ng-class="page.id == 1 ? 'is-active' : ''">
									<a ng-click="setpage(1)">Kendaraan</a>
								</li>
								<li class="" ng-class="page.id == 2 ? 'is-active' : ''">
									<a ng-click="setpage(2)">Jembatan Timbang</a>
								</li>
								<li class="" ng-class="page.id == 3 ? 'is-active' : ''">
									<a ng-click="setpage(3)">PO - Material</a>
								</li>
								<li class="" ng-class="page.id == 4 ? 'is-active' : ''">
									<a ng-click="setpage(4)">Hasil Timbang</a>
								</li>
								<li class="" ng-class="page.id == 5 ? 'is-active' : ''">
									<a ng-click="setpage(5)">Potongan</a>
								</li>
								<li class="" ng-class="page.id == 6 ? 'is-active' : ''">
									<a ng-click="setpage(6)">Data GR</a>
								</li>
								<li class="" ng-class="page.id == 7 ? 'is-active' : ''">
									<a ng-click="setpage(7)">Posting SAP</a>
								</li>
								<li class="" ng-class="page.id == 8 ? 'is-active' : ''">
									<a ng-click="setpage(8)">Exit Note</a>
								</li>
								<li class="" ng-class="page.id == 9 ? 'is-active' : ''">
									<a ng-click="vehicleclose()">
										Tutup
									</a>
								</li>
							</ul>
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
												<td></td>
											</tr>
											<tr>
												<td>Jalur Proses</td>
												<td>{{vehicle.bank[0].bank_routecode}}</td>
												<td></td>
											</tr>
											<tr>
												<td>Nomor Tiket</td>
												<td>{{vehicle.bank[0].bank_routeflag}}</td>
												<td></td>
											</tr>
											<tr>
												<td>Nama Vendor</td>
												<td>{{vehicle.bank[0].bank_vendorname}}</td>
												<td></td>
											</tr>
											<tr>
												<td>Nomor Kendaraan</td>
												<td>{{vehicle.bank[0].bank_vehiclenumber}}</td>
												<td></td>
											</tr>
											<tr>
												<td>Nama Sopir</td>
												<td>{{vehicle.bank[0].bank_vehicledriver}}</td>
												<td></td>
											</tr>
											<tr>
												<td>Catatan</td>
												<td>{{vehicle.bank[0].bank_vehiclenote}}</td>
												<td></td>
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
												<th>&nbsp;</th>
                                			 </tr>
                                		</thead>
                                		<tbody>
                                			<tr ng-repeat="x in vehicle.weight">
												<td>{{x.weight_datetime}}</td>
												<td>{{x.weight_gross}}</td>
												<td>
													<a class="button is-small is-rounded is-danger" ng-click="vehicledeleteweight(x.id)">
														<span class="icon">
															<i class="fas fa-times"></i>
														</span>
													</a>
												</td>
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
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="x in vehicle.delivery">
												<td>
													<a ng-click="potonganopen(x.id)">{{x.delivery_number}}</a>
												</td>
												<td class="has-text-right">{{x.delivery_pack}}</td>
												<td class="has-text-right">{{x.delivery_gross}}</td>
												<td class="has-text-right">{{x.delivery_tare0}}</td>
												<td class="has-text-right">{{x.delivery_tare1}}</td>
												<td>
													<span class="tag is-warning" ng-hide="x.quality_status == 0 ? false : true">
														<span class="icon">
															<i class="fas fa-lg fa-hourglass"></i>
														</span>
														<span>Pending</span>
													</span>
													<span class="tag is-success" ng-hide="x.quality_status == 1 ? false : true">
														<span class="icon">
															<i class="fas fa-lg fa-check-circle"></i>
														</span>
														<span>Release</span>
													</span>
													<span class="tag is-danger" ng-hide="x.quality_status == 2 ? false : true">
														<span class="icon">
															<i class="fas fa-lg fa-times-circle"></i>
														</span>
														<span>Reject</span>
													</span>
												</td>
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
												<th>SJ Weight</th>
												<th>Gross Weight</th>
												<th>Kemasan</th>
												<th>QC</th>
												<th>Net Weight</th>
												<th>Non Value</th>
												<th>Selisih</th>
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
												<td>{{x.detail_gross - x.detail_tare0 - x.detail_tare1}}</td>
												<td>{{x.detail_target < x.detail_gross - x.detail_tare0 - x.detail_tare1 ? x.detail_gross - x.detail_tare0 - x.detail_tare1 - x.detail_target : 0}}</td>
												<td>{{x.detail_target > x.detail_gross - x.detail_tare0 - x.detail_tare1 ? x.detail_target - x.detail_gross - x.detail_tare0 - x.detail_tare1 : 0}}</td>
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

<div class="modal" ng-class="potongan.modal ? 'is-active' : ''">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Potongan Kemasan</p>
			<button class="delete" aria-label="close" ng-click="potonganclose()"></button>
		</header>
		<section class="modal-card-body">
			<div class="columns">
				<div class="column">
					<div class="field">
						<label class="label is-small">Nomor Material</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].detail_matnumber" readonly>
						</div>
					</div>
			
					<div class="field">
						<label class="label is-small">Nama Material</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].detail_matname" readonly>
						</div>
					</div>
					
					<div class="field">
						<label class="label is-small">Nomor SJ</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].delivery_number" readonly>
						</div>
					</div>
					
					<div class="field">
						<label class="label is-small">Jenis Potongan</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].matpack_unit" readonly>
						</div>
					</div>
					
					<div class="field">
						<label class="label is-small">Nominal Potongan</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].matpack_value" readonly>
						</div>
					</div>
					
					<div class="field">
						<label class="label is-small">Jenis Kemasan</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].matpack_pack" readonly>
						</div>
					</div>
					
				</div>
				<div class="column">
					<div class="field">
						<label class="label is-small">Berat Kotor</label>
						<div class="control">
							<input class="input is-small is-info" type="text" ng-model="potongan.data[0].delivery_gross" readonly>
						</div>
					</div>
					
					<hr>
					
					<div class="field">
						<label class="label is-small">Jumlah Kemasan</label>
						<div class="control">
							<input class="input is-small is-warning" type="text" ng-model="potongan.data[0].delivery_pack" ng-change="potonganchange()">
						</div>
					</div>
					
					<div class="field">
						<label class="label is-small">Potongan Kemasan</label>
						<div class="control">
							<input class="input is-small is-warning" type="text" ng-model="potongan.data[0].delivery_tare0">
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<footer class="modal-card-foot">
			<button class="button is-success" ng-click="potongansave()">
				<span class="icon">
					<i class="fas fa-check"></i>
				</span>
				<span>Simpan</span>
			</button>
			<button class="button" ng-click="potonganclose()">
				<span class="icon">
					<i class="fas fa-times"></i>
				</span>
				<span>Tutup</span>
			</button>
		</footer>
	</div>
</div>
<script>
var app = angular.module('app', []);
app.controller('ctrl', function($scope, $http, $interval) {		
	$scope.host = {};
	$scope.host.method = 'POST';
	$scope.host.url = '<?php echo site_url('ajax/ajax_request'); ?>';
	
	$scope.response = {resbool: true, restext: "", resdata: [], restimer:0};
	
	$scope.rfid = {search: ''};
	$scope.nopo = {search: ''};
	$scope.exit = {search: ''};
	
	$scope.vehicle = {bank:[], weight:[], data:[], detail:[], delivery:[], packages:[]};
	
	$scope.delivery = {dataid:'', dataname:'', detailid:'', detailname:'', number:'', target:''};
	
	$scope.potongan = {modal:'', data:[]};
	
	$scope.page = {id: 1};
	
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
				
				$scope.response.restimer = 10;
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
		$scope.vehicle.weight = [];
		$scope.vehicle.data = [];
		$scope.vehicle.detail = [];
		$scope.vehicle.delivery = [];
		$scope.vehicle.packages = [];
		
		$scope.setpage(1);
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
				console.log(response.data.databool);
				$scope.vehiclereloaddata();
				$scope.response.resbool = response.data.databool;
				$scope.response.restext = response.data.datatext;
				$scope.response.restimer = 10;
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
				$scope.response.resbool = response.data.databool;
				$scope.response.restext = response.data.datatext;
				$scope.response.restimer = 10;
			}
		},
		function(response){
		});
	}

	$scope.vehicledeleteweight = function (id)
	{
		var postdata = {
			command: "CREATE-DEL-WEIGHT",
			paramtext1: id
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
				$scope.response.resbool = response.data.databool;
				$scope.response.restext = response.data.datatext;
				$scope.response.restimer = 10;
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
			if (response.data.databool)
			{
				$scope.vehiclereloaddata();
				$scope.response.resbool = response.data.databool;
				$scope.response.restext = response.data.datatext;
				$scope.response.restimer = 10;
			}
		},
		function(response){
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

	$scope.potonganopen = function (id)
	{
		$scope.potongan.modal = true;
		$scope.potongan.data = [];
		
		var postdata = {
			command: "CREATE-GET-DELIVERY",
			paramtext1: id
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
				$scope.potongan.data = response.data.dataset;
			}
		},
		function(response){
		});
	}
	
	$scope.potongansave = function ()
	{
		var postdata = {
			command: "CREATE-SET-DELIVERY",
			paramtext1: $scope.potongan.data[0].id,
			paramtext2: $scope.potongan.data[0].delivery_tare0,
			paramtext3: $scope.potongan.data[0].delivery_pack
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
			for (var i = 0; i < $scope.vehicle.detail.length; i++)
			{
				if ($scope.vehicle.detail[i].id == $scope.potongan.data[0].detailid)
				{
					$scope.vehiclereloaddelivery($scope.potongan.data[0].detailid);
					break;
				}
			}
			$scope.potonganclose();
		},
		function(response){
		});
	}
	
	$scope.potonganclose = function ()
	{
		$scope.potongan.modal = false;
		$scope.potongan.data = [];
	}
	
	$scope.potonganchange = function ()
	{
		if ($scope.potongan.data[0].matpack_unit == '%')
		{
			$scope.potongan.data[0].delivery_tare0 = parseFloat($scope.potongan.data[0].delivery_gross * $scope.potongan.data[0].matpack_value / 100).toFixed(2);
		}
		else if ($scope.potongan.data[0].matpack_unit == 'N')
		{
			$scope.potongan.data[0].delivery_tare0 = parseFloat($scope.potongan.data[0].delivery_pack * $scope.potongan.data[0].matpack_value).toFixed(2);
		}
		else
		{
			$scope.potongan.data[0].delivery_tare0 = 0;
		}
	}
	
	$scope.setpage = function ($id)
	{
		if ($scope.vehicle.bank.length == 0)
		{
			$scope.page.id = 1;
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

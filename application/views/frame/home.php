<section class="section">

	<div class="box">
		<p class="subtitle">
			<span class="icon">
				<i class="fas fa-lg fa-truck"></i>
			</span>
			&nbsp;
			Kendaraan
		</p>
		
		<div class="tabs is-right">
			<ul>
				<li class="" ng-class="route.id == 1 ? 'is-active' : ''">
					<a ng-click="setroute(1)">Fresh</a>
				</li>
				<li class="" ng-class="route.id == 2 ? 'is-active' : ''">
					<a ng-click="setroute(2)">RM</a>
				</li>
				<li class="" ng-class="route.id == 5 ? 'is-active' : ''">
					<a ng-click="setroute(5)">Scrap</a>
				</li>
				<li class="" ng-class="route.id == 6 ? 'is-active' : ''">
					<a ng-click="setroute(6)">Lain</a>
				</li>
				</ul>
		</div>
		
		<div class="columns">
			<div class="column">
				<div class="tags are-medium has-addons">
					<span class="tag is-dark">Antrian</span>
					<span class="tag is-warning">{{route.set1.length}}</span>
				</div>
				<table class="table is-fullwidth is-narrow">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Kendaraan</th>
							<th>Vendor</th>
							<th>Sopir</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="x in route.set1">
							<td>{{x.bank_rfidplate}}</td>
							<td>{{x.bank_vehiclenumber}}</td>
							<td>{{x.bank_vendorname}}</td>
							<td>{{x.bank_vehicledriver}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="column">
				<div class="tags are-medium has-addons">
					<span class="tag is-dark">Proses</span>
					<span class="tag is-success">{{route.set2.length}}</span>
				</div>
				<table class="table is-fullwidth is-narrow">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Kendaraan</th>
							<th>Vendor</th>
							<th>Sopir</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="x in route.set2">
							<td>{{x.bank_rfidplate}}</td>
							<td>{{x.bank_vehiclenumber}}</td>
							<td>{{x.bank_vendorname}}</td>
							<td>{{x.bank_vehicledriver}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</section>

<script>
var app = angular.module('app', []);
app.controller('ctrl', function($scope, $http, $interval) {		
	$scope.host = {};
	$scope.host.method = 'POST';
	$scope.host.url = '<?php echo site_url('ajax/ajax_request'); ?>';
	
	$scope.route = {id:1, set1:[], set2:[],set5:[],set6:[]};
	
	$scope.setroute = function ($id)
	{
		$scope.route.id = $id;
		$scope.sync();
	}
	
	$scope.sync = function ()
	{
		var postdata = {
			command: "HOME-DASHBOARD",
			paramtext1: $scope.route.id
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
			$scope.route.set1 = response.data.dataset;
			$scope.route.set2 = response.data.dataset1;
		},
		function(response){
		});
	}
	$scope.sync();
	
	$interval($scope.sync, 5000);
});
</script>
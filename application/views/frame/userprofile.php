<section class="section">
	<div class="tile is-ancestor">
		<div class="tile is-8 is-vertical is-parent">
			<div class="tile is-child box">
				<p class="subtitle">
					<span class="icon">
						<i class="fas fa-lg fa-user"></i>
					</span>
					&nbsp;
					Information
				</p>
				
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Username</label>
					</div>
					<div class="field-body">
						<div class="field is-expanded">
							<p class="control is-expanded has-icons-left">
								<input class="input" type="text" placeholder="Username" ng-model="profile.username" readonly>
								<span class="icon is-small is-left">
									<i class="fas fa-user-circle"></i>
								</span>
							</p>
						</div>
					</div>
				</div>
				
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Full Name</label>
					</div>
					<div class="field-body">
						<div class="field is-expanded">
							<p class="control is-expanded has-icons-left">
								<input class="input" type="text" placeholder="Full Name" ng-model="profile.userfull" readonly>
								<span class="icon is-small is-left">
									<i class="fas fa-user"></i>
								</span>
							</p>
						</div>
					</div>
				</div>
				
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Group ID</label>
					</div>
					<div class="field-body">
						<div class="field is-expanded">
							<p class="control is-expanded has-icons-left">
								<input class="input" type="text" placeholder="Group ID" ng-model="profile.groupid" readonly>
								<span class="icon is-small is-left">
									<i class="fas fa-users"></i>
								</span>
							</p>
						</div>
					</div>
				</div>
				
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Level ID</label>
					</div>
					<div class="field-body">
						<div class="field is-expanded">
							<p class="control is-expanded has-icons-left">
								<input class="input" type="text" placeholder="Group ID" ng-model="profile.userlevel" readonly>
								<span class="icon is-small is-left">
									<i class="fas fa-user-tag"></i>
								</span>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="tile is-child box">
				<p class="subtitle">
					<span class="icon">
						<i class="fas fa-lg fa-tags"></i>
					</span>
					&nbsp;
					Tags
				</p>
				
				<div class="field is-grouped is-grouped-multiline">
					<div class="control">
						<div class="tags has-addons">
							<span class="tag is-dark">userid</span>
							<span class="tag is-info">{{profile.id}}</span>
						</div>
					</div>
					
					<div class="control">
						<div class="tags has-addons">
							<span class="tag is-dark">groupid</span>
							<span class="tag is-info">{{profile.groupid}}</span>
						</div>
					</div>
					
					<div class="control">
						<div class="tags has-addons">
							<span class="tag is-dark">levelid</span>
							<span class="tag is-info">{{profile.userlevel}}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tile is-parent">
			<div class="tile is-child box">
				<p class="subtitle">
					<span class="icon">
						<i class="fas fa-lg fa-edit"></i>
					</span>
					&nbsp;
					Edit
				</p>
				<div class="buttons">
					<span class="button is-rounded is-info" ng-click="editfullname()">Update Full name</span>
					<span class="button is-rounded is-warning" ng-click="editpassword()">Update Password</span>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal" ng-class="fullname.modal ? 'is-active' : ''">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Update Profile</p>
			<button class="delete" aria-label="close" ng-click="closefullname()"></button>
		</header>
		<section class="modal-card-body">
			<div class="field">
				<label class="label">New Full name</label>
				<div class="control">
					<p class="control is-expanded has-icons-left">
						<input class="input" type="text" placeholder="Full Name" ng-model="fullname.value">
						<span class="icon is-small is-left">
							<i class="fas fa-keyboard"></i>
						</span>
					</p>
				</div>
			</div>
		</section>
		<footer class="modal-card-foot">
			<button class="button is-success" ng-click="savefullname()">Update</button>
			<button class="button" ng-click="closefullname()">Close</button>
			<p class="help" ng-class="response.resbool ? 'is-success' : 'is-danger'">{{response.restext}}</p>
		</footer>
	</div>
</div>

<div class="modal" ng-class="password.modal ? 'is-active' : ''">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Update Profile</p>
			<button class="delete" aria-label="close" ng-click="closepassword()"></button>
		</header>
		<section class="modal-card-body">
			<div class="field">
				<label class="label">New Password</label>
				<div class="control">
					<p class="control is-expanded has-icons-left">
						<input class="input" type="password" placeholder="Password" ng-model="password.value">
						<span class="icon is-small is-left">
							<i class="fas fa-keyboard"></i>
						</span>
					</p>
				</div>
			</div>
			
			<div class="field">
				<label class="label">Confirm New Password</label>
				<div class="control">
					<p class="control is-expanded has-icons-left">
						<input class="input" type="password" placeholder="Confirmation" ng-model="password.value1">
						<span class="icon is-small is-left">
							<i class="fas fa-keyboard"></i>
						</span>
					</p>
				</div>
			</div>
		</section>
		<footer class="modal-card-foot">
			<button class="button is-success" ng-click="savepassword()">Update</button>
			<button class="button" ng-click="closepassword()">Close</button>
			<p class="help" ng-class="response.resbool ? 'is-success' : 'is-danger'">{{response.restext}}</p>
		</footer>
	</div>
</div>

<script>
var app = angular.module('app', []);
app.controller('ctrl', function($scope, $http, $timeout) {
	$scope.host = {};
	$scope.host.method = 'POST';
	$scope.host.url = '<?php echo site_url('ajax/ajax_request'); ?>';

	$scope.profile = {};
	$scope.fullname = {value: "", modal:false};
	$scope.password = {value: "", value1: "", modal:false};
	$scope.response = {resbool: false, restext: "", resdata: []};
	
	$scope.init = function ()
	{
		var postdata = {
			command: "USER-LOADPROFILE"
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
			$scope.profile = response.data.dataset[0];
		},
		function(response){
		});
	}
	$scope.init();
	
	$scope.editfullname = function ()
	{
		$scope.fullname.value = $scope.profile.userfull;
		$scope.fullname.modal = true;
	}
	
	$scope.savefullname = function ()
	{	
		var postdata = {
			command: "USER-UPDATEFULLNAME",
			paramtext1: $scope.fullname.value
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
			
			$scope.fullname.value = "";
		},
		function(response){
			$scope.response.resbool = false;
			$scope.response.restext = "Network Error";
		});
	}
	
	$scope.closefullname = function ()
	{
		$scope.fullname.value = '';
		$scope.fullname.modal = false;
		
		$scope.response.restext = '';
		
		$scope.init();
	}
	
	$scope.editpassword = function ()
	{
		$scope.password.modal = true;
	}
	
	$scope.savepassword = function ()
	{
		var postdata = {
			command: "USER-UPDATEPASSWORD",
			paramtext1: $scope.password.value,
			paramtext2: $scope.password.value1
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
			
			$scope.password.value = "";
			$scope.password.value1 = "";
		},
		function(response){
			$scope.response.resbool = false;
			$scope.response.restext = "Network Error";
		});
	}
	
	$scope.closepassword = function ()
	{
		$scope.password.value = '';
		$scope.password.value1 = '';
		$scope.password.modal = false;
		
		$scope.response.restext = '';
		
		$scope.init();
	}
});
</script>
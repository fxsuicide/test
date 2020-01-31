<section class="hero is-info is-fullheight-with-navbar">
	<div class="hero-body">
		<div class="container">
			<div class="columns is-centered">
				<div class="box">
					<div class="content">
						<div class="field">
							<h5 class="subtitle is-5 has-text-info">
								<span class="icon">
									<i class="fas fa-key"></i>
								</span>
								Login
							</h5>
						</div>
						<form>
							<div class="field">
								<p class="control has-icons-left">
									<input class="input" type="text" placeholder="username ..." ng-model="username.value">
									<span class="icon is-small is-left">
										<i class="fas fa-user"></i>
									</span>
								</p>
							</div>
							<div class="field">
								<p class="control has-icons-left">
									<input class="input" type="password" placeholder="password ..." ng-model="password.value">
									<span class="icon is-small is-left">
										<i class="fas fa-key"></i>
									</span>
								</p>
							</div>
							<div class="field">
								<p class="control">
									<button type="submit" class="button is-success is-fullwidth" ng-click="userlogin()">
										<span class="icon">
											<i class="fa fa-sign-in-alt"></i>
										</span>
										<span>
											Login
										</span>
									</button>
								</p>
								<p class="help" ng-class="response.resbool ? 'is-success' : 'is-danger'" ng-bind="response.restext" ng-hide="response.restext == '' ? true : false"></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
var app = angular.module('app', []);
app.controller('ctrl', function($scope, $http, $timeout) {
	$scope.host = {};
	$scope.host.method = 'POST';
	$scope.host.url = '<?php echo site_url('ajax/ajax_request'); ?>';
	
	$scope.username = {value: ""};
	$scope.password = {value: ""};
	$scope.response = {resbool: false, restext: "", resdata: []};
	
	$scope.userlogin = function() {
		var postdata = {
			command: "USER-LOGIN",
			paramtext1: $scope.username.value,
			paramtext2: $scope.password.value
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
			
			if (response.data.databool)
			{
				$timeout(function () {
					window.location.replace("<?php echo site_url('control/home'); ?>");
				}, 1500);
			}
			else
			{
				$scope.password.value = "";
			}
		},
		function(response){
			$scope.response.resbool = false;
			$scope.response.restext = "Network Error";
		});
	}
});
</script>
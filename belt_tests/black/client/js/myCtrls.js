angular.module("myCtrls", [])
.controller("appointmentsCtrl", function($scope, appFactory) {

	$scope.sort = "date";
	
	$scope.userName = appFactory.userName;

	appFactory.readAppointment(function(result) {
		
		// only you can see delete button
		for(var i in result) {
			if(result[i].patientName == $scope.userName) {
				result[i].isYou = true;
			}
			else {
				result[i].isYou = false;
			}
		}
		$scope.appointments = result;		
	})

	$scope.deleteAppointment = function(selectedAppointment) {
		appFactory.deleteAppointment(selectedAppointment);
	}

})

.controller("newAppointmentCtrl", function($scope, $location, appFactory) {

	console.log(appFactory.userName, "Pname");

	$scope.times = [ "08:00 AM", "09:00 AM", "10:00 AM", "11:00 AM", "12:00 AM", "01:00 PM", "02:00 PM", "03:00 PM", "04:00 PM", "05:00 PM"];

	$scope.isError = false;
	$scope.errors = [];
	// $scope.userName = appFactory.userName;
	// console.log("userName:", $scope.userName);

	$scope.createAppointment = function(newAppointment) {
		
		$scope.isError = false;
		$scope.errors = [];
		appFactory.createAppointment(newAppointment, function(err, result) {
			
			if(err != null) {
				$scope.isError = true;
				$scope.errors = err;
				console.log(err);
			}
			else {
				console.log("success");
				$scope.isError = false;
				$scope.errors = [];
				$location.path("/");	
			}
		})
	}
})
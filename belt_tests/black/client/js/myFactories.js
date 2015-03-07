angular.module("myFactories", [])
.factory("appFactory", function($http) {
	var factory = {};
	var appointments = [];
	factory.userName = "";
	factory.userName = prompt();

	factory.createAppointment = function(newAppointment, callback) {
		newAppointment.patientName = factory.userName;
		// console.log("newAppointment", newAppointment);
		$http.post("/appointments", newAppointment).success(function(result) {
			
			console.log("=================");
			if(angular.isArray(result)) {
				console.log("err:", result);
				callback(result, null);
			}
			else {
				console.dir("success:", result);
				appointments.push(result);
				callback(null, result);
			}
		});
	};

	factory.readAppointment = function(callback) {
		$http.get("/appointments").success(function(result) {
			appointments = result;
			callback(appointments);
		});
	};

	factory.deleteAppointment = function(selectedAppointment, callback) {
		$http({
			method: "DELETE",
			url: "/appointments/" + selectedAppointment._id
		}).success(function(result) {
			appointments.splice(appointments.indexOf(selectedAppointment), 1);
		});
	};

	// factory.addUserName = function(newUserName) {
	// 	factory.userName = newUserName;
	// 	// return userName;
	// }

	return factory;
})
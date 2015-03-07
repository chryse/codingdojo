angular.module("myConfig", [])
.config(function($routeProvider) {
	$routeProvider
	.when("/", {
		templateUrl: "/appointments.html",
		controller: "appointmentsCtrl"
	})
	.when("/new_appointment", {
		templateUrl: "/new_appointment.html",
		controller: "newAppointmentCtrl"
	})
	.otherwise({
		redirectTo: "/"
	})
})
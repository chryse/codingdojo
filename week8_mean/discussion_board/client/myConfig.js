angular.module("myConfig", [])
.config(function($routeProvider) {
$routeProvider
	.when("/", {
		templateUrl: "/main.html",
		controller: "mainCtrl"
	})
	.when("/dashboard", {
		templateUrl: "/dashboard.html",
		controller: "dashboardCtrl"
	})
	.when("/topic/:id", {
		templateUrl: "/topic.html",
		controller: "topicCtrl"
	})
	.when("/user/:id", {
		templateUrl: "/user.html",
		controller: "userCtrl"
	})
	.otherwise({
		redirectTo: "/"
	})
})
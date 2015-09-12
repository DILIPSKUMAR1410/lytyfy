var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider,$interpolateProvider){
 	$interpolateProvider.startSymbol('{[{').endSymbol('}]}');
	$routeProvider.
		when('/', {
			templateUrl: '/bundles/fabric/js/app/templates/project.html',
			controller: 'ProjectController'
		}).
		when('/newhome', {
			templateUrl: '/bundles/fabric/js/app/templates/map.html',
			controller: 'PortfolioController'
		}).
		otherwise({
			templateUrl: '/bundles/fabric/js/app/templates/project.html',
			controller: 'ProjectController'
		});
});

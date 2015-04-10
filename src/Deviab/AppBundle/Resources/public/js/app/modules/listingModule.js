var app = angular.module('listingModule', ['ngRoute']);

app.config(function($routeProvider, $interpolateProvider){
	$interpolateProvider.startSymbol('{[{').endSymbol('}]}');
	$routeProvider.
		when('/index', {
			templateUrl: '/bundles/busapp/js/app/templates/index.html',
			controller: 'IndexController'
		}).
	
		otherwise({
			templateUrl: '/bundles/busapp/js/app/templates/index.html',
			controller: 'IndexController'
		});		
});
var app = angular.module('myApp', ['ngRoute']);
app.config(function ($routeProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    $routeProvider.
        when('/', {
            templateUrl: '/bundles/fabric/js/app/templates/home.html',
            controller: 'ProjectController'
        }).
        when('/payu', {
            templateUrl: '/bundles/fabric/js/app/templates/payu.html',
            controller: 'ProjectController'
        }).
        when('/faqs', {
            templateUrl: '/bundles/fabric/js/app/templates/faqs.html',
            controller: 'ProjectController'
        }).
        when('/how_it_works', {
            templateUrl: '/bundles/fabric/js/app/templates/how_it_works.html',
            controller: 'ProjectController'
        }).
        when('/profile', {
            templateUrl: '/bundles/fabric/js/app/templates/profile.html',
            controller: 'ProfileController'
        });
});

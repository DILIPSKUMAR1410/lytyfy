    var listingsModule = angular.module('listingsModule', ['ngRoute']);

    listingsModule.config(function($routeProvider, $interpolateProvider) {
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    });
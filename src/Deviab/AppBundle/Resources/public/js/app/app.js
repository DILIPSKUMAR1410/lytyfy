var listingsModule = angular.module('listingsModule', ['ngRoute']);

listingsModule.config(function($routeProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});
listingsModule.controller('filterController', function($scope) {
    $scope.states = [
        'guest',
        'user',
        'customer',
        'admin'
    ];
    $scope.filterData = {
        state: []
    };
    $scope.checkAll = function() {
        $scope.filterData.states = angular.copy($scope.states);
    };
    $scope.uncheckAll = function() {
        $scope.filterData.states = [];
    };


});
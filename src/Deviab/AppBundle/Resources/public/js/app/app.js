var app = angular.module("app", ["checklist-model", "ngRoute"]);
app.config(function($routeProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

app.controller('filterController', function($scope) {
    $scope.states = [
        'cg',
        'tn',
        'kr',
        'mh'
    ];
    $scope.filterData = {
        selectedStates: ['cg']
    };
    $scope.checkAll = function() {
        $scope.filterData.selectedStates = angular.copy($scope.states);
    };
    $scope.uncheckAll = function() {
        $scope.filterData.selectedStates = [];
    };

});
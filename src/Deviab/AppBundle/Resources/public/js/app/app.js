var app = angular.module("app", ["checklist-model", "ngRoute"]);
app.config(function($routeProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

app.controller('filterController', function() {


     // $http.post('http://127.0.0.1:8080/borrowers/listing/search', this.filterData).then(function(response) {
     //        this.borrowerList = response.data;
     //       console.log(response);
     //    });
        
    
    this.states = [
        'cg',
        'tn',
        'kr',
        'mh'
    ];
    this.amountNeeded = [
        'cg',
        'tn',
        'kr',
        'mh'
    ];
    this.gender = [
        'cg',
        'tn',
        'kr',
        'mh'
    ];
    this.age = [
        'cg',
        'tn',
        'kr',
        'mh'
    ];
    this.education= [
        'cg',
        'tn',
        'kr',
        'mh'
    ];



    this.filterData = {
        selectedStates: ['cg'],
        selectedAmountNeeded: ['cg'],
        selectedGender: ['cg'],
        selectedEducation: ['cg'],
        selectedAge: ['cg'],

    };


    this.checkAll = function() {
        this.filterData.selectedStates = angular.copy(this.states);
            };
   this.uncheckAll = function() {
        this.filterData.selectedStates = [];
    };

});
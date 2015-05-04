var app = angular.module("app", ["checklist-model", "ngRoute"]);
app.config(function($routeProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

app.controller('filterController',['$http',function($http) {

    var borrowerList=this;
    var filterData = this;
    filterData= {
        
        selectedGender: [],
        selectedStates: [],
        selectedAmountneeded: [],
        selectedGender: [],
        selectedEducation: [],
        selectedAge: []

    };

     $http.post('http://127.0.0.1:8080/borrowers/listing/search',filterData).success(function(response) {
           borrowerList = response.data;
           console.log(response.data);
        });
        
    
    this.states = [
        'cg',
        'tn',
        'kr',
        'mh'
    ];
    this.amountneeded = [
        '100-500',
        '501-1000',
        '1001-5000',
        '>5000'
    ];
    this.gender = [
        'Male',
        'Female',
            ];
    this.age = [
        '<18',
        '18-25',
        '26-35',
        '35-50',
        '>50'
        
    ];
    this.education= [
        'Illiterate',
        'Metric',
        'Graduated',
        'Postgraduated'
    ];



   


    this.checkAll = function() {
        this.filterData.selectedstates = angular.copy(this.states);
            };
   this.uncheckAll = function() {
        this.filterData.selectedstates = [];
    };

}
]);
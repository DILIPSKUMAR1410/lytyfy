app.controller("ProfileController", function ($scope, $http) {
    //$scope.profileResponce = null;
    var res = $http.get('/api/v1/lender');
    res.success(function (data, status, headers, config) {
        $scope.profileResponce = data;
      $(".loading").hide();
    });
    res.error(function(data, status, headers, config) {
      console.log( "failure message: " + JSON.stringify({data: data}));
    });
});
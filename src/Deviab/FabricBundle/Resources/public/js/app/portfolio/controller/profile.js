app.controller("ProfileController", function ($scope, $http) {
    //$scope.profileResponce = null;
    var res = $http.get('/api/v1/lender');
    res.success(function (data, status, headers, config) {
        $scope.profileResponce = data;
       var link = $scope.profileResponce.to_lender_transactions[0].project.to_project_lender_transactions[0];
      $scope.withdraw = link.amount - link.lender.current_status.pricipal_left - link.lender.wallet.credits;
      $(".loading").hide();
    });
    res.error(function(data, status, headers, config) {
      console.log( "failure message: " + JSON.stringify({data: data}));
    });
});
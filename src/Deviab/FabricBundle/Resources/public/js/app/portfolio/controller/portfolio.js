app.controller("portfolioController", function($scope,$http) {
    $scope.jsonResponce = null;
    var res = $http.get('/borrowers/2.json');
    res.success(function(data, status, headers, config) {
      $scope.portfolioResponce = data;
      console.log(data);
  });
  // res.error(function(data, status, headers, config) {
  //   alert( "failure message: " + JSON.stringify({data: data}));
  // });
});


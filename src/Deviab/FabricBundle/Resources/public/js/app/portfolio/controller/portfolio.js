app.controller("PortfolioController", function($scope,$http) {
    $scope.jsonResponce = "Raghav";
    alert("hello");
    var res = $http.get('/borrowers/2.json');
    res.success(function(data, status, headers, config) {
      $scope.portfolioResponce = data;
      console.log(data);
  });
  res.error(function(data, status, headers, config) {
    alert( "failure message: " + JSON.stringify({data: data}));
  });
});
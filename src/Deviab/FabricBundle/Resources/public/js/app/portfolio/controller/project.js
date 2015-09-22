app.controller("ProjectController", function ($scope, $http) {
    $scope.lenders = lenders;
    var res = $http.get('/api/v1/borrowers/2.json');
    res.success(function (data, status, headers, config) {
        $scope.portfolioResponce = data;
        console.log(data);
    });
    // res.error(function(data, status, headers, config) {
    //   alert( "failure message: " + JSON.stringify({data: data}));
    // });
});
var lenders = [
    {
        id: 1,
        img: "profile",
        remarks: "remarks1"
    },
    {
        id: 2,
        img: "profile2",
        remarks: "remarks2"
    },
    {
        id: 3,
        img: "profile3",
        remarks: "remarks3"
    },
    {
        id: 4,
        img: "profile4",
        remarks: "remarks4"
    },
    {
        id: 5,
        img: "profile5",
        remarks: "remarks5"
    },
    {
        id: 6,
        img: "profile6",
        remarks: "remarks6"
    },
    {
        id: 7,
        img: "profile7",
        remarks: "remarks7"
    },
    {
        id: 8,
        img: "profile8",
        remarks: "remarks8"
    }
];
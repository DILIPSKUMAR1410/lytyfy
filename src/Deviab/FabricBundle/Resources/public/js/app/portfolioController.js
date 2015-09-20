//alert("ji");
var citydata = [];
app.controller("newController", function ($scope) {
    $scope.products = city;
});
var a;
app.controller("addDriverController", function ($scope) {
    $scope.cities = cities;
});

app.controller("addVehicleController", function ($scope) {
    $scope.Vehiclecities = cities;
});


app.controller("addAreaController", function ($scope, $http) {
    $scope.people = [];
    $scope.cities = cities;
    $scope.parents = parents;
    $scope.types = types;
    $scope.isType = true;
    $scope.hideZone = false;
    $scope.isCity = true;
    $scope.isZone = true;
    $scope.isResult = true;
    $scope.isComplited = true;
    $scope.parentId = null;
    $scope.localities = localities;
    $scope.changedCity = function (getCity) {

        if (getCity != null) {
            $scope.isCity = false;
            initialize(getCity.cityName);
        } else {
            $scope.isCity = true;
        }
        $scope.checkParants();
    };
    $scope.checkParants = function () {
        if ($scope.isCity == false && $scope.isType == false && $scope.isResult == false) {
            if ($scope.typeSelected.name == 'Zone') {

            } else {
                $scope.parents = parents;
            }
        }
    };
    $scope.changedType = function (areaType) {
        if (areaType != null) {
            if (areaType.name == 'Zone') {
                $scope.hideZone = true;
                $scope.isComplited = false;
                $scope.isType = false;
                $scope.parentId = null;
            } else {
                $scope.hideZone = false;
                $scope.isType = false;
                $scope.isComplited = true;
            }
        } else {
            $scope.parentId = null;
            $scope.hideZone = false;
            $scope.isType = true;
        }
        $scope.checkParants();
    };

    $scope.changedParent = function (parent) {
        if (parent != null) {
            $scope.isComplited = false;
            $scope.parentId = parent.id;
        } else {
            $scope.parentId = null;
            $scope.isComplited = true;
        }
    };

    $scope.getResult = function () {
        $scope.isResult = false;
        $scope.checkParants();
    };

    $scope.submitAction = function () {
        var dataObj = {
            "data": {
                "area_name": $("#show-area").val(),
                "area_type_id": $scope.typeSelected.id,
                "city_id": $scope.citySelected.id,
                "last_updated_by_id": 1,
                "is_disabled": "false",
                "latitude": $("#location_lat").val(),
                "longitude": $("#location_long").val(),
                "parent_id": $scope.parentId
            },
            "url": {
                "link_info": "area-save",
            },
            "request-type": {
                "request": "POST"
            }
        };
        var res = $http.post('/genericapis', dataObj);
        res.success(function (data, status, headers, config) {
            // console.log($scope.people);
            $scope.people.push(data.response_obj);
            console.log($scope.people);
            $scope.cities = cit;
            // console.log($scope.cities);
        });
        res.error(function (data, status, headers, config) {
            //alert( "failure message: " + JSON.stringify({data: data}));
        });
        //var result = '{ area_name =' + $("#show-area").val() + ', area_type_id =' + $scope.typeSelected.id + ', city_id =' + $scope.citySelected.id + ', is_disabled= false' + ', latitude =' + $("#location_lat").val() + ', longitude =' + $("#location_long").val() +'}';
        //console.log(result);
        // console.log('city id = '+$scope.citySelected.id);
    }


});


var cities = [
    {
        id: 1,
        cityName: 'Bangalore'
    },
    {
        id: 2,
        cityName: 'Mumbai'
    },
    {
        id: 3,
        cityName: 'Delhi'
    }
];

var cit = [
    {
        id: 1,
        cityName: 'Bane'
    },
    {
        id: 2,
        cityName: 'Mumbai'
    },
    {
        id: 3,
        cityName: 'Delhi'
    }
];

var parents = [
    {
        id: 1,
        name: 'parent 1'
    },
    {
        id: 2,
        name: 'parent 2'
    },
    {
        id: 3,
        name: 'parent 3'
    },
    {
        id: 4,
        name: 'parent 4'
    }

];


var types = [
    {
        id: 1,
        name: 'Zone'
    },
    {
        id: 2,
        name: 'Area'
    },
    {
        id: 3,
        name: 'Locality'
    }
];


var areas = [
    {
        id: 1,
        type: 'Btm-Layout 2nd stage'
    },
    {
        id: 2,
        type: 'Hsr'
    },
    {
        id: 3,
        type: 'Kormangala'
    },
    {
        id: 4,
        type: 'JP Nagar'
    }
];


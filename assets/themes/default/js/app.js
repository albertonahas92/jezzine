var app = angular.module("jezzineApp", [
    "angularUtils.directives.dirPagination",
    "ngAnimate"
]);

app
    .controller("BookingFilterController", function(
        $scope,
        $http
    ) {
        $http
            .get(base_url + "Booking/loadProperties?per_page=0")
            .then(function(res, status, xhr) {
                $scope.data = res.data;
                $scope.properties = res.data;
                $scope.base_url = base_url;


                console.log(res.data);
                // pagination controls
                $scope.currentPage = 1;
                $scope.totalItems = $scope.data.length;

                $scope.entryLimit = 4; // items per page
                $scope.noOfPages = Math.ceil(
                    $scope.totalItems / $scope.entryLimit
                );
            });
        $scope.f = {};

        $scope.list = true;
        $scope.setList = function(val) {
            $scope.list = val;
        };
        $scope.prices = "0-800";

        $scope.sortKey = "id";

        // var cat = window.location.href.split("=")[1];
        // if (cat != null && cat != "") $scope.cat_id = cat;
        // else $scope.category = -1;

        $scope.category = {};
        $scope.selected = {};

        $scope.selectItem = function(item) {
            $scope.selected = item;
            $http
                .get(base_url + "menu/getItemIngrident?id=" + item.id)
                .then(function(res, status, xhr) {
                    $scope.selected.ingridents = res.data;
                });

            $http
                .get(base_url + "menu/getItemAttributes?id=" + item.id)
                .then(function(res, status, xhr) {
                    $scope.selected.attributes = res.data;
                });

            $http
                .get(base_url + "menu/getItemCategories?id=" + item.id)
                .then(function(res, status, xhr) {
                    $scope.selected.categories = res.data;
                });
        };

        $scope.stars = [
            { title: 'Any', checked: 1, val: -1 },

            { title: '2*', checked: 0, val: 2 },
            { title: '3*', checked: 0, val: 3 },
            { title: '4*', checked: 0, val: 4 },
            { title: '5*', checked: 0, val: 5 }
        ];

        $scope.categories = [
            { title: 'Any', checked: 1, val: -1 },

            { title: 'Hotel', checked: 0, val: 1 },
            { title: 'Villa', checked: 0, val: 2 },
            { title: 'Cotage', checked: 0, val: 3 },
            { title: 'Chalet', checked: 0, val: 4 },
            { title: 'Apt', checked: 0, val: 5 },
            { title: 'Room', checked: 0, val: 6 },
            { title: 'Hostel', checked: 0, val: 7 },
            { title: 'House', checked: 0, val: 8 }

        ];

        $scope.selectCat = function(item) {


        }

        $scope.starsFilter = function(val) {

            if ($scope.stars[0].checked) {
                return true;
            }

            if ($scope.stars[1].checked && val.stars == $scope.stars[1].val) {
                return true;
            }


            if ($scope.stars[2].checked && val.stars == $scope.stars[2].val) {
                return true;
            }


            if ($scope.stars[3].checked && val.stars == $scope.stars[3].val) {
                return true;
            }


            if ($scope.stars[4].checked && val.stars == $scope.stars[4].val) {
                return true;
            }




            return false;

        };


        $scope.catFilter = function(val) {

            return function(val) {

                if ($scope.categories[0].checked) {
                    return true;
                }
                for (var cat in $scope.categories) {
                    if (cat.checked && val.category == cat.val) {
                        return true;
                    }
                }
            };
        };









        $scope.priceFilter = function(val) {
            var min = parseInt($scope.price.split("-")[0]);
            var max = parseInt($scope.price.split("-")[1]);
            //console.log('min : '+min);console.log('max : '+max);
            return val.price <= max && val.price >= min;
        };




        $scope.filter_by = function(field) {
            console.log(field);
            console.log($scope.g[field]);
            if ($scope.g[field] === "" || $scope.g[field] == -1) {
                delete $scope.f["__" + field];
                return;
            }
            $scope.f["__" + field] = true;
            $scope.data.forEach(function(v) {
                v["__" + field] = v[field] == $scope.g[field];
            });
        };

        $scope.setCat = function(id) {
            $scope.cat_id = id;
        };

        $scope.setPrice = function(input) {
            $scope.price = $(input).val();
        };



    })

.filter("startFrom", function() {
        return function(input, start) {
            if (input) {
                start = +start;
                return input.slice(start);
            }
            return [];
        };
    })
    .filter('keywordFilter', function() {
        return function(items, category) {

            var arrayToReturn = [];
            if (category.category[0].checked) return items;
            if (items != undefined)
                for (var i = 0; i < items.length; i++) {

                    category.category.forEach(cat => {

                        if (cat.checked && items[i].category == cat.val) {

                            arrayToReturn.push(items[i]);
                        }
                    });



                }
            return arrayToReturn;
        };
    })
    .directive("a", function() {
        return {
            restrict: "E",
            link: function(scope, elem, attrs) {
                if (attrs.ngClick || attrs.href === "" || attrs.href === "#") {
                    elem.on("click", function(e) {
                        e.preventDefault();
                    });
                }
            }
        };
    });
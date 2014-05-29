'use strict';

var app = angular.module('bw2', ['ngRoute']);

// Configure the routes for our app.
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/', {
                controller: 'MainCtrl',
                templateUrl: 'views/home.html'
            })
            .when('/courses', {
                controller: 'CoursesCtrl',
                templateUrl: 'views/scuba_courses.html'
            })
            .when('/courses/:course_id', {
                controller: 'CoursesCtrl',
                templateUrl: 'views/scuba_courses.html'
            })
            .when('/aboutus', {
                controller: 'AboutUsCtrl',
                templateUrl: 'views/about_us.html'
            })
            .when('/divelog', {
                controller: 'DiveLogCtrl',
                templateUrl: 'divelog/index.php'
            })
            .otherwise({
                redirectTo: '/'
            });
    }
]);

app.controller('MainCtrl', function($scope, $location, $anchorScroll) {

    var CONTROLLER_NAME = 'MainCtrl';
    console.log('--> [MainCtrl]');

    // NOTE: On a per-controller (page) base, here's how to do
    // anchors for the current view:
    //   <a ng-click="scrollTo('foo')">Foo</a>
    //   <div id="foo">Here you are</div>
    //$scope.scrollTo = function(id) {
    //    $location.hash(id);
    //    $anchorScroll();
    //};

    $scope.courses = function(anchor) {
        var path = '/courses';
        if(anchor) {
            path += '/' + anchor;
        }
        $location.path(path);
    };

    $scope.about_us = function() {
        var path = '/aboutus';
        $location.path(path);
    };

    $scope.divelog = function() {
        var path = '/divelog';
        $location.path(path);
    };
});

app.controller('CoursesCtrl', function($scope, $location, $routeParams, $anchorScroll) {
        var CONTROLLER_NAME = 'CoursesCtrl';
        console.log('--> [CoursesCtrl]');

        var course_id = $routeParams.course_id;
        console.log('--> course_id: ' + course_id);

        if(course_id) {
            var old = $location.hash();
            $location.hash(course_id);
            $anchorScroll();
            $location.hash(old);
        }

        $scope.home = function() {
            var path = '/';
            $location.path(path);
        };

        $scope.about_us = function() {
            var path = '/aboutus';
            $location.path(path);
        };

        $scope.divelog = function() {
            var path = '/divelog';
            $location.path(path);
        };
    }
);

app.controller('AboutUsCtrl', ['$scope', '$location',
    function($scope, $location) {
        var CONTROLLER_NAME = 'AboutUsCtrl';
        console.log('--> [AboutUsCtrl]');

        $scope.home = function() {
            var path = '/';
            $location.path(path);
        };

        $scope.courses = function() {
            var path = '/courses';
            $location.path(path);
        };

        $scope.divelog = function() {
            var path = '/divelog';
            $location.path(path);
        };
    }
]);

app.controller('DiveLogCtrl', ['$scope', '$location',
    function($scope, $location) {

        $scope.home = function() {
            var path = '/';
            $location.path(path);
        };

        $scope.courses = function() {
            var path = '/courses';
            $location.path(path);
        };

        $scope.about_us = function() {
            var path = '/aboutus';
            $location.path(path);
        };
    }
]);

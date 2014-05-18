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
            .when('/aboutus', {
                controller: 'AboutUsCtrl',
                templateUrl: 'views/about_us.html'
            })
            .when('/divelog', {
                controller: 'DiveLogCtrl',
                templateUrl: 'views/divelog.html'
            })
            .otherwise({
                redirectTo: '/'
            });
    }
]);

app.run(function($rootScope, $templateCache) {
   $rootScope.$on('$viewContentLoaded', function() {
      $templateCache.removeAll();
   });
});

app.controller('MainCtrl', ['$scope', '$location',
    function($scope, $location) {
        var CONTROLLER_NAME = 'MainCtrl';
        console.log('--> [MainCtrl]');

        $scope.courses = function() {
            var path = '/courses';
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
]);

app.controller('CoursesCtrl', ['$scope', '$location',
    function($scope, $location) {
        var CONTROLLER_NAME = 'CoursesCtrl';
        console.log('--> [CoursesCtrl]');

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
]);

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

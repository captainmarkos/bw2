'use strict';

var app = angular.module('bw2', ['ngRoute']);

// Configure the routes for our app.
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/home.html'
            })
            .when('/courses', {
                controller: 'CoursesCtrl',
                templateUrl: 'views/scuba_courses.html'
            })
            .when('/aboutus', {
                templateUrl: 'views/about_us.html'
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

app.controller('CoursesCtrl', ['$scope',
    function($scope) {
        var CONTROLLER_NAME = 'CoursesCtrl';
        console.log('--> [CoursesCtrl]');
    }
]);

'use strict';

var app = angular.module('bw2', ['ngRoute', 'ngAnimate']);

// Configure the routes for our app.
app.config(['$locationProvider', '$routeProvider',
    function($locationProvider, $routeProvider) {

        $locationProvider.hashPrefix('!');

        $routeProvider
            .when('/', {
                controller: 'MainCtrl',
                templateUrl: '/views/home.html'
            })
            .when('/home', {
                controller: 'MainCtrl',
                templateUrl: '/views/home.html'
            })
            .when('/courses', {
                controller: 'CoursesCtrl',
                templateUrl: '/views/scuba_courses.html'
            })
            .when('/courses/:course_id', {
                controller: 'CourseDetailCtrl',
                templateUrl: '/views/scuba_courses.html'
            })
            .when('/aboutus', {
                controller: 'AboutUsCtrl',
                templateUrl: '/views/about_us.html'
            })
            .otherwise({
                redirectTo: '/home'
            });

        // NOTE: Setting html5 mode removes the need for the hash tag
        // in the url.  However IE lt 10 sucks so we need to check.
        /*
        console.log('--> [app.config]: ' + navigator.appVersion);
        if(navigator.appVersion.indexOf('MSIE 9') != -1) {
            console.log('--> [app.config]: Detected MSIE 9 - html5 mode false');
        } else {
            console.log('--> [app.config]: html5 mode true');
            //$locationProvider.html5Mode(true);
        }
        */
    }
]);

app.factory('Page', function() {
    var title = 'Blue Wild - Scuba Diving';
    return {
        title: function() { return title; },
        setTitle: function(newTitle) { title = newTitle; }
    };
});

app.controller('MainCtrl', function($scope, $location, $anchorScroll, Page) {
    $scope.Page = Page;
    Page.setTitle('Blue Wild - Scuba Diving and Instruction');

    $scope.courses = function(anchor) {
        var path = '/courses';
        if(anchor) {
            path += '/' + anchor;
        }
        console.log('path: ' + path);
        $location.path(path);
    };

    // NOTE: For snapshots.
    // Flag used in the DOM that lets the headless browser know that it's ready.
    $scope.status = 'ready';
});

app.controller('CoursesCtrl', function($scope, $location, $routeParams, Page) {
    Page.setTitle('Blue Wild - Scuba Courses');
    $scope.status = 'ready';
});


app.controller('CourseDetailCtrl', function($scope, $location, $routeParams, $anchorScroll, Page) {
    Page.setTitle('Blue Wild - Scuba Courses');
    console.log('--> [CourseDetailCtrl]');

    var course_id = $routeParams.course_id;
    console.log('--> course_id: ' + course_id);

    if(course_id) {
        var old = $location.hash();
        $location.hash(course_id);
        $anchorScroll();
        $location.hash(old);
    }

    $scope.status = 'ready';
});

app.controller('AboutUsCtrl', function($scope, $location, Page) {
    Page.setTitle('Blue Wild - About Us');
    console.log('--> [AboutUsCtrl]');

    $scope.status = 'ready';
});

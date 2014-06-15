//
// bluewildscuba.com
//
var app = angular.module('bw2', ['ngRoute', 'ngAnimate']);

// Configure the routes for our app.
app.config(function($routeProvider, $locationProvider) {

    $locationProvider.html5Mode(true);

    $routeProvider
        .when('/', { controller: 'MainCtrl', templateUrl: '/views/home.html' })
        .when('/home', { controller: 'MainCtrl', templateUrl: '/views/home.html' })
        .when('/courses', { controller: 'CoursesCtrl', templateUrl: '/views/scuba_courses.html' })
        .when('/courses/:course_id', { controller: 'CourseDetailCtrl', templateUrl: '/views/scuba_courses.html' })
        .when('/aboutus', { controller: 'AboutUsCtrl', templateUrl: '/views/about_us.html' })
        .otherwise({ redirectTo: '/home' });
});

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

    // NOTE: For snapshots, flag used in the DOM that lets phantomjs
    // headless browser know that it's ready to create a snapshot.
    $scope.status = 'ready';
});

app.controller('CoursesCtrl', function($scope, $location, $routeParams, Page) {
    Page.setTitle('Blue Wild - Scuba Courses');
    $scope.status = 'ready';
});


app.controller('CourseDetailCtrl', function($scope, $location, $routeParams, $anchorScroll, Page) {
    Page.setTitle('Blue Wild - Scuba Courses');

    var course_id = $routeParams.course_id;
    console.log('--> [CourseDetailCtrl] course_id: ' + course_id);

    if(course_id) {
        var elem =  $('#' + course_id);
        var pos = elem.position();
        $("body").animate({scrollTop: pos.top}, "slow");
    }

    $scope.status = 'ready';
});

app.controller('AboutUsCtrl', function($scope, $location, Page) {
    Page.setTitle('Blue Wild - About Us');
    console.log('--> [AboutUsCtrl]');

    $scope.status = 'ready';
});

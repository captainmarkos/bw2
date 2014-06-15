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
    var title = 'blue wild scuba: diving and courses';
    return {
        title: function() { return title; },
        set_title: function(new_title) { title = new_title; }
    };
});

app.controller('MainCtrl', function($scope, $location, $anchorScroll, Page) {
    $scope.Page = Page;
    Page.set_title('blue wild scuba: diving and courses');

    // NOTE: For snapshots, flag used in the DOM that lets phantomjs
    // headless browser know that it's ready to create a snapshot.
    $scope.status = 'ready';
});

app.controller('CoursesCtrl', function($scope, $location, $routeParams, Page) {
    Page.set_title('blue wild scuba: courses');
    $scope.status = 'ready';
});

app.controller('CourseDetailCtrl', function($scope, $location, $routeParams, $anchorScroll, Page) {
    Page.set_title('blue wild scuba: courses');

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
    Page.set_title('blue wild scuba: about');
    console.log('--> [AboutUsCtrl]');

    $scope.status = 'ready';
});

(function () {
  'use strict';
/* App Module */

  var jaduApp = angular.module('jaduApp',[
    'ngRoute',
    'jaduControllers',
    'jaduServices'
  ]);

  jaduApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider
        .when('/view', {
          templateUrl: 'partials/viewer.html',
          controller: 'RssListCtrl'
        })
        .otherwise({
          redirectTo: '/view'
        });
  }]);

}());

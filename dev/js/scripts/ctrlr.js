(function () {
  'use strict';

  var jaduControllers = angular.module('jaduControllers',[]);

  jaduControllers.controller('RssListCtrl',[
    '$scope',
    'RssFeed',
    function($scope,RssFeed){
      $scope.test = "hello";

      $scope.feeds = RssFeed.query();
    }
  ]);

  jaduControllers.controller('RssAddCtrl',[
    '$scope',
    'RssFeed',
    function($scope,RssFeed){
      $scope.test = "hello";

      $scope.feeds = RssFeed.query();
    }
  ]);
}());

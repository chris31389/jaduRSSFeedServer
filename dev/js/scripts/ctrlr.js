(function () {
  'use strict';

  var jaduControllers = angular.module('jaduControllers',[]);

  jaduControllers.controller('RssListCtrl',[
    '$scope',
    'RssFeed',
    function($scope,RssFeed){
      $scope.test = "hello";

      $scope.feeds = RssFeed.query();

      $scope.addFeed = function(url){
        var encodedUrl = encodeURIComponent(url);
        var newFeed = { url: encodedUrl};
        RssFeed.save(newFeed,function(data){
          if(data.error){
            $scope.test = data;
            return;
          }

          $scope.feeds = RssFeed.query();
        });

      };

    }
  ]);

}());

(function () {
  'use strict';

  var jaduControllers = angular.module('jaduControllers',[]);

  jaduControllers.controller('RssListCtrl',[
    '$scope',
    'RssFeed',
    function($scope,RssFeed){

      var isInt = function(value) {
        return !isNaN(value) && parseInt(Number(value)) === value && !isNaN(parseInt(value, 10));
      };

      $scope.items = [];
      $scope.error = false;

      $scope.feeds = RssFeed.query();

      $scope.clearFeeds = function(){
        RssFeed.delete(function(data){
          $scope.rssUrl = '';
          $scope.feeds = RssFeed.query();
        });
      };

      $scope.addFeed = function(url){
        $scope.error = false;
        var encodedUrl = encodeURIComponent(url);
        var newFeed = { url: encodedUrl};
        RssFeed.save(newFeed,function(data){
          if(data.error){
            $scope.error = true;
            $scope.test = data;
            return;
          }
          $scope.rssUrl = '';
          $scope.feeds = RssFeed.query();
        });

      };

      $scope.showFeed = function(id){
        // protecting against SQL INJECTION
        if (isInt(id)){
          var item = RssFeed.get({ 'id' : id });
          $scope.items = item;
        }
        else{
          $scope.items = "";
        }
      };
    }
  ]);

}());

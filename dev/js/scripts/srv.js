(function () {
  'use strict';

  var jaduServices = angular.module('jaduServices',['ngResource']);

  jaduServices.factory('RssFeed',[
    '$resource',
    function($resource){
      return $resource('/server/rssFeed.php/',{},{
        query: {method: 'GET', isArray: true},
        get: {method: 'GET', params: {id:'id=@id'}, isArray: true},
        save: {method: 'POST'},
        delete: {method:'DELETE'}
      });
    }
  ]);

}());
(function () {
  'use strict';
/* App Module */

  var jaduApp = angular.module('jaduApp',[
    'jaduControllers',
    'jaduServices'
  ]);

  jaduApp.filter("sanitize", ['$sce', function($sce) {
    return function(htmlCode){
      return $sce.trustAsHtml(htmlCode);
    };
  }]);
}());

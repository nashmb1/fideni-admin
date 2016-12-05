/**
 * Created by nhmayaou on 05/12/16.
 */
'use strict';
myApp.controller('MainController', function ($scope, httpService) {

    
    $scope.value = httpService.get('aa');
});

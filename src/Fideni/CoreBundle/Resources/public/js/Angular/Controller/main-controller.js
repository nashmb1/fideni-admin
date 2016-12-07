/**
 * Created by nhmayaou on 05/12/16.
 */
'use strict';
myApp.controller('MainController', function ($scope, httpService, ApiUrl) {

    
    // $scope.value = httpService.get('aa');

    $scope.statistics = {};

    httpService.get(ApiUrl.ajax_global_stats, function ($data) {
        console.log($data);
        $scope.statistics  = $data;
    });
});

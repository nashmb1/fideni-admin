/**
 * Created by nhmayaou on 05/12/16.
 */
'use strict';
myApp.controller('MainController', function ($scope, httpService, ApiUrl) {

    
    // $scope.value = httpService.get('aa');

    $scope.statistics = {};
    $scope.partners = {};

    httpService.get(ApiUrl.ajax_global_stats, function ($data) {
        console.log($data);
        $scope.statistics  = $data;
    });


    httpService.get(ApiUrl.ajax_get_all_users, function ($data) {
        console.log($data);
        $scope.partners  = $data;
    });


});

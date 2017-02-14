/**
 * Created by nhmayaou on 05/12/16.
 */
'use strict';
myApp.controller('MainController', function ($scope, httpService, ApiUrl) {

    
    // $scope.value = httpService.get('aa');

    $scope.statistics = {};
    $scope.fideni = {};
    $scope.partners = {};

    $scope.hideStats = true;

    httpService.get(ApiUrl.ajax_global_stats, function ($data) {
        //console.log($data);
        $scope.fideni  = $data;
    });


    httpService.get(ApiUrl.ajax_get_all_users, function ($data) {
        //console.log($data);
        $scope.partners  = $data;
    });

    $scope.showGlobalInfo = function(){
        console.log('clicncnncc',$scope.hideStats);
        $scope.hideStats = false;
    }

});

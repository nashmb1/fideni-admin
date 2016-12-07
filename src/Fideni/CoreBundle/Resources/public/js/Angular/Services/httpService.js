/**
 * Created by nhmayaou on 05/12/16.
 */
'use strict';

myApp.service('httpService', function ($http) {
    
    this.get = function ($url, $success, $error) {
        return $http(
            {
                method: 'GET',
                url: $url,
                headers: {'Content-Type': 'application/json'}
            })
            .success(function ($data) {
                $success($data);
            })
            .error(function ($data) {
                $error($data);
            })
    }
});

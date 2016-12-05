/**
 * Created by nhmayaou on 05/12/16.
 */
'use strict';

myApp.service('httpService', function ($http) {

    this.get = function ($url) {
        console.log('in');
        return 58;
        // return $http.get($url);
    }
});

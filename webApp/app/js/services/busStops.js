'use strict';

var busStopsServices = angular.module('busStopsServices', ['ngResource']);
busStopsServices.factory('BusStopsList', ['$resource',
    function ($resource) {
        return $resource('/WhenBusArrives/api/web/app_dev.php/bus_stop/all.json', {}, {
            query: {method: 'GET', isArray: true}
        });
    }]);
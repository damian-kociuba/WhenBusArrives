'use strict';

var arrivalsServices = angular.module('arrivalsServices', ['ngResource']);
arrivalsServices.factory('NearestArrivalsList', ['$resource',
    function ($resource) {
        return $resource('/WhenBusArrives/api/web/app_dev.php/arrivals/:busStopId/nearest.json', {}, {
            query: {method: 'GET', params:{busStopId:'busStopId'}, isArray: true}
        });
    }]);
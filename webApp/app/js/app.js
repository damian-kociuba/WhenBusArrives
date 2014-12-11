'use strict';

var whenBusArrivesApp = angular.module('whenBusArrivesApp', [
    'ngRoute',
    'busStopsServices',
    'arrivalsServices'
]);

whenBusArrivesApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.when('/bus_stop/:busStopId', {
            templateUrl: 'views/nearest_arrivals.html',
            controller: 'BusStopCtrl'
        });
    }]
);

whenBusArrivesApp.controller('BusStopCtrl', ['$scope', 'BusStopsList',
    function ($scope, BusStopsList) {
        $scope.busStopFilter = '';
        $scope.busStops = BusStopsList.query();
    }]);

whenBusArrivesApp.controller('ArrivalsFromBusStopCtrl', ['$scope', '$routeParams', 'NearestArrivalsList',
    function ($scope, $routeParams, NearestArrivalsList) {
        $scope.getCurrentTime = function() {
            var currentdate = new Date(); 
            var time = currentdate.getHours() + ":"  
                            + currentdate.getMinutes();
            return currentdate;
        };
        $scope.arrivals = NearestArrivalsList.query({busStopId: $routeParams.busStopId});
    }]);

whenBusArrivesApp.directive('timerToDate', ['$interval', 'dateFilter', function ($interval, dateFilter) {
        return {
            restrict: 'E',
            scope: {
                deathLine: '='
            },
            link: function (scope, element, attrs) {
                var timeoutId;
                
                function updateTime() {
                    //element.text(dateFilter(new Date()));
                    var timeParts = scope.deathLine.split(':');
                    var deathLine = new Date();
                    deathLine.setHours(timeParts[0]);
                    deathLine.setMinutes(timeParts[1]);
                    deathLine.setSeconds(0);
                    var currentDate = new Date();
                    //console.log(scope.deathLine);
                    var diff = deathLine - currentDate;
                    
                        element.text(dateFilter(diff, 'mm:ss'));
                    
                }
                element.on('$destroy', function () {
                    $interval.cancel(timeoutId);
                });

                // start the UI update process; save the timeoutId for canceling
                timeoutId = $interval(function () {
                    updateTime(); // update DOM
                }, 1000);
            }
        };
    }]);


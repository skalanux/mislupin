'use strict';


angular.module('busquedaApp', [
  'ngRoute',
  'busquedaApp.filters',
  'busquedaApp.services',
  'busquedaApp.directives',
  'busquedaApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/busqueda-historietas', {templateUrl: 'partials/busqueda_historietas.html', controller: 'BusquedaHistorietasCtrl'});
  $routeProvider.when('/busqueda-planitos', {templateUrl: 'partials/busqueda_planitos.html', controller: 'BusquedaPlanitosCtrl'});
  $routeProvider.otherwise({redirectTo: '/busqueda-planitos'});
}]);

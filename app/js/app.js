'use strict';


angular.module('busquedaApp', [
  'ngRoute',
  'busquedaApp.filters',
  'busquedaApp.services',
  'busquedaApp.directives',
  'busquedaApp.controllers'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/inicio', {templateUrl: 'partials/inicio.html', controller: 'InicioCtrl'});
  $routeProvider.when('/busqueda-historietas', {templateUrl: 'partials/busqueda_historietas.html', controller: 'BusquedaHistorietasCtrl'});
  $routeProvider.when('/busqueda-planitos', {templateUrl: 'partials/busqueda_planitos.html', controller: 'BusquedaPlanitosCtrl'});
  $routeProvider.when('/micoleccion', {templateUrl: 'partials/micoleccion.html', controller: 'MiColeccionCtrl'});
  $routeProvider.when('/otrascolecciones', {templateUrl: 'partials/otrascolecciones.html', controller: 'OtrasColeccionesCtrl'});
  $routeProvider.otherwise({redirectTo: '/busqueda-planitos'});
}]);

'use strict';

/* Controllers */

angular.module('busquedaApp.controllers', []);

angular.module('busquedaApp.controllers').controller('BusquedaPlanitosCtrl', ['$scope', function($scope) {
$scope.planitos = [
{'descripcion': 'Dibujos Animados - Gordi saltando la soga',
'numero': '123'},
{'descripcion': 'Un receptor muy simple',
'numero': '201'},
{'descripcion': 'Una radito experimental',
'numero': '134'}
];


}]);

angular.module('busquedaApp.controllers').controller('BusquedaHistorietasCtrl', ['$scope', function($scope) {

$scope.planitos = [
{'descripcion': 'Dibujos Animados - Gordi saltando la soga',
'numero': '123'},
{'descripcion': 'Un receptor muy simple',
'numero': '201'},
{'descripcion': 'Una radito experimental',
'numero': '134'}
];


}]);


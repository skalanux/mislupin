'use strict';

/* Controllers */

angular.module('busquedaApp.controllers', []);

angular.module('busquedaApp.controllers').controller('InicioCtrl', ['$scope', function($scope) {

}]);

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

var historietas = [
{'nombre': 'Problemas en el cosmodromo',
'numero': '145',
 'personaje': 'Bicho y gordi' },
{'nombre': 'Hombres de marte',
'numero': '345',
 'personaje': 'Resorte y el profe'
},
{'nombre': 'El resupermercado',
'numero': '294',
 'personaje': 'Bicho y gordi' },
{'nombre': 'Probando el patasmovil',
'numero': '245',
 'personaje': 'Resorte y el profe'
},
{'nombre': 'Mudanzas conflictivas',
'numero': '443',
 'personaje': 'Bicho y gordi' },
{'nombre': 'Robotina',
'numero': '145',
 'personaje': 'Resorte y el profe'
}

];

$scope.historietas = historietas.splice(0,5);

}]);
angular.module('busquedaApp.controllers').controller('MiColeccionCtrl', ['$scope', function($scope) {

}]);
angular.module('busquedaApp.controllers').controller('OtrasColeccionesCtrl', ['$scope', function($scope) {

}]);


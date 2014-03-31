'use strict';

/* jasmine specs for controllers go here */

describe('controllers', function(){
  beforeEach(module('busqueda.controllers'));


  it('should ....', inject(function($controller) {
    //spec body
    var myCtrl1 = $controller('BusquedaHistorietas');
    expect(myCtrl1).toBeDefined();
  }));

  it('should ....', inject(function($controller) {
    //spec body
    var myCtrl2 = $controller('BusquedaPlanitos');
    expect(myCtrl2).toBeDefined();
  }));
});

'use strict';

/* https://github.com/angular/protractor/blob/master/docs/getting-started.md */

describe('busqueda app', function() {

  browser.get('index.html');

  it('should automatically redirect to /busqueda-planitos when location hash/fragment is empty', function() {
    expect(browser.getLocationAbsUrl()).toMatch("/busqueda-planitos");
  });


  describe('busqueda-planitos', function() {

    beforeEach(function() {
      browser.get('index.html#/busqueda-planitos');
    });


    it('should render busqueda-planitos when user navigates to /busqueda-planitos', function() {
      expect(element.all(by.css('[ng-view] p')).first().getText()).
        toMatch(/partial for view 1/);
    });

  });

  describe('busqueda-historietas', function() {

    beforeEach(function() {
      browser.get('index.html#/busqueda-historietas');
    });


    it('should render busqueda-historietas when user navigates to /busqueda-historietas', function() {
      expect(element.all(by.css('[ng-view] p')).first().getText()).
        toMatch(/partial for view 1/);
    });

  });

});

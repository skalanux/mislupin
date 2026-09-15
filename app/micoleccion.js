function saveColec(idcolecc){
//Primero tiene que recorrer la coleccion entera para buscar 
    var data = Array();
    var states = Array();
    states['state_faltante'] = 1;
    states['state_existe'] = 2;
    states['state_repetida'] = 3;
    
    for (i=1;i<500;i++){
        //Celda a escribir
        idtd = "id_"+i;
        idtd = $(idtd);
        //la posicion 0 n se pasa     
        data.push({numero: i, estado: states[idtd.className], detalle: '' });
    
    }

          var url = "ajax_guardar_colec.php";
          var ajax = new Ajax.Request( url, {
                                          parameters: 'id_colecconista='+idcolecc+'&data='+Object.toJSON(data), 
                                          method:"post",
                                          onComplete: finished 
                                          }
          );
    

}

function finished(){
    
    alert("Tu coleccion se ha actualizado con exito");

}

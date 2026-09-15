function shiftState(state){
    if (state=="state_faltante")
        return "state_existe";
    else if (state=="state_existe")
        return "state_repetida";
    else if (state=="state_repetida")
        return "state_faltante";

}

function shiftRow(state, inivalue_id, finvalue_id){
    
    inivalue = inivalue_id.split("_")[1];
    finvalue = parseInt(finvalue_id.split("_")[1])+1;
   
    if (state==0)
        rowClassName = "state_faltante";
    else if (state==1)
        rowClassName = "state_existe";
    else
        rowClassName = "state_repetida";


    for (i=inivalue;i<finvalue;i++){
        idtd = "id_"+i;

        $(idtd).className=rowClassName;
        }

}

for (h=1966;h<2008;h++){
    //Celda a escribir
    idtd = "rid_"+h;
    idtd = $(idtd);
    idtr = "tr_"+h;
    idtr = $(idtr);

    //Saco los hijos con esto
    //var paras = $A((idtr).getElementsByTagName('id'));

    var paras = idtr.childElements();
    (idtr.id == "tr_1966")? startid=2:startid=1;

    inivalue = paras[startid].id;
    finvalue = (paras[paras.length-1].id);
    
    content ="<span>"+h+":</span>&nbsp;";
    content += "<span class='state_faltante' onclick='shiftRow(0,"+"\""+inivalue+"\","+"\""+finvalue+"\");'>&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;";
    content += "<span class='state_existe' onclick='shiftRow(1,"+"\""+inivalue+"\","+"\""+finvalue+"\");'>&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;";
    content += "<span class='state_repetida' onclick='shiftRow(2,"+"\""+inivalue+"\","+"\""+finvalue+"\");'>&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;";
    idtd.innerHTML=content;
    //que la celda no sea seleccionable
    idtd.style.cursor="default";
}


for (i=1;i<500;i++){
    idtd = "id_"+i;
    idtd = $(idtd);
    idtd.innerHTML="<b>"+i+"</b>";
    //que la celda no sea seleccionable
    idtd.style.cursor="default";

    idtd.style.height="40px";

    if ((i>1)&&( i<10))
        idtd.style.width="20px";
    else
        idtd.style.width="40px";
    
    idtd.onclick=function(){
            idtd = $(this);
            idtd.className=shiftState(idtd.className);
    }

}



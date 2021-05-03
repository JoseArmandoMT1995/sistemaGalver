function talonCantidad(cu,cv){
    
    var r;
    switch (cu) {
        case 1:
            //bulto = 50 kl
            r = (cv * 50);
          break;
        case 2:
            r = "operacion pendiente";
          break;
        case 3:
            //super bulto = 1.5 toneladas o 1500 kilos
            r = (cv * 1500);
          break;
        case 4:
            cv = cv.toString();
            if (cv.indexOf(".") === -1) {
                r = "usted puso "+cv+" numero de tarimas";
            } else {
                r = "'usted no puede poner punto decimal'";
            }            
          break;
        //default:
        //break;
      }
    return r; 
}
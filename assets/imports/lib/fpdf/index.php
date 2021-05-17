<?php
    //-----------------------------------------------------------------------------------
    //    Ejemplo básico de utilización de fPDF
    //-----------------------------------------------------------------------------------
    require('fpdf/fpdf.php');

    $pdf=new FPDF();
    $pdf->AddPage();
    //CABECERA
    //logo
    $pdf->SetFont('Arial','',6);
    $pdf->Image('GalverLogisticaLogo.png',15 ,10,-150);
    //$pdf->Cell(48 ,18,'',1,1,'C');$pdf->SetX(40);
    $pdf->SetXY(15,27);
    $pdf->Cell(40 ,5,'SERVICIO PUBLICO FEDERAL',0,1,'C');$pdf->SetX(40);

    //titulares
    $pdf->SetFont('Arial','B',8); 
    $pdf->SetXY(40,10);
    $pdf->Cell(130 ,5,'GALVER LOGISTICA,S. DE R.L DE R.L DE C.V',0,1,'C');$pdf->SetX(40);
    $pdf->SetFont('Arial','',7);
    $pdf->Cell(130 ,3,'SAN RAFAEL S/N MZA. 4LTE. 17 COL. PARQUE INDUSTRIAL IXTAPALUCA',0,1,'C');$pdf->SetX(40);
    $pdf->Cell(130 ,3,'C.P..56535 IXTAPALUCA, EDO. DE MEX.',0,1,'C');$pdf->SetX(40);
    $pdf->Cell(130 ,3,'R.F.C. GLO140821KF6 TEL.:5751-1666',0,1,'C');$pdf->SetX(40);
    $pdf->Cell(130 ,3,'SERVICIO DE AUTOTRANSPORTE EN GENERAL',0,1,'C');$pdf->SetX(40);
    $pdf->Cell(130 ,3,'Local y Foraneo',0,1,'C');$pdf->SetX(40);
    //Numero Carta porte
    $pdf->SetFont('Arial','B',8); 
    $pdf->SetXY(160,10);
    $pdf->Cell(40 ,5,'CARTA PORTE',1,1,'C');$pdf->SetX(160);
    $pdf->Cell(40 ,15,'',1,1,'C');$pdf->SetXY(160,10);
    $pdf->SetFont('Arial','B',20); 
    $pdf->Cell(10 ,20,'C',0,0,'C');$pdf->SetX(170);
    $pdf->SetFont('Arial','I',15); 
    $pdf->SetTextColor(255, 87, 51);
    $pdf->Cell(30 ,20,'?????',0,0,'C');
    
    //LUGAR Y FECHA DE EXPEDICION
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial','',8); 
    $pdf->SetXY(10,32);
    $pdf->Cell(190,5,'',1,0);
    $pdf->SetY(32);
    $pdf->Cell(50,5,'LUGAR Y FECHA DE EXPEDICION',0,0);
    $pdf->Cell(50,5,'???',0,0);
    $pdf->Cell(5,5,'A',0,0);
    $pdf->Cell(25,5,'???',0,0);
    $pdf->Cell(5,5,'DE',0,0);
    $pdf->Cell(25,5,'???',0,0);
    $pdf->Cell(5,5,'DE',0,0);
    $pdf->Cell(25,5,'???',0,1);
    //EMISOR Y RECEPTOR CAJAS
    //EMISOR
    $pdf->SetXY(10,38);
    $pdf->Cell(94,52,'',1,0);
    $pdf->Cell(1,52,'',0,0);
    $pdf->Cell(95,52,'',1,1);
    $pdf->SetXY(10,38);
    $pdf->Cell(25,8,'SE RECOGE EN:',0,0);
    $pdf->Cell(70,8,'?',0,1);
    $pdf->Cell(25,8,'REMITENTE:',0,0);
    $pdf->Cell(70,8,'?',0,1);
    $pdf->Cell(25,8,'CP.:',0,0);
    $pdf->Cell(70,8,'?',0,1);
    $pdf->Cell(25,8,'R.F.C.:',0,0);
    $pdf->Cell(70,8,'?',0,1);
    $pdf->Cell(25,10,'DOMICILIO:',0,1);
    $pdf->Cell(95,10,'?',0,1);
    
    //RECEPTOR
    $pdf->SetXY(105,38);
    $pdf->Cell(25,8,'SE ENTREGA EN:',0,0);
    $pdf->Cell(70,8,'?',0,1);$pdf->SetX(105);
    $pdf->Cell(25,8,'DESTINATARIO:',0,0);
    $pdf->Cell(70,8,'?',0,1);$pdf->SetX(105);
    $pdf->Cell(25,8,'CP.:',0,0);
    $pdf->Cell(70,8,'?',0,1);$pdf->SetX(105);
    $pdf->Cell(25,8,'R.F.C.:',0,0);
    $pdf->Cell(70,8,'?',0,1);$pdf->SetX(105);
    $pdf->Cell(25,10,'DOMICILIO:',0,1);$pdf->SetX(105);
    $pdf->Cell(95,10,'?',0,1);
    //VALOR UNITARIO
    $pdf->SetFont('Arial','',6); 

    //$pdf->SetXY(10,91);
    //$pdf->Cell(190,10,'',1,1);
    $pdf->SetXY(10,91);
    $pdf->Cell(60,10,'',1,1);
    $pdf->SetXY(10,91);
    $pdf->Cell(32,3,'VALOR UNITARIO',0,1);
    $pdf->Cell(32,3,'CONVENIDA POR TONELADA',0,1);
    $pdf->Cell(32,3,'O CARGA FRACCIONADA',0,1);
    $pdf->SetXY(42,91);
    $pdf->Cell(28,10,'???',0,1);
    $pdf->SetXY(71,91);
    $pdf->Cell(60,10,'VALOR DECLARADO',1,1);
    $pdf->SetXY(95,91);
    $pdf->Cell(36,10,'???',0,1);
    $pdf->SetXY(132,91);
    $pdf->Cell(68,10,'CONDICION DE PAGO',1,1);
    $pdf->SetXY(156,91);
    $pdf->Cell(44,10,'???',0,1);
    //BULTOS
    $pdf->SetXY(10,102);
    $pdf->Cell(149,10,'',1,1);
    $pdf->Cell(149,100,'',1,1);
    $pdf->SetXY(10,102);
    $pdf->Cell(40,10,'',1,1);
    $pdf->Cell(40,100,'',1,1);
    $pdf->SetXY(10,102);
    $pdf->Cell(40,3,'BULTOS',1,1,'C');
    $pdf->Cell(20,7,'NUMERO',1,0,'C');
    $pdf->Cell(20,7,'EMBARQUE',1,1,'C');
    $pdf->SetXY(10,112);
    $pdf->Cell(20,100,'',1,0,'C');//NUMERO
    $pdf->SetXY(10,200);
    $pdf->Cell(20,10,'OTROS:',0,1);//EMBARQUE
    //QUE EL REMITENTE DICE QUE CONTIENE
    $pdf->SetXY(50,102);
    $pdf->Cell(70,10,'BULTOS',1,0,'C');
    $pdf->Cell(9,10,'PESO',1,0,'C');
    $pdf->Cell(30,4,'VOLUMEN',1,1,'C');
    $pdf->SetXY(129,106);
    $pdf->Cell(15,6,'M^3',1,0,'C');
    $pdf->Cell(15,3,'PESO',0,1,'C');
    $pdf->SetXY(144,109);
    $pdf->Cell(15,3,'ESRIMADO',0,1,'C');
    //$pdf->Cell(40,10,'222',1,1);
    $pdf->SetXY(50,112);//SECCION DE BULTOS
    $pdf->Cell(70,100,'',1,0,'C');
    $pdf->Cell(9,100,'',1,0,'C');
    $pdf->Cell(15,100,'',1,0,'C');
    $pdf->Cell(15,100,'',1,1,'C');
    

    $pdf->SetXY(160,102);
    $pdf->Cell(20,10,'CONCEPTO:',1,0,'C');
    $pdf->Cell(20,10,'?',1,1);$pdf->SetX(160);
    
    $pdf->Cell(20,20,'FLETE:',1,0,'C');
    $pdf->Cell(20,20,'?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,20,'',1,1,'C');
    $pdf->SetXY(160,132);
    $pdf->Cell(20,10,'CARGO POR',0,1,'C');$pdf->SetX(160);
    $pdf->Cell(20,5,'SEGURO',0,1,'C');
    $pdf->SetXY(180,132);
    $pdf->Cell(20,20,'2?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,10,'AUTOPISTAS:',1,0,'C');
    $pdf->Cell(20,10,'?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,51,'',1,0,'C');
    $pdf->Cell(20,51,'?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,10,'SUB- TOTAL:',1,0,'C');
    $pdf->Cell(20,10,'?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,10,'I.V.A. $:',1,0,'C');
    $pdf->Cell(20,10,'?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,10,'RETENCION I.V.A:',1,0,'C');
    $pdf->Cell(20,10,'?',1,1);$pdf->SetX(160);
    $pdf->Cell(20,10,'TOTAL:',1,0,'C');
    $pdf->Cell(20,10,'?',1,1);$pdf->SetX(160);
    $pdf->SetXY(160,162);
    $pdf->SetFont('Arial','',5); 
    $pdf->Cell(20,10,'MANIOBRAS:',0,1,'C');$pdf->SetX(160);
    $pdf->Cell(20,10,'LIBRAMIENTOS:',0,1,'C');$pdf->SetX(160);
    $pdf->Cell(20,10,'TRANSBORDADORES:',0,1,'C');$pdf->SetX(160);
    $pdf->Cell(20,10,'OTROS:',0,1,'C');$pdf->SetX(160);
    $pdf->SetFont('Arial','',6); 
    //QR
    $pdf->SetXY(10,213);
    
    $pdf->Cell(40,40,'',1,1);
    $pdf->SetXY(51,213);
    $pdf->Cell(108,40,'',1,1);
    $pdf->SetXY(51,213);
    $pdf->Cell(108,10,':',1,1);
    $pdf->SetXY(51,213);
    $pdf->Cell(54,10,'REENBARCO:',0,0); $pdf->Cell(54,10,'REEMBARCARCE CON:',0,1);$pdf->SetX(51);

    $pdf->Cell(54,10,'CONDUJO:',0,0); $pdf->Cell(54,10,'CONDUCIRA:',0,1);$pdf->SetX(51);
    $pdf->Cell(54,10,'PLACAS:',0,0); $pdf->Cell(54,10,'DE:',0,1);$pdf->SetX(51);
    $pdf->Cell(108,10,'IMPORTE CON LETRA:',1,1); 

    $pdf->SetXY(10,254);
    $pdf->SetFont('Arial','',7); 
    $pdf->Cell(40,3,'idCIF:',0,1,'C');
    $pdf->Cell(40,3,'14100060159',0,1,'C');
    $pdf->Cell(40,3,'SE IMPRIMIERON LA',0,1,'C');
    $pdf->Cell(40,3,'CANTIDAD DE 2 000 JGOS.',0,1,'C');
    $pdf->Cell(40,3,'CON FOLIO DEL 28 001 AL 30 000',0,1,'C');
    $pdf->Cell(40,3,'SERIE °C CON FECHA',0,1,'C');
    $pdf->Cell(40,3,'02/12/2021',0,1,'C');
    $pdf->Image('QR.jpg',12,214,-700);
    $pdf->SetXY(51,254);
    $pdf->Cell(40,18,'',1,0,'C');$pdf->SetXY(92,254);
    $pdf->Cell(40,18,'',1,0,'C');$pdf->SetXY(133,254);
    $pdf->Cell(67,18,'',1,1,'C');$pdf->SetX(90);
    $pdf->Cell(67,4,'IMPUESTO RETENIDO DE CONFORMIDAD CON LA LEY DEL IMPUESTO AL VALOR AGREGADO',0,1,'C');$pdf->SetX(51);
    $pdf->SetXY(51,254);
    $pdf->Cell(40,3,'DOCUMENTO',0,0,'C');$pdf->SetXY(92,254);
    $pdf->Cell(40,3,'RECIBI DE CONFORMIDAD',0,0,'C');$pdf->SetXY(92,269);
    $pdf->Cell(40,3,'RECIBI DE DESTINATARIO',0,0,'C');
    $pdf->SetXY(133,254);
    $pdf->Cell(67,3,'OBSERVACIONES:',0,0,'C');
    $pdf->Output();
 ?>
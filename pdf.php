<?php
	date_default_timezone_set('America/Mexico_City');

	$date = getdate();
	$fecha = $date['mday']." de ";
	if($date['mon'] == 1){
		$fecha = $fecha."Enero de ";
	}else if($date['mon'] == 2){
		$fecha = $fecha."Febrero de ";
	}else if($date['mon'] == 3){
		$fecha = $fecha."Marzo de ";
	}else if($date['mon'] == 4){
		$fecha = $fecha."Abril de ";
	}else if($date['mon'] == 5){
		$fecha = $fecha."Mayo de ";
	}else if($date['mon'] == 6){
		$fecha = $fecha."Junio de ";
	}else if($date['mon'] == 7){
		$fecha = $fecha."Julio de ";
	}else if($date['mon'] == 8){
		$fecha = $fecha."Agosto de ";
	}else if($date['mon'] == 9){
		$fecha = $fecha."Septiembre de ";
	}else if($date['mon'] == 10){
		$fecha = $fecha."Octubre de ";
	}else if($date['mon'] == 11){
		$fecha = $fecha."Noviembre de ";
	}else if($date['mon'] == 12){
		$fecha = $fecha."Diciembre de ";
	}
	$fecha = $fecha.$date['year'];

	if(isset($_POST['customer'])){
		$customer = $_POST['customer'];
	}else{
		$customer = "";
	}
	if(isset($_POST['attention'])){
		$attention = $_POST['attention'];
	}else{
		$attention = "";
	}
	if(isset($_POST['attends'])){
		$attends = $_POST['attends'];
	}else{
		$attends = "";
	}
	if(isset($_POST['project'])){
		$project = $_POST['project'];
	}else{
		$project = "";
	}
	if(isset($_POST['project-description'])){
		$projectDescription = $_POST['project-description'];
	}else{
		$projectDescription = "";
	}

	//Productos
	if(isset($_POST['tablequantity'])){
		$tablequantity = $_POST['tablequantity'];
	}else{
		$tablequantity[0] = "";
	}
	if(isset($_POST['tabledescription'])){
		$tabledescription = $_POST['tabledescription'];
	}else{
		$tabledescription[0] = "";
	}
	if(isset($_POST['tableprice'])){
		$tableprice = $_POST['tableprice'];
	}else{
		$tableprice[0] = 0;
	}
	if(isset($_POST['tabletotalproduct'])){
		$tabletotalproduct = $_POST['tabletotalproduct'];
	}else{
		$tabletotalproduct[0] = 0;
	}

	if(isset($_POST['tableterms'])){
		$tableterms = $_POST['tableterms'];
	}else{
		$tableterms = null;
	}

	require('pdf/fpdf.php');

	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
		    // Logo
		    $this->Image('images/logo.png',10,8);
		    // Salto de línea
		    $this->Ln(25);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Movernos a la derecha
		    //$this->Cell(80);
		    $this->HeaderTable();
		    // Salto de línea
		    $this->Ln(5);
		}

		// Colored table
		function HeaderTable()
		{
			global $fecha;
			global $customer;
			global $attention;
			global $attends;
			global $project;
			global $projectDescription;

		    // Colors, line width and bold font
		    $this->SetDrawColor(255,255,255);
		    $this->SetLineWidth(.2);
		    $this->SetFont('','',8);
		    // Header
		    $w = array(50, 140);
		    // Data
		    $fill = false;
		    $this->SetFillColor(132,132,132);
		    $this->SetTextColor(255);
	        $this->Cell($w[0],6,utf8_decode('Fecha:'),'LTRB',0,'L',true);
		    $this->SetFillColor(204,204,204);
		    $this->SetTextColor(0);
	        $this->Cell($w[1],6,utf8_decode($fecha),'LTRB',0,'L',true);
	        $this->Ln();

		    $this->SetFillColor(132,132,132);
		    $this->SetTextColor(255);
	        $this->Cell($w[0],6,utf8_decode('Cliente:'),'LTRB',0,'L',true);
		    $this->SetFillColor(204,204,204);
		    $this->SetTextColor(0);
		    $this->SetFont('','B',8);
	        $this->Cell($w[1],6,utf8_decode($customer),'LTRB',0,'L',true);
	        $this->Ln();

		    $this->SetFillColor(132,132,132);
		    $this->SetTextColor(255);
		    $this->SetFont('','',8);
	        $this->Cell($w[0],6,utf8_decode('Descripción:'),'LTRB',0,'L',true);
		    $this->SetFillColor(204,204,204);
		    $this->SetTextColor(0);
	        $this->Cell($w[1],6,utf8_decode($projectDescription),'LTRB',0,'L',true);
	        $this->Ln();

		    $this->SetFillColor(132,132,132);
		    $this->SetTextColor(255);
	        $this->Cell($w[0],6,utf8_decode('Atención:'),'LTRB',0,'L',true);
		    $this->SetFillColor(204,204,204);
		    $this->SetTextColor(0);
	        $this->Cell($w[1],6,utf8_decode($attention),'LTRB',0,'L',true);
	        $this->Ln();

		    $this->SetFillColor(132,132,132);
		    $this->SetTextColor(255);
	        $this->Cell($w[0],6,utf8_decode('Atiende:'),'LTRB',0,'L',true);
		    $this->SetFillColor(204,204,204);
		    $this->SetTextColor(0);
	        $this->Cell($w[1],6,utf8_decode($attends),'LTRB',0,'L',true);
	        $this->Ln();
		    // Closing line
		    $this->Cell(array_sum($w),0,'','T');
	        $this->Ln();
		    $this->SetFont('','B',10);
			$this->Cell(0,10,utf8_decode($project),0,1,'C');
		}

		// Colored table
		function ContentTable()
		{
			global $tablequantity;
			global $tabledescription;
			global $tableprice;
			global $tabletotalproduct;

			$total = array_sum($tabletotalproduct);
			$total = number_format($total, 2, '.', ',');

		    // Colors, line width and bold font
		    $this->SetDrawColor(0,0,0);
		    $this->SetLineWidth(0);
		    $this->SetFont('','B',9);
		    // Header
		    $w = array(20, 110, 30, 30);
		    // Data
		    $fill = false;
		    $this->SetFillColor(255,255,255);
		    $this->SetTextColor(0);
	        $this->Cell($w[0],6,utf8_decode('Cantidad'),'',0,'L',true);
	        $this->Cell($w[1],6,utf8_decode('Descripción'),'',0,'L',true);
	        $this->Cell($w[2],6,utf8_decode('P. Unitario'),'',0,'R',true);
	        $this->Cell($w[3],6,utf8_decode('Costo'),'',0,'R',true);
	        $this->Ln(10);
		    $this->SetFont('','',8);
		    $this->SetFillColor(255,255,255);
		    $this->SetTextColor(0);
		    //for($i=0; $i<count($tablequantity); $i++){
		    for($i=0; $i<count($tablequantity); $i++){
		        $this->Cell($w[0],6,utf8_decode($tablequantity[$i]),'',0,'C',true);

		        $y = $this->GetY();
				$this->MultiCell($w[1],4,utf8_decode($tabledescription[$i]),'','L',true);
				$y2 = $this->GetY();
				$this->SetXY(140,$y);

		        $this->Cell($w[2],6,number_format($tableprice[$i], 2, '.', ','),'',0,'R',true);
		        $this->Cell($w[3],6,number_format($tabletotalproduct[$i], 2, '.', ','),'',0,'R',true);

		        $space = (isset($y2) ? $y2-$y : 0) + 2;
				$this->Ln($space);
	        	
		    }
	        $this->Cell($w[0],6,'','',0,'C',true);
	        $this->Cell($w[1],6,'','',0,'L',true);
		    $this->SetFont('','B',8);
	        $this->Cell($w[2],6,utf8_decode('Total:'),'',0,'R',true);
	        $this->Cell($w[3],6,number_format(array_sum($tabletotalproduct), 2, '.', ','),'',0,'R',true);
	        $this->Ln();
		}

		// Pie de página
		function Footer()
		{
			global $tableterms;
		    // Posición: a 1,5 cm del final
		    if($tableterms != null){
		    	$filas = count($tableterms);
		    	$position = ($filas * 4) + 35;
		    	$this->SetY(-$position);
		    }else{
		    	$this->SetY(-35);
		    }
	        
	        // Content
	        $y = $this->GetY();
		    $this->SetFont('','B',8);
			$this->MultiCell(140,4,utf8_decode('Términos y Condiciones'),'','L',true);
			$this->Ln();
		    $this->SetFont('','',5);
			$this->MultiCell(140,4,utf8_decode('Los precios NO incluyen IVA'),'','L',true);
			$this->MultiCell(140,4,utf8_decode('Precios sujetos a cambio sin previo aviso'),'','L',true);
			if(isset($tableterms)){
				for($i=0; $i<count($tableterms); $i++){
					$this->MultiCell(140,4,utf8_decode($tableterms[$i]),'','L',true);
				}
			}
			$y2 = $this->GetY();

		    $this->SetFont('','B',8);

			$this->SetXY(150,$y);
	        $y = $this->GetY()+4;
			$this->MultiCell(50,4,utf8_decode('ISC RICARDO ZUMARÁN'),'','R',true);
			$this->SetXY(150,$y);
	        $y = $this->GetY()+4;
			$this->MultiCell(50,4,utf8_decode('OF 67189908/09'),'','R',true);
			$this->SetXY(150,$y);
	        $y = $this->GetY()+4;
			$this->MultiCell(50,4,utf8_decode('CEL 5522725353'),'','R',true);

			$space = (isset($y2) ? $y2-$y : 0)-2;
			$this->Ln($space);
		    
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Número de página
		    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	if($tableterms != null){
    	$filas = count($tableterms);
    	$margin = ($filas * 4) + 35;
		$pdf->SetAutoPageBreak(true,$margin);
    }else{
    	$pdf->SetAutoPageBreak(true,35);
    }
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->ContentTable();
	$pdf->Output();
?>
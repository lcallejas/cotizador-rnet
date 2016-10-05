<?PHP

error_reporting(E_ALL ^ E_NOTICE);

require_once('fpdf.php'); 
require_once('fpdi.php'); 
$link_doc = "";

if ( !is_null($_GET['uname']) 
	&& !empty($_GET['uname']))
{
	$pdf = new FPDI();
	
	$pagecount = $pdf->setSourceFile('doc.pdf'); 
	$tplidx = $pdf->importPage(1, '/MediaBox'); 
		 
	$pdf->addPage(); 
	$pdf->useTemplate($tplidx, 0, 0, 0);
	
	
	$pdf->SetFont('Times', 'BU', '16');	
	$pdf->SetTextColor(0,0,0);
	$pdf->SetXY(49, 21);
	$pdf->Write(15, $_GET['uname'] );
	
		 
	$pdf->Output('doc_edition.pdf', 'D'); 
}


?> 

<html>
	<head>
		<title>
			Editor de PDF Ejemplo
		</title>
	</head>	
	<body>
		<p>
		Bajar documento <a href="doc.pdf">original</a>.
		</p>
		<form method="GET" action="">
			Nombre: <input type="text" name="uname" />
			<input type="submit" value="Descargar personalizado" />
		</form>
		<p>
		<h3>Referencias:</h3>
		<ul>
			<li>
				<a href="http://www.setasign.de/support/manuals/fpdi/introduction/">FPDI</a>
			</li>
			<li>
				<a href="http://www.fpdf.org/en/doc/">FPDF</a>
			</li>
			<li>
				Example <a href="http://stackoverflow.com/questions/7364/pdf-editing-in-php">(StackOverflow)</a>
			</li>
			
		</ul>
		</p>
		<p>
		Codigo completo:
		</br>
		<a href="codigo_pdf.zip">
			Aqui
		</a>
		</p>
		
	</body>
</html>
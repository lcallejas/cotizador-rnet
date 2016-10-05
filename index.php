<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>R-Net Systems S.A. de C.V. | Cotizador</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<nav class="navbar navbar-default">
	  	<div class="container-fluid">
	    	<!-- Brand and toggle get grouped for better mobile display -->
	    	<div class="navbar-header">
	      		<a class="navbar-brand" href="#"><img src="images/logo.png" style="max-height: 100%;" /></a>
	    	</div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    	</div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
    <div class="container">
		<form action="pdf.php" method="POST" target="_blank">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<div id="errors-my-form"></div>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<h2>Datos del proyecto</h2>
			  	<div class="form-group col-md-12">
			    	<label for="customer">Cliente</label>
			    	<input type="text" class="form-control" id="customer" name="customer" placeholder="Cliente">
			  	</div>
			  	<div class="form-group col-md-6">
			    	<label for="attention">Atención</label>
			    	<input type="text" class="form-control" id="attention" name="attention" placeholder="Atención">
			  	</div>
			  	<div class="form-group col-md-6">
			    	<label for="attends">Atiende</label>
			    	<input type="text" class="form-control" id="attends" name="attends" placeholder="Atiende">
			  	</div>
			  	<div class="form-group col-md-6">
			    	<label for="project">Proyecto</label>
			    	<input type="text" class="form-control" id="project" name="project" placeholder="Proyecto">
			  	</div>
			  	<div class="form-group col-md-6">
			    	<label for="project-description">Descripción del proyecto</label>
			    	<input type="text" class="form-control" id="project-description" name="project-description" placeholder="Descripción del proyecto">
			  	</div>
	    	</div>
	    	<hr>
	    	<div class="row">
	    		<h2>Productos</h2>
			  	<div class="form-group col-md-12">
			    	<label for="description">Descripción</label>
			    	<textarea class="form-control" rows="3" id="description" placeholder="Descripción"></textarea>
			  	</div>
			  	<div class="form-group col-md-6">
			    	<label for="quantity">Cantidad</label>
			    	<input type="number" class="form-control" id="quantity" placeholder="Cantidad">
			  	</div>
			  	<div class="form-group col-md-6">
			    	<label for="price">Precio Unitario</label>
			    	<input type="text" class="form-control" id="price" placeholder="Precio Unitario">
			  	</div>
			  	<div class="form-group col-md-12 text-right">
			  		<button type="button" class="btn btn-success" id="add-product">Agregar</button>
			  	</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-12">
					<div class="table-responsive">
						<table id="table-add-product" class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th class="text-center">Cantidad</th>
									<th class="text-center">Descripción</th>
									<th class="text-center">Precio Unitario</th>
									<th class="text-center">Total</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
							<tfoot>
								<tr>
									<th colspan="3" class="text-right">Subtotal</th>
									<th class="text-right" id="table-total"></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
	    		</div>
	    	</div>
	    	<hr>
	    	<div class="row">
	    		<h2>Términos y Condiciones</h2>
			  	<div class="form-group col-md-12">
			    	<label for="terms">Término o Condicion</label>
			    	<input type="text" class="form-control" id="terms" placeholder="Termino o Condicion">
			  	</div>
			  	<div class="form-group col-md-12 text-right">
			  		<button type="button" class="btn btn-success" id="add-terms">Agregar</button>
			  	</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-12">
					<div class="table-responsive">
						<table id="table-add-terms" class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th class="text-center">Termino o Condición</th>
									<th class="text-center">Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Los precios NO incluyen IVA.</td>
									<td></td>
								</tr>
								<tr>
									<td>Precios sujetos a cambio sin previo aviso</td>
									<td></td>
								</tr>

							</tbody>
						</table>
					</div>
	    		</div>
	    	</div>
	    	<hr>
	    	<div class="row">
	    		<div class="col-md-12 text-right">
	    			<button type="submit" class="btn btn-primary" id="pdf-create">Generar Cotización</button>
	    		</div>
	    	</div>
	    	<div class="row" style="margin-bottom: 75px;"></div>
		</form>
    </div>
	<nav class="navbar navbar-default navbar-fixed-bottom">
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-md-12 text-center">
	  				<p>Derechos Reservados R-Net Systems S.A. de C.V. 2016</p>
	  			</div>
	    	</div>
	  	</div>
	</nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Custom -->
    <script src="js/add-product.js"></script>
    <script src="js/add-terms.js"></script>
    <script src="js/pdf-create.js"></script>
  </body>
</html>
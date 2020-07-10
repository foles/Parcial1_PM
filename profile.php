<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academico';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT i.ci, i.nombre_completo, i.fecha_nac, i.residencia, i.color, i.foto FROM usuario u, identificador i WHERE u.id = ? AND u.ci = i.ci');$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($ci, $nombre, $fecha, $residencia, $color, $foto);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<title>Main Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	</head>
	<body>
	
	<?php include('navbar.php');?>

		<div class="container-main d-flex justify-content-center p-3" style="background-color: <?=$color?>">

			<div class="card my-3 mb-5" style="max-width: 840px;">
			<div class="row no-gutters">
				<div class="col-md-4">
				<img src="<?=$foto?>" class="card-img" alt="...">
				</div>
				<div class="col-md-8">
				<div class="card-body">
					<h3 class="card-title text-center"> ¡ BIENVENIDO ! </h3>
			<div class="py-4">
			<form class="form-inline" action="updateColor.php" method="post">
			<dl class="row">
				<dt class="col-sm-6 text-center">USUARIO</dt>
				<dd class="col-sm-6 text-center"><?=$ci?></dd>

				<dt class="col-sm-6 text-center">NOMBRE</dt>
				<dd class="col-sm-6 text-center"> <?=$nombre?> </dd>

				<dt class="col-sm-6 text-center">C.I.</dt>
				<dd class="col-sm-6 text-center" ><?=$ci?></dd>

				<dt class="col-sm-6 text-center">FECHA DE NACIMIENTO </dt>
				<dd class="col-sm-6 text-center"><?=$fecha?></dd>

				<dt class="col-sm-6 text-center">LUGAR RESIDENCIA</dt>
				
				<?php
				if ($residencia == 1) {
					print("<dd class=\"col-sm-6 text-center\">La Paz</dd>");
				}
				if ($residencia == 2) {
					print("<dd class=\"col-sm-6 text-center\">Cochabamba</dd>");
				}
				if ($residencia == 3) {
					print("<dd class=\"col-sm-6 text-center\">Santa Cruz</dd>");
				}
				?>	
				
				<dt class="col-sm-6 text-center">USUARIO</dt>
				<dd class="col-sm-6 text-center" ><input type="text"  class="text-center"value="<?=$ci?>" name="ci" readonly ></dd>
				
				<dt class="col-sm-6 text-center">BACKGROUND COLOR</dt>
				<dd class="col-sm-6">
				
				<select class="custom-select my-1 mr-sm-2" name="color" id="inlineFormCustomSelectPref">
					<option selected>NINGUNO</option>
					<option value="rgba(204, 99, 0, 0.7)" style="background: #ff6702; color: #fff;">Naranja</option>
					<option value="rgba(8, 44, 102, 0.7)" style="background: #0012b4; color: #fff;">Azul</option>
					<option value="rgba(8, 102, 20, 0.7)" style="background: #007737; color: #fff;">Verde</option>
				</select>


				<button type="submit" class="btn btn-primary my-1">GUARDAR</button>
				</form>
				</dd>

				
			</dl>
						
				</div>
				
				</div>
			</div>
			</div>

		
			</div>
		</div>
		<?php include('footer.php');?>

	</body>
</html>
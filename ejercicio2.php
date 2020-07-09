<?php
session_start();
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

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Ejercicio 2</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	</head>
	<body>

	<?php include('navbar.php');?>

		<div class="container-main d-flex justify-content-center p-5" >
		<div class="container container-table mb-5 pb-5 px-5 pt-4">
			<h2 class="mt-4 mb-5 text-center">Cantidad de Aprobados por Departamento</h2>
	
</table>
	
<?php

$sql = "SELECT residencia, COUNT(*) cant FROM identificador i, notas n WHERE i.ci = n.ci AND n.nota>50 GROUP BY i.residencia";
$result = $con->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
	  if($row["residencia"]==1){
		@$res .= '<td> LA PAZ</td>';
	  }
	  if($row["residencia"]==2){
		@$res .= '<td>COCHABAMBA</td>';
	  }
	  if($row["residencia"]==3){
		@$res .= '<td> SANTA CRUZ</td>';
	  }
	  @$cant .= '<td>'.$row["cant"].'</td>';

  }
} else {
  echo "0 results";
}

echo '
    <table class="table table-condensed table-bordered neutralize">     
        <tbody>
            <tr class="table-primary">
                <td><b>DEPARTAMENTO</td>'.$res .'
            </tr>
            <tr class="table-secondary">
                <td><b>N° APROBADOS</td>'.$cant .'
            </tr>
        </tbody>
    </table>
';
$con->close();
?>


		</div>
		
		</div>
		<?php include('footer.php');?>
	</body>
</html>
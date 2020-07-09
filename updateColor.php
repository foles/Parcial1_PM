<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'academico';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (isset($_POST["ci"]))
{
    $ci = $_POST['ci'];
    echo "$ci";

} 
if (isset($_POST["color"])){
    $color = $_POST['color'];
    echo "$color";

}
$sql = "UPDATE identificador SET color='$color' WHERE ci = $ci  ";


if ($con->query($sql) === TRUE) {

    header('Location: profile.php');
} else {
  echo "Error updating record: " . $con->error;

}
$con->close();

?>
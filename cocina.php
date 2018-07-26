<?php
	session_start();
	if (!isset($_SESSION["usuario"])) {
		header("location: login.php");
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WIZDOM's HOUSE</title>
	
	<link rel="stylesheet" href="css/estilos.css">
	

</head>
<body>
<header >
	<div class="wrapper">
		<div class="logo">
			WIZDOM's HOUSE
		</div>
			<nav>
			<a href="cerrarsesion.php">CERRAR SESION</a>
			</nav>
	</div>
</header>
<h3>
<?php
echo "BIENVENIDO: ".$_SESSION["usuario"];
?></h3>
<DIV> <BR><H2>COCINA</H2><BR></DIV>

<div class="wrapper">
<p aling="center"><a href="nuevo_platillo.php" ><input type="button" name="ir" class="ir" value="NUEVO PLATILLO"></a>
	<a href="ordenes_cocina.php" ><input type="button" name="ir" class="ir" value="ORDENES_COCINA"></a></P>
</div>
<div id="main_cocina">
<?php
include("conexion.php");

mysqli_set_charset($conexion,"utf8");

$consulta= "SELECT * FROM platillos";


$resultado=$conexion->query($consulta);
?>
<table id="table_cocina"><thead>
<tr>
		<th >clave: </th>
		<th >nombre: </th>
		<th >precio:</th>
		<th >foto</th>
		<th >otro</th>
	</tr>
	</thead>
<?php
while ($consulta = $resultado->fetch_array(MYSQLI_BOTH))	
{
echo'<tr>
<td >'.$consulta['idplatillos'].'</td>
<td >'.$consulta['nombre'].'</td>
<td >$'.$consulta['precio'].'</td>
<td ><img class="banner" src="/img/'.$consulta['imagen'].'" ></td>
<td  > <a href="agregar_ingrediente.php?Id='.$consulta['idplatillos'].'" ><input type="submit" value="AGREGAR INGREDIENTE" "></td>
</tr>';
}
mysqli_close($conexion);
?>
</table>



</div>
</body>
</html>
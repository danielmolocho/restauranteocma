<?php
$idplatillo=$_GET["numero2"];
$id2 = $_GET["mesa"];
$costo=$_GET['precio'];

include("conexion.php");
mysqli_set_charset($conexion,"utf8");


$sql="SELECT max(idrecibo) as maxim FROM recibo where mesas_idmesas=$id2";
  $lib = mysqli_query($conexion, $sql);
  $rs_lib = mysqli_fetch_assoc($lib); 
  $ide_lib_nuevo = $rs_lib['maxim']; //

$s="ORDEN";

$consulta="INSERT INTO orden_platillo(mesas_idmesas,recibo_idrecibo,platillos_idplatillos,estado,costo) VALUES ($id2,$ide_lib_nuevo,$idplatillo,'$s',$costo)";
$resultado2=mysqli_query($conexion, $consulta);
if($resultado2==false){
	echo "error en consulta";
}else{
	header("location:menu_platillos.php?numero2=$id2");
}
mysqli_close($conexion);
?>
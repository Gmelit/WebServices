<?php 
// Conexion a la base de datos
$cnx =  mysqli_connect("localhost","root","","banco");

$json=array();
$consulta="select * from transaccion";
$resultado= mysqli_query($cnx,$consulta);

while($registro=mysqli_fetch_array($resultado)){
    $json["transaccion"][]=$registro;
}
mysqli_close($cnx);
echo json_encode($json);
?>
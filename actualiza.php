<?php

$cnx =  mysqli_connect("localhost","root","","banco");

if (isset($_REQUEST['ident']) && isset($_REQUEST['nombres']) && isset($_REQUEST['clave']) && isset($_REQUEST['email'])) 
{
	$ident=$_REQUEST['ident'];
	$nombres=$_REQUEST['nombres'];
	$email=$_REQUEST['email'];
    $clave=$_REQUEST['clave'];
	
	$result = mysqli_query($cnx,"SELECT ident FROM cliente WHERE ident = '$ident'");
	
	if (mysqli_num_rows($result)>0)
	{
		mysqli_query($cnx,"UPDATE cliente SET nombres='$nombres', email='$email', clave='$clave' WHERE ident='$ident'");	
	}
	else
	{
		echo "Usuario existente ....";
	}
	mysqli_close($cnx);
}
else
{
	echo "Debe especificar ident, clave, nombre y email, respectivamente...";
}
?>

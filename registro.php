<?php

$cnx =  mysqli_connect("localhost","root","","banco");

if (isset($_REQUEST['ident']) && isset($_REQUEST['nombre']) && isset($_REQUEST['email']) && isset($_REQUEST['clave'])) 
{
	$ident=$_REQUEST['ident'];
	$nombre=$_REQUEST['nombre'];
	$email=$_REQUEST['email'];
    $clave=$_REQUEST['clave'];
	
    $result = mysqli_query($cnx,"SELECT ident FROM cliente WHERE ident = '$ident'");
    
	if (mysqli_num_rows($result)==0)
	{
        mysqli_query($cnx,"INSERT INTO cliente (ident,nombre,email,clave) VALUES ('$ident','$nombre','$email','$clave')");	
        echo "Registro con exito";
	}
	else
	{
		echo "Usuario existente ...";
	}
	mysqli_close($cnx);
}
else
{
	echo "Debe especificar Ident, clave, nombre y correo, respectivamente...";
}
?>

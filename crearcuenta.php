<?php

$cnx =  mysqli_connect("localhost","root","","banco");

if (isset($_REQUEST['ident']))
{
	$ident=$_REQUEST['ident'];
	$saldo="25000";
	
    $result = mysqli_query($cnx,"SELECT ident FROM cuenta WHERE ident = '$ident'");
    
	if (mysqli_num_rows($result)==0)
	{
        mysqli_query($cnx,"INSERT INTO cuenta (ident,saldo) VALUES ('$ident','$saldo')");	
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
	echo "Debe especificar Ident, clave, nombres y correo, respectivamente...";
}
?>

<?php

$cnx =  mysqli_connect("localhost","root","","banco");

//if (isset($_REQUEST['ident']) && isset($_REQUEST['clave']) && isset($_REQUEST['nombres']) && isset($_REQUEST['email'])) 
if (isset($_REQUEST['ident']))
{
	$ident=$_REQUEST['ident'];
	$result = mysqli_query($cnx,"SELECT ident FROM cliente WHERE ident = '$ident'");
	if (mysqli_num_rows($result)==0)
	{
		echo ("Usuario no existente, se buscó:");
		echo ($ident);
	}
	else
	{
		mysqli_query($cnx,"DELETE FROM cliente WHERE ident='$ident'");
		echo "eliminado correctamente.";
	}
	mysqli_close($cnx);
}
else
{
	echo "Debe especificar ident";
}
?>

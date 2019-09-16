<?php

$cnx =  mysqli_connect("localhost","root","","banco");

if (isset($_REQUEST['ident']) && isset($_REQUEST['saldo'])) 
{
	$ident=$_REQUEST['ident'];
	$saldo=$_REQUEST['saldo'];
	
	$result = mysqli_query($cnx,"SELECT ident FROM cuenta WHERE ident = '$ident'");
	
	if (mysqli_num_rows($result)>0)
	{
		mysqli_query($cnx,"UPDATE cuenta SET saldo='$saldo' WHERE ident = '$ident'");	
	}
	else
	{
		echo "Usuario existente ....";
	}
	mysqli_close($cnx);
}
else
{
	echo "Debe especificar ident y saldo";
}
?>

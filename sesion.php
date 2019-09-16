<?php 
$cnx =  mysqli_connect("localhost","root","","banco");

	if (isset($_REQUEST['ident']) && isset($_REQUEST['clave']))
	{
		$ident=$_GET['ident'];
		$clave=$_GET['clave'];
		$res=$cnx->query("SELECT * FROM cliente WHERE ident = '$ident' AND clave = '$clave'");
		$json = array();
		foreach ($res as $row) 
		{
			$json['datos'][]=$row;
		}
		echo json_encode($json);
	}
	else
	{
		echo "La cédula y la clave son obligatorios";
	}

 ?>
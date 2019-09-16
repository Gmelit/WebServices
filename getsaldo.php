<?php 
$cnx =  mysqli_connect("localhost","root","","banco");

	if (isset($_REQUEST['ident']))
	{
		$ident=$_GET['ident'];
		$res=$cnx->query("SELECT * FROM cuenta WHERE ident = '$ident'");
		$json = array();
		foreach ($res as $row) 
		{
			$json['datos'][]=$row;
		}
		echo json_encode($json);
	}
	else
	{
		echo "La cédula es obligatoria";
	}

 ?>
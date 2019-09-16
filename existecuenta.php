<?php 

$cnx =  mysqli_connect("localhost","root","","banco");

	if (isset($_REQUEST['nrocuenta']))
	{
		$nrocuenta=$_REQUEST['nrocuenta'];
		$res=$cnx->query("SELECT * FROM cuenta WHERE nrocuenta = '$nrocuenta'");

		if (mysqli_num_rows($res)==0)
		{
			echo "No existe la cuenta";
		}
		else
		{
			$json = array();
			foreach ($res as $row) 
			{
				$json['datos'][]=$row;
			}

			echo json_encode($json);
			echo "Si existe la cuenta";
		}
	}
	else
	{
		echo "no hay nrocuenta";
	}

 ?>
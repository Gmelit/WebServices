<?php

$cnx =  mysqli_connect("localhost","root","","banco");

if (isset($_REQUEST['nrocuentaDestino']) && isset($_REQUEST['saldoEnviado']) && isset($_REQUEST['nrocuenta'])) 
{
	$nrocuentaDestino=$_REQUEST['nrocuentaDestino'];
	$saldoEnviado=$_REQUEST['saldoEnviado'];
	$nrocuenta=$_REQUEST['nrocuenta']; // cuenta actual

	//recibe el dinero de la cuenta que envía
	$sqlCuentaEnvia = "SELECT * FROM cuenta WHERE nrocuenta='$nrocuenta'";
	$result = $cnx->query($sqlCuentaEnvia);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$dineroCuentaEnvia = $row["saldo"];
		}
		$resta=(int)$dineroCuentaEnvia - (int)$saldoEnviado;
		mysqli_query($cnx,"UPDATE cuenta SET saldo='$resta' WHERE nrocuenta='$nrocuenta'");	
	}

	//recibe el dinero de la cuenta transaccion
	$sqlCuentaDestino = "SELECT * FROM cuenta WHERE nrocuenta='$nrocuentaDestino'";
	$result = $cnx->query($sqlCuentaDestino);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$dineroCuentaRecibe = $row["saldo"];
		}
		//suma el dinero
		$suma=(int)$dineroCuentaRecibe + (int)$saldoEnviado;
		mysqli_query($cnx,"UPDATE cuenta SET saldo='$suma' WHERE nrocuenta='$nrocuentaDestino'");	
		
	}

	mysqli_query($cnx,"INSERT INTO Transaccion (nrocuentaorigen,nrocuentadestino,valor) VALUES ('$nrocuenta','$nrocuentaDestino','$saldoEnviado')");

	mysqli_close($cnx);
}
else
{
	echo "Debe especificar nrocuenta y saldo";
}
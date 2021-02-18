<?php

	$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave);
	mysql_select_db($basedatos,$connect);

$table_name = "temp_".rand(1000,100000);

//$table="CREATE TEMPORARY TABLE ".$table_name."(monto decimal(8,2), concepto varchar(50)) TYPE = HEAP";

$table="CREATE TABLE ".$table_name."(monto decimal(8,2), concepto varchar(50))";
$resltado=mysql_query($table) or die('no se puede crear la tabla ');

//header ("Location: ../new/factura.php?base=$table_name&reset=Y");
header ("Location: ../new/facturar_varios.php?reset=Y&base=$table_name");
//exit;

?>
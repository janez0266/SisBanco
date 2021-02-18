<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  $tab = "circulation";
  $nav = "ingreso";
  $helpPage = "checkin";
  $focus_form_name = "barcodesearch";
  $focus_form_field = "barcodeNmbr";



  require_once("../functions/inputFuncs.php");
  require_once("../shared/logincheck.php");


  require_once("../shared/get_form_vars.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

 // $table_name = $_GET["base"];


//echo "Base de datos temporal: ".$table_name;




// CREATE TEMPORARY TABLE conta_temp ( monto decimal(8,2), concepto varchar(50), ) TYPE = HEAP;

?>




<!--**************************************************************************
    *  Javascript to post checkin form
    ************************************************************************** -->
<script language="JavaScript" type="text/javascript">
<!--
function checkin(massCheckinFlg)
{
  document.checkinForm.massCheckin.value = massCheckinFlg;
  document.checkinForm.submit();
}
-->
</script>
<center>
<h1>Modulo de Facturación - Ingresos varios</h1>

</center>
<table bgcolor="#555555">

  <tbody>
    <tr>
      <td>
 <? if ($REQUEST_METHOD <>"POST") { ?>
<form action="../new/crear_factura.php" method="POST">
Cédula: <INPUT type="text" name="cedula" size="40" >  <br>

<br>
<input type=submit value='buscar' class=button>

<input type="reset" value="Limpiar">

</td>
</tr>
</tbody>
</table>
</form>

<?
} else {


$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave);
	mysql_select_db($basedatos,$connect);



	$query = "select * from member where barcode_nmbr = '$cedula'";
	$result = mysql_query($query,$connect);


	
	$row=mysql_fetch_array($result);

	if ($result) {
		$cantidad ++;
		echo "ID: ".$row["mbrid"]." / ";
		echo "Cedula: ".$row["barcode_nmbr"]." / ";
		echo " Nombre: ".$row["last_name"].", ";
		echo $row["first_name"]." ";
		$mbrid = $row["mbrid"];
		$cedula = $row["barcode_nmbr"];
		$p_nombre = $row["first_name"];
		$apellido = $row["last_name"];
		$nombre = $apellido.", ".$p_nombre;
		echo "<hr>";
		
		} 

}

?>








<?php require_once("../shared/footer.php");



//$sql = 'DROP TABLE IF EXISTS '.$table_name;
//mysql_query( $sql, $connect );




 ?>

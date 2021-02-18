<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

 
  require_once("../shared/common.php");
  session_cache_limiter(null);
  $tab = "circulation";
  $nav = "suspension";
  $helpPage = "checkin";
  $focus_form_name = "barcodesearch";
  $focus_form_field = "searchText";

  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

?>

<BR>
<h1><img src="../images/circ.png" border="0" width="30" height="30" align="top"> Módulo de Suspensión de Usuarios con problemas</h1>
<?php 

  $cedula = $_POST["cedula"];
  $problema = $_POST["problema"];
  $desde = $_POST["entrada"];
 //$hasta = $_POST["hasta"];
 $hasta = $_POST["salida"];
$FILA = 1;

$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave);
	mysql_select_db($basedatos,$connect);

$query = "select * from member where barcode_nmbr = '$cedula'";
$result = mysql_query($query,$connect);
if ($row=mysql_fetch_array($result)){
//		

?>
<br>
<table >
 <tr>
	
	<td >Cedula: <?php echo $cedula;?> </td>    
<tr>	<td > -Problema. <?php echo $problema;?></td> </tr>
</tr>
<tr>
	<td> - Desde<?php echo $desde;?></td>
	<td> - Hasta <?php echo $hasta;?></td>
 </tr>
</table>

<?php

if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$desde,$res))
  		 {
  		    $aux="{$res[3]}-{$res[2]}-{$res[1]}"; }
if(ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})",$hasta,$res2))
  		 {
  		    $aux2="{$res2[3]}-{$res2[2]}-{$res2[1]}"; }

	$query = "insert into problemas (cedula,problema,desde,hasta) values ('$cedula','$problema','$aux','$aux2')";
	$result = mysql_query($query,$connect);





} else{   
echo "Usuario no registrado. No se puede suspender.......<br><br>";
}

?>
<a href="../new/suspender.php" class="alt1">Ok</a>

<?php include("../shared/footer.php"); ?>
<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);
  $tab = "circulation";
  $nav = "ingreso_varios";
  $helpPage = "checkin";
  $focus_form_name = "barcodesearch";
  $focus_form_field = "searchText";

  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

#   Elimina la base temporal anterior si existe 
 $destroy = $_GET["destroy"];
	if($destroy == "yes"){
		$base_delete = $_GET["base"];
 		
 		$query = "drop table $base_delete";
		$result = mysql_query($query,$connect);
	}

		
 $basetemp = $_POST["basetemp"];
 $crearbase = $_POST["crearbase"];
// if($base <> "") $basetemp = $base;

if($basetemp == "" && $crearbase == "yes") {


$table_name = "temp_".rand(1000,100000);
$basetemp = $table_name;

//$table="CREATE TEMPORARY TABLE ".$table_name."(monto decimal(8,2), concepto varchar(50)) TYPE = HEAP";

$table="CREATE TABLE ".$table_name."(monto decimal(8,2), concepto varchar(50))";
$resltado=mysql_query($table) or die('no se puede crear la tabla ');
}

 $concepto = $_POST["concepto"];
 $monto = $_POST["monto"];
 $total_fact = 0;
 $FILA = 1;


?>

<h1><img src="../images/circ.png" border="0" width="30" height="30" align="top"> Módulo de Facturación - Otros Ingresos</h1>


<?php echo "Tabla temporal: ".$basetemp; ?><br>
<?php echo "concepto: ".$concepto; ?><br>
<?php echo "monto: ".$monto; ?><br>


<?php
# procedimiento para agregar informacion a la base temporal si existen datos


if($concepto <> "" && $monto <> 0) {
	
 	$query = "insert into $basetemp (monto,concepto) values ('$monto','$concepto')";
	$result = mysql_query($query,$connect);
		
		if ($result) {
			
		} else {
			$html.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base.temporal</td></tr>";
			$html.="</table>";
			print($html);
			}

}
?>
<form name="barcodesearch" method="POST" action="../new/facturar_varios.php">
<table bgcolor="#b5b5db">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Ingrese el concepto y el monto"; ?>
    </th>
  </tr>
  <tr>
    <td nowrap="true" >
      <?php echo "Concepto: "; ?>
      <input type="text" name="concepto" size="50" >
      <?php echo "Monto: "; ?>
      <input type="text" name="monto" size="5" >
      <input type="hidden" name="basetemp" value = <?php echo $basetemp;?>>
      <input type="hidden" name="crearbase" value="yes">
      <input type="submit" value="Agregar" class="button">
    </td>
  </tr>
</table>
</form>
<table bgcolor="#b5b5db" width=600 >


 <tr>





    <th valign="top" nowrap="yes" align="left" >
      <?php echo "ID"; ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Concepto"; ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Monto"; ?>
    </th>
    
  </tr>



<?php
###########################################33
#  Trae datos de la tabla temporal
// Busqueda de los movimientos a facturar
if ($basetemp <> ""){
	$query = "select * from $basetemp ";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
		
		$cantidad ++;
	
?>


		
 		<tr>
			<td align=center width=20 ><?php echo $FILA;?></td>
			<td width=120 ><?php echo $row["concepto"];?></td>    
			<td align=right width=40 ><?php echo $row["monto"];?></td>

 		</tr>
		

<?
$total_fact=$total_fact + $row["monto"];
		
		
	$FILA = $FILA + 1;
	     } while ($row=mysql_fetch_array($result));
	     
	}
############################################



?>
<tr> <td></td><td align=right> <?php echo "Total a cancelar: ";?> </td><td align=right >  <?php echo $total_fact; ?>  </td>
</tr>

<?php } ?>

</table>
<br><br>
<form name="barcodesearch" method="POST" action="../new/facturar_varios_2.php">
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Para Facturar, indique el número de cédula del usuario..."; ?>
    </th>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo $loc->getText("indexCard"); ?>
      <input type="text" name="searchText" size="20" maxlength="20">
      <input type="hidden" name="searchType" value="barcodeNmbr">
	<input type="hidden" name="basetemp" value="<?php echo H($basetemp);?>">




      <input type="submit" value="<?php echo $loc->getText("indexSearch"); ?>" class="button">
    </td>
  </tr>
</table>
</form>
<?php

 include("../shared/footer.php"); ?>

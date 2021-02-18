<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");

?>

<BR>
<h4><pre>                                                 <?php echo " ".H(OBIB_LIBRARY_NAME);?></pre></h4>
<?php 
  $mbrid = $_POST["mbrid"];
  $cedula = $_POST["cedula"];
  $rif = $_POST["rif"];
  $nombre = $_POST["nombre"];
 $bauche = $_POST["bauche"];
 $fecha = $_POST["fecha"];
 $fecha_es = $_POST["fecha_es"];
 $basetemp = $_POST["basetemp"];

$FILA = 1;

?>
<?php
	
//Creacion de la factura. Se cargan los datos en la tabla Factura

$query = "insert into factura (cedula,userID,bauche,fecha,rif,nombre) values ('$cedula','$mbrid','$bauche','$fecha','$rif','$nombre')";
		$result = mysql_query($query,$connect);
		
		if ($result) {
			
		} else {
			$html.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base Factura</td></tr>";
			$html.="</table>";
			print($html);
		}
		
		
		
$factura = mysql_insert_id();
echo "<pre>                                                                                          ".$factura." </pre>";

?><br>
<table width=600 >
 <tr>
	<td align=center width=10 ></td>
	<td width=100 ><?php echo $nombre;?> </td>    
	<td align=right width=10 ><?php echo $cedula;?></td>
	<td align=right width=20 ><?php echo $fecha_es;?></td>
 </tr>
</table>
<table>
  <tr>
    <th valign="top" nowrap="yes" align="left">
 <!--     <pre>          <?php echo $nombre;?>                                  <?php echo $cedula;?>               <?php echo $fecha_es;?></pre>
   -->   <pre>                                                           <?php echo "Nro. Bauche: ".$bauche;?></pre><br>
    </td>
  </tr>

</table>

<?php

// Busqueda de los movimientos a facturar

	$query = "select * from  $basetemp";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
		
		$cantidad ++;
	
?>
<table width=600 >
 <tr>
	<td align=center width=20 ><?php echo $FILA;?></td>
	<td width=120 ><?php echo $row["concepto"];?></td>    
	<td align=right width=40 ><?php echo $row["monto"];?></td>
 </tr>
</table>
	<?php $concepto = $row["concepto"];?>
	<?php $monto = $row["monto"];?>
	<?php $total = $total+$row["monto"];?>	

<?

		$query2 = "insert into conta (factura,concepto,fecha,monto) values ('$factura','$concepto','$fecha','$monto')";
		$result2 = mysql_query($query2,$connect);
		
		if ($result2) {
			
		} else {
			$html2.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html2.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base.Conta</td></tr>";
			$html2.="</table>";
			print($html2);
		}
		
		
	$FILA = $FILA + 1;
	     } while ($row=mysql_fetch_array($result));
	     
	}

?>


<?php echo "<H4><pre>                                                                 Total a cancelar: ".$total." Bs.F.</pre></H4>";


?>
<a href="../new/facturar_varios.php?destroy=yes&#038;base=<?php echo $basetemp; ?>" class="alt1">Ok</a>


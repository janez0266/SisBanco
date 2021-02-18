<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");

?>

<BR>
<h4><pre>                                                 <?php echo " ".H(OBIB_LIBRARY_NAME);?></pre></h4>
<?php 
  $factura = $_POST["factura"];
  $fecha = date("Y-m-d");
  $fecha_es = date("d/m/Y");
  $ano_actual = date("Y");
  //$ano_actual = substr($fecha, 0,4);
  $FILA = 1;

?>
<?php


//busqueda de la factura a imprimir
//	$query = "select * from factura where factura = '$factura' and fecha > DATE_SUB('$fecha', INTERVAL DAYOFYEAR('$fecha') DAY)";
	$query = "select * from factura where factura = '$factura' and year(fecha) = '$ano_actual'";


	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);


	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
		

echo "<pre>                                                                                          ".$factura." </pre>";
$nombre = $row["nombre"];
$cedula = $row["cedula"];
$bauche = $row["bauche"];
$fecha_op = $row["fecha"];  
// para extraer el dia, mes y año de la fecha de la base de datos
$ano = substr($fecha_op, 0,4);
$mes = substr($fecha_op, 5,2);
$dia = substr($fecha_op, 8,2);




?><br>
<table width=600 >
 <tr>
	<td align=center width=10 ></td>
	<td width=100 ><?php echo $nombre;?> </td>    
	<td align=right width=10 ><?php echo $cedula;?></td>
	<td align=right width=20 ><?php echo $dia."/".$mes."/".$ano;?></td>
 </tr>
</table>
<table>
  <tr>
    <th valign="top" nowrap="yes" align="left">
  <pre>                                                           <?php echo "Nro. Bauche: ".$bauche;?></pre><br>
    </td>
  </tr>

</table>

<?php





 } while ($row=mysql_fetch_array($result));
	     
	} else {
	    echo "<p> !No se ha encontrado ningun registro..</p> \n";
	   
		}



	
// para saber la ultima factura       $factura = mysql_insert_id();



// Busqueda de los movimientos a facturar

	$query = "select * from  conta where factura = '$factura' and year(fecha) = '$ano_actual'";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
			
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
		
	$FILA = $FILA + 1;
	     } while ($row=mysql_fetch_array($result));
	     
	}

?>


<?php echo "<H4><pre>                                                                 Total a cancelar: ".number_format($total,2)." Bs.F.</pre></H4>";


?>
<a href="../new/repetir_facturar.php" class="alt1">Ok</a>


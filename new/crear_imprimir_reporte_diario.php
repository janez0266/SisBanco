<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");
  
?>

<BR>

<table><TR><TD>
<img src="../images/logoluz3.jpg" border="0" width="70" height="100" align="top"></TD><td><h4>
UNIVERSIDAD DEL ZULIA<br>
SISTEMA DE SERVICIOS BIBLIOTECARIOS Y DE INFORMACIÓN<br>
BANCO DE LIBROS <br>
<?PHP echo " ".H(OBIB_LIBRARY_NAME); ?><br>
MARACAIBO<br></h4></td></td>
</table>

<?php 

 $fecha_rep = $_POST["fecha"];
  $fecha_es = date("d/m/Y");
$total_general_efectivo = 0;
$FILA = 1;

$dia = substr($fecha_rep, 0,2);
$mes = substr($fecha_rep, 3,2);
$ano = substr($fecha_rep, 6,4);
$fecha = $ano."-".$mes."-".$dia;
echo $fecha_es;

?><br><br>
REPORTE DEL DÍA: <?PHP ECHO $dia."/".$mes."/".$ano;?><br>
Listado de facturas en efectivo<br><hr>

<table width=600 >
 <tr>
	<td align=center>Factura</td>
	<td align=left>Nombre</td>    
	<td align=right>Cedula</td>

	<td align=right>Monto</td>

 </tr>
<?php

// Busqueda de los movimientos a facturar

	$query = "select * from factura where fecha = '$fecha' and bauche = 0";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
	    }
	    do {
		$factura = $row["factura"];

?>

<?php
		$total =0;
		$query2 = "select * from conta where fecha = '$fecha' and factura = '$factura'";
		$result2 = mysql_query($query2,$connect);
		
	if ($row2=mysql_fetch_array($result2)){
	 
	    mysql_field_seek($result2,0);
	    while ($field=mysql_fetch_field($result2)){
		
	    }
	   		
	    do {
		$monto = $row2["monto"];
		$total = $total + $monto;
	     } while ($row2=mysql_fetch_array($result2));
	}
?>
 
<tr>
	<td align=center><?php echo $row["factura"];?></td>
	<td align=left><?php echo $row["nombre"];?></td>    
	<td align=right><?php echo $row["cedula"];?></td>


	<td align=right><?php echo $total;?></td>
	<?php $total_general_efectivo = $total_general_efectivo + $total;?>

 </tr>

<?php
 } while ($row=mysql_fetch_array($result));
	     
	}
?>
</table>
<hr>
<pre>                                       Total del dia en efectivo: <?php echo $total_general_efectivo;?></pre><br><br>

<a href="../new/contabilidad.php">Ok</a><br>
<a href="../new/crear_imprimir_reporte_diario_b.php?fecha=<?PHP ECHO $fecha;?>&total_general_efectivo=<?PHP ECHO $total_general_efectivo;?>">Siguiente listado (Bauches)</a>
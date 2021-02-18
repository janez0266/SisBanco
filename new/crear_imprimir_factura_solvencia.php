<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");
  
?>
<BR>
<h4><pre>                                                 <?php echo " ".H(OBIB_LIBRARY_NAME);?></pre></h4>
<?php 

//	<input type=radio name=solvencia value=1 checked >Solvencia de inscripción<br>
//	<input type=radio name=solvencia value=2 >Solvencia de grado<br>
//	<input type=radio name=solvencia value=3 >Solvencia de retiro<br>

 $cedula = $_POST["cedula"];
 $nombre = $_POST["nombre"];
 $bauche = $_POST["bauche"];
 $fecha = $_POST["fecha"];
 $fecha_es = $_POST["fecha_es"];
 $costosolvencia = $_POST["costosolvencia"];
 $solvencia = $_POST["solvencia"];

if ($solvencia=="1") $tipo_solvencia = "SOLVENCIA DE INSCRIPCION";
if ($solvencia=="2") $tipo_solvencia = "SOLVENCIA DE GRADO";
if ($solvencia=="3") $tipo_solvencia = "SOLVENCIA DE RETIRO";

$FILA = 1;

?>

<?php

	
//Creacion de la factura. Se cargan los datos en la tabla Factura

 $query = "insert into factura (cedula,nombre,bauche,fecha) values ('$cedula','$nombre','$bauche','$fecha')";
		$result = mysql_query($query,$connect);
		
		if ($result) {
			
		} else {
			$html.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base.Factura</td></tr>";
			$html.="</table>";
			print($html);
		}
		
		
		
$factura = mysql_insert_id();
echo "<pre>                                                                                          ".$factura." </pre>";

?>
<br>
<table width=600 >
 <tr>
	<td align=center width=10 ></td>
	<td width=100 ><?php echo $nombre;?> </td>    
	<td align=right width=10 ><?php echo $cedula;?></td>
	<td align=right width=20 ><?php echo $fecha_es;?></td>
 </tr>
</table>
<table>
<table>
  <tr>
    <th valign="top" nowrap="yes" align="left">
<!--      <pre>          <?php echo $nombre." ".$apellido;?>                                  <?php echo $cedula;?>               <?php echo $fecha_es;?></pre> -->
      <pre>                                                           <?php echo "Nro. Bauche: ".$bauche;?></pre><br>
    </td>
  </tr>

</table>

<?php

//  movimientos a facturar

	
?>
<br><br>
<table width=600 >
 <tr>
	<td align=center width=20 ><?php echo $FILA;?></td>
	<td width=120 ><?php echo $tipo_solvencia;?></td>    
	<td align=right width=40 ><?php echo $costosolvencia;?></td>
 </tr>
</table>
	<?php $concepto = $tipo_solvencia;?>
	<?php $monto = $costosolvencia;?>
	<?php $total = $monto;?>	

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
		
		
	
	     
	

?><br><br><br><br>
Este recibo acredita solvencia al Usuario arriba mencionado. No posee deudas ni libros en su poder.
<br><br><br
<?php echo "<H4><pre>                                                                 Total a cancelar: ".$total." Bs.F.</pre></H4>";


?>
<a href="../new/facturar.php?reset=Y">Ok</a>
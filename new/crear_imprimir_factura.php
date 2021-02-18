<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");
  
  
require_once("../functions/inputFuncs.php");

  require_once("../classes/Member.php");
  require_once("../classes/MemberQuery.php");
  require_once("../classes/MemberAccountQuery.php");
  require_once("../classes/BiblioSearch.php");
  require_once("../classes/BiblioSearchQuery.php");
  require_once("../classes/DmQuery.php");
  require_once("../shared/get_form_vars.php");
  require_once("../classes/Localize.php");  
  
  
  

function cortarTexto($texto) {
 
    $tamano = 10; // tamaño máximo
    $textoFinal = ''; // Resultado
 
    // Si el numero de carateres del texto es menor que el tamaño maximo,
    // el tamaño maximo pasa a ser el del texto
    if (strlen($texto) < $tamano) $tamano = strlen($texto);
 
    for ($i=0; $i <= $tamano - 1; $i++) {
        // Añadimos uno por uno cada caracter del texto
        // original al texto final, habiendo puesto
        // como limite la variable $tamano
        $textoFinal .= $texto[$i];
    }
 
    // devolvemos el texto final
    return $textoFinal;
 
}

?>

<BR>
<h4><pre>                                                 <?php echo "SEDE PRINCIPAL";?></pre></h4>
<?php 
  $mbrid = $_POST["mbrid"];
  $cedula = $_POST["cedula"];

 $nombre = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $bauche = $_POST["bauche"];
 $fecha = $_POST["fecha"];
 $fecha_es = $_POST["fecha_es"];
$nombre = $nombre." ".$apellido;

$FILA = 1;

?>


<?php

	$total = 0;
	
	
//Creacion de la factura. Se cargan los datos en la tabla Factura

$query = "insert into factura (cedula,userID,bauche,fecha,nombre) values ('$cedula','$mbrid','$bauche','$fecha','$nombre')";
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

<table>
  <tr>
    <th valign="top" nowrap="yes" align="left">
<table width=600 >
 <tr>
	<td align=center width=10 ></td>
	<td width=100 ><?php echo $nombre;?> </td>    
	<td align=right width=10 ><?php echo $cedula;?></td>
	<td align=right width=20 ><?php echo $fecha_es;?></td>
 </tr>
</table>
      <pre>                                                           <?php echo "Nro. Bauche: ".$bauche;?></pre><br>
    </td>
  </tr>

</table>

<?php

// Busqueda de los movimientos a facturar

	$query = "select * from member_account where mbrid = '$mbrid' and transaction_type_cd = '-p' and facturado <> 'F'";
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
	<td width=120 ><?php echo $row["description"];?></td>    
	<td align=right width=40 ><?php echo -$row["amount"];?></td>
 </tr>
</table>
	<?php $concepto = $row["description"];?>
	<?php $monto = -$row["amount"];?>
	<?php $total = $total+$row["amount"];?>	

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

	$query = "update member_account set facturado='F' where mbrid = '$mbrid' and transaction_type_cd = '-p'";
		$result = mysql_query($query,$connect);
		if ($result) {

		} else {
			echo "<br><br><b><center><b>Error al modificar el Registro...</center></b><br>";
			}


?>

<?php echo "<H4><pre>                                                               Total a cancelar: ".-$total." Bs.F.</pre></H4>";

?>
-----------------RESUMEN DE LIBROS ALQUILADOS ----------------------------

<br>
<table class="primary">
  <tr>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Fecha Alquiler"; ?>
    </th>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Codigo"; ?>
    </th>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo " Titulo"; ?>
    </th>
    
  </tr>

<?php
  #****************************************************************************
  #*  Search database for BiblioStatus data
  #****************************************************************************
  $biblioQ = new BiblioSearchQuery();
  $biblioQ->connect();
  if ($biblioQ->errorOccurred()) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  if (!$biblioQ->doQuery(OBIB_STATUS_OUT,$mbrid)) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  if ($biblioQ->getRowCount() == 0) {
?>
  <tr>
    <td class="primary" align="center" colspan="8">
      <?php echo "No tiene libros alquilados"; ?>
    </td>
  </tr>
<?php
  } else {
    while ($biblio = $biblioQ->fetchRow()) {
?>
  <tr>
    <td class="primary" valign="top" nowrap>
      <?php echo cortarTexto(H($biblio->getStatusBeginDt()));?>
    </td>
    <td class="primary" valign="top" nowrap>
     
      <?php echo H($biblio->getBarcodeNmbr());?>
    </td>
    <td width="500" class="primary" valign="top" >
      <?php echo H($biblio->getTitle());?>
    </td>
    

</tr>
<?php
    }
  }
  $biblioQ->close();
?>

</table>


<a href="../circ/mbr_account.php?mbrid=<?php echo $mbrid;?>&amp;reset=Y&amp;cedula=<?php echo $cedula;?>&amp;apellido=<?php echo $apellido;?>&amp;nombre=<?php echo $nombre;?>">Ok</a>
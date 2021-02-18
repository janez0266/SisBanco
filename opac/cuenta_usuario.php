<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  $focus_form_name = "barcodesearch";
  $focus_form_field = "barcodeNmbr";


  require_once("../classes/Member.php");
  require_once("../classes/MemberQuery.php");
  require_once("../classes/MemberAccountQuery.php");
  require_once("../classes/BiblioSearch.php");
  require_once("../classes/BiblioSearchQuery.php");
  require_once("../classes/BiblioHold.php");
  require_once("../classes/BiblioHoldQuery.php");
  require_once("../classes/DmQuery.php");
  require_once("../shared/get_form_vars.php");
 
 // $loc = new Localize(OBIB_LOCALE,$tab);
  $total_a_cancelar=0;
  #****************************************************************************
  #*  Retrieving get var
  #****************************************************************************
  $cedula = $_POST["cedula"];

	mysql_select_db($basedatos,$connect);
  	$query = "select mbrid from member where barcode_nmbr='$cedula'";
	$result = mysql_query($query,$connect);

	if ($row=mysql_fetch_array($result)){
			$mbrid = $row['mbrid'];





  //$mbrid = $_GET["mbrid"];
  if (isset($_GET["msg"])) {
    $msg = "<font class=\"error\">".H($_GET["msg"])."</font><br><br>";
  } else {
    $msg = "";
  }

  #****************************************************************************
  #*  Loading a few domain tables into associative arrays
  #****************************************************************************
  $dmQ = new DmQuery();
  $dmQ->connect();
  $mbrClassifyDm = $dmQ->getAssoc("mbr_classify_dm");
  $materialTypeDm = $dmQ->getAssoc("material_type_dm");
  $materialImageFiles = $dmQ->getAssoc("material_type_dm", "image_file");
  $dmQ->close();

  #****************************************************************************
  #*  Search database for member
  #****************************************************************************
  $mbrQ = new MemberQuery();
  $mbrQ->connect();
  $mbr = $mbrQ->get($mbrid);
  $mbrQ->close();

  #**************************************************************************
  #*  Show member checkouts
  #**************************************************************************
?>
<html>
<head>
<style type="text/css">
  <?php include("../css/style.php");?>
</style>
<meta name="description" content="Sistema Digital de Banco de Libros">
<title>Alquileres para <?php echo H($mbr->getFirstLastName());?></title>

</head>
<body bgcolor="<?php echo H(OBIB_PRIMARY_BG);?>" topmargin="5" bottommargin="5" leftmargin="5" rightmargin="5" marginheight="5" marginwidth="5" onLoad="self.focus();">

<font class="primary">
<table class="primary" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td width="100%" class="noborder" valign="top">
    Universidad del Zulia<br>
    Sistema de Servicios Bibliotecarios y de Informaci&oacute;n<br>
    Banco de Libros
      <h1><?php echo "Alquileres de ".H($mbr->getFirstLastName()); ?></h1>
    </td>
    <td class="noborder" valign="top" nowrap="yes"><font class="small"><a href="javascript:window.close()"><?php echo "Cerrar Ventana"; ?></font></a>&nbsp;&nbsp;</font></td>
  </tr>
</table>
<br>
<table class="primary" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td class="noborder" valign="top"><?php echo "Fecha:";?></td>
    <td width="100%" class="noborder" valign="top"><?php echo H(date("F j, Y, g:i a"));?></td>
  </tr>
  <tr>
    <td class="noborder" valign="top" nowrap><?php echo "Usuario";?></td>
    <td class="noborder" valign="top"><?php echo H($mbr->getFirstLastName());?></td>
  </tr>
  <tr>
    <td class="noborder" valign="top" nowrap><?php echo "N&uacute;mero de c&eacute;dula:";?></td>
    <td class="noborder" valign="top"><?php echo H($mbr->getBarcodeNmbr()); $cedula = H($mbr->getBarcodeNmbr());?></td>
  </tr>
  <tr>
    <td class="noborder" valign="top" nowrap><?php echo "Clasificaci&oacute;n";?></td>
    <td class="noborder" valign="top"><?php echo H($mbrClassifyDm[$mbr->getClassification()]);?></td>
  </tr>
</table>
<br>
<table class="primary">
  <tr>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Alquilado el"; ?>
    </th>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Material"; ?>
    </th>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Titulo"; ?>
    </th>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Autor"; ?>
    </th>

    <td class="primary" valign="top" align="left">
      <?php echo "D&iacute;as transcurridos"; ?>
    </th>
    <td class="primary" valign="top" align="left">
      <?php echo "Costo mensual"; ?>
    </th>
    <td class="primary" valign="top" align="left">
      <?php echo "Deuda Bs.F."; ?>
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
      <?php echo "No posee Libros Alquilados"; ?>
    </td>
  </tr>
<?php
  } else {
    while ($biblio = $biblioQ->fetchRow()) {
?>
  <tr>
    <td class="primary" valign="top" nowrap>
      <?php echo H($biblio->getStatusBeginDt());?>
    </td>
    <td class="primary" valign="top" nowrap>
      <img src="../images/<?php echo HURL($materialImageFiles[$biblio->getMaterialCd()]);?>" width="20" height="20" border="0" align="middle" alt="<?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?>">
      <?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($biblio->getTitle());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($biblio->getAuthor());?>
    </td>

    <td class="primary" valign="top" >
      <?php echo H($biblio->getDaysLate());?>

    </td>
<?php
// procedimiento para traer el costo diario de un libro y verificar el monto deudor basado en los dias atrasados
	$codigo_nivel = H($biblio->getCollectionCd());

	$query = "select * from collection_dm where code = '$codigo_nivel'";
	$result = mysql_query($query,$connect);
	$row=mysql_fetch_array($result);

	if ($result) {
		$costo_diario = $row["daily_late_fee"];
		} 
?>
<?php
// calculo de la deuda por alquiler pendiente
$dias_retraso = H($biblio->getDaysLate());
$deuda_libros = $costo_diario * $dias_retraso;
$total_a_cancelar = $total_a_cancelar + $deuda_libros;
$costo_mensual = $costo_diario * 30;
?>
    <td class="primary" valign="top" >
      <?php echo H($costo_mensual);?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($deuda_libros);?>
    </td>
</tr>
<?php
    }
  }
  $biblioQ->close();
?>
<tr>    	
<td  bgcolor="#777777" class="primary" align="right" colspan="6">

<?php echo "Total: Bs.F. "; ?>

</TD>
<td class="primary" valign="top" >
<?php echo H($total_a_cancelar); ?>
</td>
</tr>
</table>

Tiempo máximo de entrega de los ejemplares: 6 meses o 1 año, dependiendo del semestre.

<table class="primary">
<tr>
  		<td class="primary" valign="top" >
			<?php echo "Total Deuda Libros pendientes: "; ?></TD>
		<td class="primary" valign="top" >
			<?php echo $total_a_cancelar; ?></td>
</tr>
<tr>
<?php 
  #****************************************************************************
  #*  Search database for member account info
  #****************************************************************************
  $transQ = new MemberAccountQuery();
  $transQ->connect();
  if ($transQ->errorOccurred()) {
    $transQ->close();
    displayErrorPage($transQ);
  }
  if (!$transQ->doQuery($mbrid)) {
    $transQ->close();
    displayErrorPage($transQ);
  }

  if ($transQ->getRowCount() == 0) {

  } else {
    $bal = 0;

    while ($trans = $transQ->fetchRow()) {
	$bal = $bal + $trans->getAmount();

	$deuda_total = H($bal,2);
    }
  }
  $transQ->close();
  $total = 0;
  $total_general = $deuda_total + $total_a_cancelar;
?>
		<td class="primary" valign="top" >Total Deuda otros conceptos:</td>
		<td class="primary" valign="top" ><?php echo H($deuda_total); ?></td>.
</tr>
<tr>    
  		<td class="primary" valign="top" >
			<?php echo "TOTAL DEUDA Bs.F.: "; ?></TD>
		<td class="primary" valign="top" >
			<?php echo $total_general; ?></td>
</tr>
</table>

<h1><?php echo "Material actualmente en Reserva:"; ?></h1>
<table class="primary">
  <tr>

    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "En reserva desde"; ?>
    </td>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Material"; ?>
    </td>
    <td  class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Registro"; ?>
    </td>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Titulo"; ?>
    </td>
    <td class="primary" valign="top" nowrap="yes" align="left">
      <?php echo "Autor"; ?>
    </td>

  </tr>
<?php
  #****************************************************************************
  #*  Search database for BiblioHold data
  #****************************************************************************
  $holdQ = new BiblioHoldQuery();
  $holdQ->connect();
  if ($holdQ->errorOccurred()) {
    $holdQ->close();
    displayErrorPage($holdQ);
  }
  if (!$holdQ->queryByMbrid($mbrid)) {
    $holdQ->close();
    displayErrorPage($holdQ);
  }
  if ($holdQ->getRowCount() == 0) {
?>
  <tr>
    <td class="primary" align="center" colspan="8">
      <?php echo "No posee Libros en Reservas"; ?>
    </td>
  </tr>
<?php
  } else {
    while ($hold = $holdQ->fetchRow()) {
?>
  <tr>

    <td class="primary" valign="top" nowrap="yes">
      <?php echo H($hold->getHoldBeginDt());?>
    </td>
    <td class="primary" valign="top">
      <img src="../images/<?php echo HURL($materialImageFiles[$hold->getMaterialCd()]);?>" width="20" height="20" border="0" align="middle" alt="<?php echo H($materialTypeDm[$hold->getMaterialCd()]);?>">
      <?php echo H($materialTypeDm[$hold->getMaterialCd()]);?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($hold->getBarcodeNmbr());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($hold->getTitle());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($hold->getAuthor());?>
    </td>

  </tr>
<?php
    }
  }
  $holdQ->close();
?>


</table>



<?php echo "<br>Historial de Problemas y Suspensiones"; ?>
<table>
  <tr>
   
    <td class="primary" align="left" rowspan="2">
      <?php echo "Problema"; ?>
    </td>
    <td class="primary" align="center" colspan="2" nowrap="yes">
      <?php echo "Suspendido"; ?>
    </td>
  </tr>
  <tr>
    <td class="primary" align="left">
      <?php echo "Desde"; ?>
    </td>
    <td class="primary" align="left">
      <?php echo "Hasta"; ?>
    </td>
  </tr>
<?php
//  procedimiento para verificar si el problema ya vencio y eliminarlo........
	$hoy = date("Y-m-d");
	$query = "delete from problemas where hasta<'$hoy'";
	$result = mysql_query($query,$connect);

// buscar en el archivo de problemas y mostrarlo en la tabla
	$query = "select * from  problemas where cedula = '$cedula'";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	   mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
?>
  <tr>

    <td valign="top" class="primary">
      <?php echo H($row['problema']); ?>
    </td>
    <td valign="top" class="primary">
      <?php echo H($row['desde']); ?>
    </td>
    <td valign="top" class="primary">
      <?php echo H($row['hasta']); ?>
    </td>
  </tr>
<?php
	     } while ($row=mysql_fetch_array($result));
	     
	}

    } else {

    echo "<br><br><br>El usuario portador de la c&eacute;dula: ".$cedula.", no est&aacute; registrado en el sistema.";
    echo "<br>Por lo tanto, no posee deudas con el Banco de Libros.<br><br><br>";
    echo "<br><br><br><br><br><br>";

}

?>
  </table><br><center>

<a href="javascript:self.print()">Imprimir</a><br>

  <br> <a href="../opac/index.php">Volver al Cat&aacute;logo</a>
  </center>
  <BR>

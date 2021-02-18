<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  $tab = "circulation";
  $nav = "view";
  $helpPage = "memberView";
  $focus_form_name = "barcodesearch";
  $focus_form_field = "barcodeNmbr";

  require_once("../functions/inputFuncs.php");
  require_once("../functions/formatFuncs.php");
  require_once("../shared/logincheck.php");
  require_once("../classes/Member.php");
  require_once("../classes/MemberQuery.php");
  require_once("../classes/BiblioSearch.php");
  require_once("../classes/BiblioSearchQuery.php");
  require_once("../classes/BiblioHold.php");
  require_once("../classes/BiblioHoldQuery.php");
  require_once("../classes/MemberAccountQuery.php");
  require_once("../classes/DmQuery.php");
  require_once("../shared/get_form_vars.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);
$total_a_cancelar = 0;
$cant_pro=0;



  #****************************************************************************
  #*  Function para calcular la fecha tope de renovacion
  #****************************************************************************

 
      function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0){
   
          $date_r = getdate(strtotime($date));
  
          //$date_result = date("Y-m-d h:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),($date_r["seconds"]+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));

            $date_result = date("Y-m-d H:i:s", mktime((12+$hh),(00+$mn),(00+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));
          return $date_result;
  
      }

  #****************************************************************************
  #*  Checking for get vars.  Go back to form if none found.
  #****************************************************************************
  if (count($_GET) == 0) {
    header("Location: ../circ/index.php");
    exit();
  }

  #****************************************************************************
  #*  Retrieving get var
  #****************************************************************************
  $mbrid = $_GET["mbrid"];
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
  $mbrMaxFines = $dmQ->getAssoc("mbr_classify_dm", "max_fines");
  $biblioStatusDm = $dmQ->getAssoc("biblio_status_dm");
  $materialTypeDm = $dmQ->getAssoc("material_type_dm");
  $materialImageFiles = $dmQ->getAssoc("material_type_dm", "image_file");
  $memberFieldsDm = $dmQ->getAssoc("member_fields_dm");
  $dmQ->close();

  #****************************************************************************
  #*  Search database for member
  #****************************************************************************
  $mbrQ = new MemberQuery();
  $mbrQ->connect();
  $mbr = $mbrQ->get($mbrid);
  $mbrQ->close();

  #****************************************************************************
  #*  Check for outstanding balance due
  #****************************************************************************
  $acctQ = new MemberAccountQuery();
  $acctQ->connect();
  if ($acctQ->errorOccurred()) {
    $acctQ->close();
    displayErrorPage($acctQ);
  }
  $balance = $acctQ->getBalance($mbrid);
  if ($acctQ->errorOccurred()) {
    $acctQ->close();
    displayErrorPage($acctQ);
  }
  $acctQ->close();
  $balMsg = "";
  if ($balance > 0 && $balance >= $mbrMaxFines[$mbr->getClassification()]) {
    $balText = moneyFormat($balance,2);
    $balMsg = "<font class=\"error\">".$loc->getText("mbrViewBalMsg",array("bal"=>$balText))."</font><br><br>";
  }

  #**************************************************************************
  #*  Tabla de informacion sobre el usuario
  #**************************************************************************
  require_once("../shared/header.php");
?>

<?php echo $balMsg ?>
<?php echo $msg ?>


     

 <?php $cedula =  H($mbr->getBarcodeNmbr()); ?>
 <?php $apellido = H($mbr->getLastName()); ?>
 <?php $nombre = H($mbr->getFirstName()); ?>


<table class="primary">
  <tr><td class="noborder" valign="top">
  <br><h4>
<a href="../circ/mbr_account.php?mbrid=<?php echo $mbrid;?>&amp;reset=Y&amp;cedula=<?php echo $cedula;?>&amp;apellido=<?php echo $apellido;?>&amp;nombre=<?php echo $nombre;?>">Cuentas y pagos del Usuario</a></h4>
<table class="primary">
  <tr>
    <th align="left" colspan="2" nowrap="yes">
      <?php echo $loc->getText("mbrViewHead1"); ?>

    </th>    
  </tr>  
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("mbrViewName"); ?>
    </td>
    <td valign="top" class="primary" >
      <?php echo H($mbr->getLastName());?>, <?php echo H($mbr->getFirstName());?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("mbrViewAddr"); ?>
    </td>
    <td valign="top" class="primary">
      <?php
        echo str_replace("\n", "<br />", H($mbr->getAddress()));
      ?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("mbrViewCardNmbr"); ?>

    </td>
    <td valign="top" class="primary">
      <?php echo H($mbr->getBarcodeNmbr());?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("mbrViewClassify"); ?>
    </td>
    <td valign="top" class="primary">
      <?php echo H($mbrClassifyDm[$mbr->getClassification()]);?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("mbrViewPhone"); ?>
    </td>
    <td valign="top" class="primary">
      <?php
        if ($mbr->getHomePhone() != "") {
          echo $loc->getText("mbrViewPhoneHome").$mbr->getHomePhone()." ";
        }
        if ($mbr->getWorkPhone() != "") {
          echo $loc->getText("mbrViewPhoneWork").$mbr->getWorkPhone();
        }
      ?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("mbrViewEmail"); ?>
    </td>
    <td valign="top" class="primary">
      <?php echo H($mbr->getEmail());?>
    </td>
  </tr>
<?php
  foreach ($memberFieldsDm as $name => $title) {
    if (($value = $mbr->getCustom($name))) {
?>
  <tr>
    <td class="primary" valign="top">
      <?php echo H($title); ?>
    </td>
    <td valign="top" class="primary">
      <?php echo H($value);?>
    </td>
  </tr>
<?php
    }
  }
?>
</table>

  </td>
  <td class="noborder" valign="top">

<?php
  #****************************************************************************
  #*  Tabla para mostrar los problemas y suspensiones
  #****************************************************************************

?>
<?php echo "<br><br><br>Historial de Problemas y Suspensiones"; ?>
<table class="primary">
  <tr>
   
    <th align="left" rowspan="2">
      <?php echo "Problema"; ?>
    </th>
    <th align="center" colspan="2" nowrap="yes">
      <?php echo "Suspendido"; ?>
    </th>
  </tr>
  <tr>
    <th align="left">
      <?php echo "Desde"; ?>
    </th>
    <th align="left">
      <?php echo "Hasta"; ?>
    </th>
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
	$cant_pro++;
	     } while ($row=mysql_fetch_array($result));
	     
	}

?>
  </table>
</td></tr></table>

<br>
<!--****************************************************************************
    *  Forma para alquilar libros al usuario
    **************************************************************************** -->
<form name="barcodesearch" method="POST" action="../circ/checkout.php">
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHead3"); ?>
    </th>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo $loc->getText("mbrViewBarcode"); ?>
      <?php printInputText("barcodeNmbr",18,18,$postVars,$pageErrors); ?>
        <a href="javascript:popSecondaryLarge('../opac/index.php?lookup=Y')"><?php echo $loc->getText("indexSearch"); ?></a>
      <input type="hidden" name="mbrid" value="<?php echo H($mbrid);?>">
      <?php if($cant_pro==0){ ?>
	<input type="submit" value="<?php echo $loc->getText("mbrViewCheckOut"); ?>" class="button">
      <?php }else{ echo "No de puede alquilar con Suspensiones";} ?>

    </td>
  </tr>
</table>
</form>

<!--****************************************************************************
    *  procedimiento para imprimir la tabla de libros pendientes
    **************************************************************************** -->

<h1><?php echo $loc->getText("mbrViewHead4"); ?>
  <font class="primary"> <a href="javascript:popSecondary('../circ/mbr_print_checkouts.php?mbrid=<?php echo H(addslashes(U($mbrid)));?>')"><?php echo $loc->getText("mbrPrintCheckouts"); ?></a></font>
</h1>

<!--****************************************************************************
    *  Tabla de los movimientos pendientes del usuario: libros por entregar

                     Encabezado
    **************************************************************************** -->
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr1"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr2"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr3"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr4"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr5"); ?>
    </th>
 <!--    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr6"); ?>
    </th>
    <th valign="top" align="left">
      <?php echo $loc->getText("mbrViewOutHdr8"); ?>
    </th> -->
    <th valign="top" align="left">
      <?php echo $loc->getText("mbrViewOutHdr7"); ?>
    </th>
    <th valign="top" align="left">
      <?php echo $loc->getText("mbrViewOutHdr11"); ?>
    </th>
    <th valign="top" align="left">
      <?php echo $loc->getText("mbrViewOutHdr10"); ?>
    </th>
  </tr>

<?php
  #****************************************************************************
  #*  Busqueda en la base de datos de los libros alquilados
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
  if ($biblioQ->getRowCount() == 0) { //verifica si posee libros
?>
  <tr>
    <td class="primary" align="center" colspan="8">
      <?php echo $loc->getText("mbrViewNoCheckouts"); ?>
    </td>
  </tr>
<?php
  } else {
    while ($biblio = $biblioQ->fetchRow()) {
?>
  <tr>
    <td class="primary" valign="top" nowrap="yes">
      <?php echo H($biblio->getStatusBeginDt());?>
    </td>
    <td class="primary" valign="top">
      <img src="../images/<?php echo HURL($materialImageFiles[$biblio->getMaterialCd()]);?>" width="20" height="20" border="0" align="middle" alt="<?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?>">
      <?php echo H($materialTypeDm[$biblio->getMaterialCd()]); // tipo de material   ?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($biblio->getBarcodeNmbr());   // numero de registro del ejemplar?>
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
    <td class="primary" valign="top" >
      <a href="../shared/biblio_view.php?bibid=<?php echo HURL($biblio->getBibid());?>"><?php echo H($biblio->getTitle()); //H($biblio->getCollectionCd())  muestra el campo CODE de la base de datos COLLECTION_DM   ?></a> 
    </td>
    <td class="primary" valign="top" >
      <?php echo H($biblio->getAuthor());?>
    </td>
  <!--     <td class="primary" valign="top" nowrap="yes">
      <?php echo H($biblio->getDueBackDt());?>
    </td>
       <td class="primary" valign="top" >
<a href="../circ/checkout.php?barcodeNmbr=<?php //echo HURL($biblio->getBarcodeNmbr());?>&amp;mbrid=<?php //echo HURL($mbrid);?>&amp;renewal">Renew item</A> 
      <?php
        if($biblio->getRenewalCount() > 0) { ?>
          </br>
          (<?php echo H($biblio->getRenewalCount());?> <?php echo $loc->getText("mbrViewOutHdr9"); ?>)
      <?php
        } ?>
    </td>-->
    <td class="primary" valign="top" >
      <?php echo H($biblio->getDaysLate());?>
    </td>
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


    		<td  bgcolor="#777777" class="primary" align="right" colspan="7">
  		
			<?php echo "Total Deuda: "; ?></TD>
		<td bgcolor="#777777">
			<?php echo $total_a_cancelar; ?></td>

</tr>

</table>

<table class="primary">

<tr>
  		<td bgcolor="#777777">
			<?php echo "Total Deuda Libros pendientes: "; ?></TD>
		<td bgcolor="#777777">
			<?php echo moneyFormat($total_a_cancelar,2); ?></td>

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
	

		<td bgcolor="#888888">Total Deuda otros conceptos:</td>
		<td bgcolor="#888888"><?php echo moneyFormat($deuda_total,2); ?></td>.
</tr>
<tr>    
  		<td bgcolor="#b5b5db">
			<?php echo "TOTAL DEUDA: Bs.F. "; ?></TD>
		<td bgcolor="#b5b5db">

			<?php echo moneyFormat($total_general,2); ?></td>

</tr>
</table>
<br>
Nota: Las Deudas reflejadas aqu&iacute; son c&aacute;lculos basados en los dias de retraso de ejemplares en manos del Usuario. No se reflejan en el módulo de Cuentas del Usuario sino hasta que se devuelvan.<br>
<br>


<h1><?php echo $loc->getText("mbrViewHead6"); ?></h1>
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr1"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr2"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr3"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr4"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr5"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr6"); ?>
    </th>
    <th valign="top" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr7"); ?>
    </th>
    <th valign="top" align="left">
      <?php echo $loc->getText("mbrViewHoldHdr8"); ?>
    </th>
  </tr>
<?php


//  *********   verificaciï¿½n de los ejemplares reservados ***eliminacion de reservas vencidas ***********



//$fecha = "13/01/2009";
//$fecha = "2009-02-28";
$fecha = date("m/d/Y"); //mes/dia/aï¿½o
$fecha_hoy = date("Y-m-d H:i:s");
//$fecha_hoy = "2009-03-11 11:00:00";
$fecha_tope = dateadd($fecha,0,0,0,0,0,0); // suma 0 dia a la fecha

	$query = "select * from biblio_hold";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result))
	{
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
	    }
	    do {
	
		$bibid_q= $row["bibid"];
		$copyid_q = $row["copyid"];
		$fecha_reservado = $row["hold_begin_dt"];
		//echo " <br>fecha de reserva: ".$fecha_reservado;
		
		$fecha_verificada = dateadd($fecha_reservado,1,0,0,0,0,0);// suma 1 dia a la fecha
		//echo " <br>fecha verificada: ".$fecha_verificada;
		//echo "<br>strtotime Fecha verificada. ".strtotime($fecha_verificada);
		if (strtotime($fecha_verificada) < strtotime($fecha_hoy) )
			{
	//eliminar aqui la reserva ya que esta vencido

			$query2 = "update biblio_copy set status_cd='in',mbrid='' where bibid = '$bibid_q' and copyid = '$copyid_q'";
			$result2 = mysql_query($query2,$connect);
			if ($result2) {  //echo "<br> Libro eliminado";
				} else {
				echo "<br><br><b><center><b>Error al modificar el Registro...</center></b><br>";
				}
		// eliminar el registro de la base biblio_hold	



			$query2 = "delete from biblio_hold where bibid='$bibid_q' and copyid='$copyid_q'";
			$result2 = mysql_query($query2,$connect);
			if ($result2) { 	} 
			else { echo "Error al buscar el registro.";  }
		

			}
		//echo "<br>______________________________";
		 } while ($row=mysql_fetch_array($result));
	     
	} 





  #****************************************************************************



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
      <?php echo $loc->getText("mbrViewNoHolds"); ?>
    </td>
  </tr>
<?php
  } else {
    while ($hold = $holdQ->fetchRow()) {
?>
  <tr>
    <td class="primary" valign="top" nowrap="yes">
      <a href="../shared/hold_del_confirm.php?bibid=<?php echo HURL($hold->getBibid());?>&amp;copyid=<?php echo HURL($hold->getCopyid());?>&amp;holdid=<?php echo HURL($hold->getHoldid());?>&amp;mbrid=<?php echo HURL($mbrid);?>"><?php echo $loc->getText("mbrViewDel"); ?></a>
    </td>
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
      <a href="../shared/biblio_view.php?bibid=<?php echo HURL($hold->getBibid());?>"><?php echo H($hold->getTitle());?></a>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($hold->getAuthor());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($biblioStatusDm[$hold->getStatusCd()]);?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($hold->getDueBackDt());?>
    </td>
  </tr>
<?php
    }
  }
  $holdQ->close();
?>


</table>


<?php require_once("../shared/footer.php"); ?>

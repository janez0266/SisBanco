<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);

  $tab = "circulation";
  $nav = "ingreso";
  require_once("../shared/logincheck.php");

  require_once("../classes/Member.php");
  require_once("../classes/MemberQuery.php");
  require_once("../classes/MemberAccountQuery.php");
  require_once("../functions/searchFuncs.php");
  require_once("../classes/DmQuery.php");
  require_once("../classes/Localize.php");
  require_once("../classes/BiblioSearch.php");
  require_once("../classes/BiblioSearchQuery.php");
  require_once("../classes/BiblioHold.php");
  require_once("../classes/BiblioHoldQuery.php");

  $id=0;
  $fecha = date("Y-n-d");
  $fecha_es = date("d/n/Y");
  $costosolvencia = 0.50;

  $loc = new Localize(OBIB_LOCALE,$tab);

  #****************************************************************************
  #*  Function declaration only used on this page.
  #****************************************************************************
  function printResultPages($currPage, $pageCount) {
    global $loc;
    $maxPg = 21;
    if ($currPage > 1) {
      echo "<a href=\"javascript:changePage(".H(addslashes($currPage-1)).")\">&laquo;".$loc->getText("mbrsearchprev")."</a> ";
    }
    for ($i = 1; $i <= $pageCount; $i++) {
      if ($i < $maxPg) {
        if ($i == $currPage) {
          echo "<b>".H($i)."</b> ";
        } else {
          echo "<a href=\"javascript:changePage(".H(addslashes($i)).")\">".H($i)."</a> ";
        }
      } elseif ($i == $maxPg) {
        echo "... ";
      }
    }
    if ($currPage < $pageCount) {
      echo "<a href=\"javascript:changePage(".($currPage+1).")\">".$loc->getText("mbrsearchnext")."&raquo;</a> ";
    }
  }

  #****************************************************************************
  #*  Loading a few domain tables into associative arrays
  #****************************************************************************
  $dmQ = new DmQuery();
  $dmQ->connect();
  $mbrClassifyDm = $dmQ->getAssoc("mbr_classify_dm");
  $dmQ->close();

  #****************************************************************************
  #*  Retrieving post vars and scrubbing the data
  #****************************************************************************
  if (isset($_POST["page"])) {
    $currentPageNmbr = $_POST["page"];
  } else {
    $currentPageNmbr = 1;
  }
  $searchType = $_POST["searchType"];
  $searchText = trim($_POST["searchText"]);
  If ($searchText == "" or $searchText <= 100000) {
        echo "Debe escribir un numero de c&eacute;dula v&aacute;lido ....";
        echo "<br><br><br><a href='../new/facturar.php' class='alt1'>Regresar a Ingresos-Solvencias</a>" ;
        } else {
  
  # remove redundant whitespace
  $searchText = eregi_replace("[[:space:]]+", " ", $searchText);

  if ($searchType == "barcodeNmbr") {
    $sType = OBIB_SEARCH_BARCODE;
  } 

else {
    $sType = OBIB_SEARCH_NAME;
  }

  #****************************************************************************
  #*  Search database
  #****************************************************************************
  $mbrQ = new MemberQuery();
  $mbrQ->setItemsPerPage(OBIB_ITEMS_PER_PAGE);
  $mbrQ->connect();
  $mbrQ->execSearch($sType,$searchText,$currentPageNmbr);

  #**************************************************************************
  #*  Show member view screen if only one result from barcode query
  #**************************************************************************

  if (($sType == OBIB_SEARCH_BARCODE) && ($mbrQ->getRowCount() == 1)) {
    $mbr = $mbrQ->fetchMember();
    $mbrQ->close();


  #**************************************************************************
  #*  si el usuario existe, busca los demas datos
  #**************************************************************************

 $id =  U($mbr->getMbrid());


	$query = "select * from member where mbrid = '$id'";
	$result = mysql_query($query,$connect);


	
	$row=mysql_fetch_array($result);

	if ($result) {
//		$cantidad ++;
//		echo "ID: ".$row["mbrid"]." / ";
//		echo "Cedula: ".$row["barcode_nmbr"]." / ";
//		echo " Nombre: ".$row["last_name"].", ";
//		echo $row["first_name"]." ";
		$mbrid = $row["mbrid"];
		$cedula = $row["barcode_nmbr"];
		$p_nombre = $row["first_name"];
		$apellido = $row["last_name"];
		$nombre = $apellido.", ".$p_nombre;
//		echo "<hr>";
		
		} 



  require_once("../shared/header.php");

?>

<!--**************************************************************************
    *  Javascript to post back to this page
    ************************************************************************** -->



<form name="barcodesearch" method="POST" action="../new/crear_imprimir_factura_solvencia.php">
<table bgcolor="#999999">
  <tr>

  </tr>
  <tr>
    <td >
	C&eacute;dula: <?php echo H($cedula);?>  <br>
	Nombre: <?php echo H($nombre);?> <br>
	Bauche: <INPUT type="text" name="bauche" size="40" > (En caso de dep&oacute;sito bancario) <br>
	RIF: <INPUT type="text" name="rif" size="40" > (RIF en caso que proceda) <br>

	Fecha: <?php echo H($fecha_es);?> <br>

	<input type="hidden" name="cedula" value="<?php echo H($cedula);?>">
	<input type="hidden" name="nombre" value="<?php echo H($nombre);?>">

	<br>
    </td>
  </tr>
</table>


<?php


 
  #**************************************************************************
  #*  Seccion para identificar deudas del usuario
  #**************************************************************************
	$query = "select * from member_account where mbrid = '$mbrid' and transaction_type_cd = '-p' and facturado <> 'F'";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
		$cantidad ++;
		$total = $total+$row["amount"];
		$FILA = $FILA + 1;
	     } while ($row=mysql_fetch_array($result));
	     
	}

$total = -$total;




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

	$balance_deuda = H($bal,2);
    }
  }
  $transQ->close();



  #**************************************************************************


?>

<table bgcolor="#999999"><br>

<br>
  <tr>
******** SOLVENCIAS - Deudas pendientes ***********
  </tr>
  <tr>
<td></td>
    <td >
	Deudas por facturar: <?php echo H($total);?>  Bs.F. <br> Balance pendiente: <?php echo H($balance_deuda);?>Bs.F. <br>
<br>

<table class="primary">

<?php $cant_libros = 0;

if ($id == 0) {} else {

?>

  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrViewOutHdr3"); ?>
    </th>
  </tr>

<?php 

 #****************************************************************************
  #*  Busqueda de libros del usuario
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
      <?php echo $loc->getText("mbrViewNoCheckouts"); ?>
    </td>
  </tr>
<?php
  } else {
    while ($biblio = $biblioQ->fetchRow()) {
?>
  <tr>
   
   
    <td class="primary" valign="top" >
      <?php echo H($biblio->getBarcodeNmbr());?>
    </td>
    
    
  </tr>
<?php
$cant_libros = $cant_libros + 1;
    }
  }
  $biblioQ->close();

}

?>

</table>

<?php echo "Libros pendientes: ".$cant_libros; ?> <br>
<?php  
if ($cant_libros == 0 && $total == 0 && $balance_deuda <= 0) {

?>

	<input type=radio name=solvencia value="1" checked >Solvencia de inscripci&oacute;n<br>
	<input type=radio name=solvencia value="2" >Solvencia de grado<br>
	<input type=radio name=solvencia value="3" >Solvencia de retiro<br>
	<input type="hidden" name="fecha" value="<?php echo H($fecha);?>">
	<input type="hidden" name="fecha_es" value="<?php echo H($fecha_es);?>">

	<hr>
	Costo de la solvencia: <INPUT type="text" name="costosolvencia" size="10" value="<?php echo $costosolvencia; ?>">

      <br><br><input type="submit" value="Generar/Imprimir Factura" class="button">
<?php } else {
echo "<hr>  No se puede emitir la solvencia";
}
?>
 </td>
  </tr>
</table>
</form>
<br>
<a href="../new/facturar.php" class="alt1">Regresar a Ingresos-Solvencias</a>
<?php
require_once("../shared/footer.php");


 }else{


$cedula= H($searchText);

    echo "<br>UNIVERSIDAD DEL ZULIA";
    ECHO "<BR>Sistema de Servicios Bibliotecarios y de Informaci&oacute;n";
    echo "<br>Banco de Libros";
    echo "<br><br><br>El usuario <input type=text name=nombre>, portador de la c&eacute;dula: ".$cedula.", no est&aacute; registrado en el sistema.";
    echo "<br>Por lo tanto, no posee deudas con el Banco de Libros.<br><br><br>";
    echo "<br><br><br><br><br><br>_______________________________ <br>Firma y Sello Autorizado<br><br>";




?>

<br>
  <a href="javascript:self.print()">IMPRIMIR</a><br><br>
<?php

}
  }
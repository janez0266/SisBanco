<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);

  $tab = "circulation";
  $nav = "ingreso_varios";
  require_once("../shared/logincheck.php");
  require_once("../classes/Member.php");
  require_once("../classes/MemberQuery.php");
  require_once("../functions/searchFuncs.php");
  require_once("../classes/DmQuery.php");
  require_once("../classes/Localize.php");

  $id=0;
  $fecha = date("Y-n-d");
  $fecha_es = date("d/n/Y");
  $total_fact = 0;
  $FILA = 1;
  $basetemp = $_POST["basetemp"];

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
  #*  si el usuario existe, busca los demas datos y los muestra
  #**************************************************************************

 $id =  U($mbr->getMbrid());

	$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave);
	mysql_select_db($basedatos,$connect);

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

<form name="barcodesearch" method="POST" action="../new/crear_imprimir_factura_varios.php">
<table bgcolor="#555555">
  <tr>

  </tr>
  <tr>
    <td >
	Cédula: <?php echo H($cedula);?>  <br>
	Nombre: <?php echo H($nombre);?> <br>
	Bauche: <INPUT type="text" name="bauche" size="40" > (En caso de depósito bancario) <br>
	RIF: <INPUT type="text" name="rif" size="40" > (RIF en caso que proceda) <br>
	Fecha: <?php echo H($fecha_es);?> <br>
	<input type="hidden" name="cedula" value="<?php echo H($cedula);?>">
	<input type="hidden" name="nombre" value="<?php echo H($nombre);?>">

	<br>
    </td>
  </tr>
</table>
<?php
  }else{
$cedula= H($searchText);

  #**************************************************************************
  #*  Si el usuario no existe, sale la plantilla en blanco
  #**************************************************************************
  require_once("../shared/header.php");

?>
<br>
<form name="barcodesearch" method="POST" action="../new/crear_imprimir_factura_varios.php">
<table bgcolor="#555555"><br>
   El Usuario no está inscrito. Inserte sus datos completos.
<br>
  <tr>

  </tr>
  <tr>
    <td >
	Cédula: <?php echo H($cedula);?>  <br>
	Nombre: <INPUT type="text" name="nombre"  size="40" > (Nombre completo) <br>
	Bauche: <INPUT type="text" name="bauche"  size="40" > (En caso de depósito bancario) <br>
	RIF: <INPUT type="text" name="rif"  size="40" > (RIF en caso que proceda) <br>
	Fecha: <?php echo H($fecha_es);?>  <br>
	<input type="hidden" name="cedula" value="<?php echo H($cedula);?>">
    </td>
  </tr>
</table>
<br>
<?php 

}
  

?>
<table bgcolor="#555555"><br>
<br>
  <tr>
******** Movimientos a facturar ***********
  </tr>
  <tr>
	<td></td>
    <td >
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
<tr> <td></td> <td align=right> <?php echo "Total a cancelar: ";?> </td><td align=right >  <?php echo $total_fact; ?> </td>
</tr>

</table>

<br>
	<input type="hidden" name="fecha" value="<?php echo H($fecha);?>">
	<input type="hidden" name="fecha_es" value="<?php echo H($fecha_es);?>">
	<input type="hidden" name="basetemp" value="<?php echo H($basetemp);?>">
	<hr>
	
     <br><input type="submit" value="Crear Imprimir Factura" class="button">

 </td>
  </tr>
</table>
</form>
<br>
<a href="../new/facturar_varios.php?destroy=yes&#038;base=<?php echo $basetemp; ?>" class="alt1">Regresar a Ingresos Varios</a>
<?php
require_once("../shared/footer.php"); ?>

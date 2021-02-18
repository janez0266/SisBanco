<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
  require_once("../shared/common.php"); 
  include("../shared/hold_header.php");
  
   require_once("../classes/Member.php");
  require_once("../classes/MemberQuery.php");
$reservas_max = 3;
$veces_reservado = 0;

echo "_______________________<br>";


 if (isset($_POST["page"])) {
    $currentPageNmbr = $_POST["page"];
  } else {
    $currentPageNmbr = 1;
  }


 $searchType = $_POST["searchType"];
  $searchText = trim($_POST["searchText"]);
$libro = $_POST["libro"];  // id del titulo
$copia = $_POST["copia"];  //id del ejemplar
$registro = $_POST["registro"];  // numero de registro del ejemplar
  # remove redundant whitespace
  $searchText = eregi_replace("[[:space:]]+", " ", $searchText);

  if ($searchType == "barcodeNmbr") {
    $sType = OBIB_SEARCH_BARCODE;
  } else {
    $sType = OBIB_SEARCH_NAME;
  }
echo "Cédula usuario: ".$searchText;
echo "<br>";

echo "Registro del Titulo: ".$libro."<br>";
echo "Registro del ejemplar: ".$registro."<br>";



  #****************************************************************************
  #*  Buscar usuario
  #****************************************************************************
  $mbrQ = new MemberQuery();
  $mbrQ->setItemsPerPage(OBIB_ITEMS_PER_PAGE);
  $mbrQ->connect();
  $mbrQ->execSearch($sType,$searchText,$currentPageNmbr);

  #**************************************************************************
  #*  Show member view screen if only one result from barcode query
  #**************************************************************************
  if (($sType == OBIB_SEARCH_BARCODE) && ($mbrQ->getRowCount() == 1)) {  // si se consigue el usuario
    $mbr = $mbrQ->fetchMember();
    $mbrQ->close();
	echo "MbrId: ".U($mbr->getMbrid());
	$mbrid = U($mbr->getMbrid()); ?><br><?php
	echo "Cedula: ".U($mbr->getBarcodeNmbr());?><br><?php
	echo "Nombre: ".$mbr->getFirstName();?><br><?php
	echo "Apellido: ".$mbr->getLastName();?><br><?php

//     comprobar si el usuario no ha exedido la cantidad de reservas estipuladas
	$query = "select * from biblio_copy where mbrid='$mbrid' and status_cd='hld'";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
	    }
	    do {
	
		$veces_reservado = $veces_reservado + 1;
		 } while ($row=mysql_fetch_array($result));
	     
	} 

	if($veces_reservado >= $reservas_max){
		echo "<br><br>.............Usuario ya exedió el máximo permitido.....Reservación FALLIDA......"; }

	else {


     //Procedimiento para apartar el ejemplar 
	$fecha_reser = date("Y-m-d H:i:s");
	echo "Fecha reserva: ".$fecha_reser;
//  Verificar si el ejemplar no esta reservado
	$query = "select * from biblio_copy where barcode_nmbr='$registro' and status_cd='hld'";
	$result = mysql_query($query,$connect);

//	if ($result) {   
	if ($row=mysql_fetch_array($result)){
			echo "<br><br>.............El ejemplar ya está reservado.....Reservación FALLIDA.......<br>";
						
	} else {

         // agregar a la basde de datos de reserva
		$query = "insert into biblio_hold (bibid,copyid,hold_begin_dt,mbrid) values ('$libro','$copia','$fecha_reser','$mbrid')";
		$result = mysql_query($query,$connect);
		
		if ($result) {   echo "<br><br>...........Reservación Exitosa............";
			$veces_reservado = $veces_reservado + 1;	
			
		} else {
			$html.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base Factura</td></tr>";
			$html.="</table>";
			print($html);
		}

		// cambiar atributo a la base de datos del ejemplar del libro.

		$query = "update biblio_copy set status_cd='hld',mbrid='$mbrid',status_begin_dt='$fecha_reser',renewal_count='$veces_reservado' where barcode_nmbr='$registro'";
		$result = mysql_query($query,$connect);
			if ($result) {

			} else {
			echo "<br><br><b><center><b>Error al modificar el Registro...</center></b><br>";
			}
		}
	}	

 } else { echo "<br><br>.............Usuario no inscrito.....Reservación FALLIDA......"; };


echo "<br>Cantidad actual de Libros Reservados: ".$veces_reservado."<br>";

?>

<br><br><a href="../opac/index.php">Volver al Catálogo</a><br>
<?php
  if (ereg('^[a-zA-Z0-9_]+$', $page)) {
    include("../locale/".OBIB_LOCALE."/help/".$page.".php");
  }
  include("../shared/help_footer.php");
?>

<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */

  require_once("../shared/common.php");
  session_cache_limiter(null);

 $tab = "circulation";
  $nav = "account";



  $focus_form_name = "accttransform";
  $focus_form_field = "transactionTypeCd";


 require_once("../functions/inputFuncs.php");
  require_once("../functions/formatFuncs.php");
  require_once("../shared/logincheck.php");
  require_once("../shared/get_form_vars.php");
  require_once("../classes/MemberAccountTransaction.php");
  require_once("../classes/MemberAccountQuery.php");
  require_once("../classes/Localize.php");


  $loc = new Localize(OBIB_LOCALE,$tab);

  $lookup = "N";
  if (isset($_GET["lookup"])) {
    $lookup = "Y";
    $helpPage = "opacLookup";
  }
  require_once("../shared/header_opac.php");





?>

<h1><?php echo "Modulo de Facturacion";?></h1>
<?php echo $loc->getText("opac_WelcomeMsg");




  $mbrid = $_POST["mbrid"];
  $cedula = $_POST["cedula"];

 $nombre = $_POST["nombre"];
 $apellido = $_POST["apellido"];
 $bauche = $_POST["bauche"];



?>

<br>

<br> 
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "ID del Usuario: ".$mbrid;?><br>
      <?php echo "nombre: ".$nombre;?><br>
      <?php echo "Apellido: ".$apellido;?><br>
      <?php echo "Cedula: ".$cedula;?><br>
      <?php echo "Bauche: ".$bauche;?><br>

    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
     
    </td>
  </tr>
</table>

<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "userID"; ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Descripcion"; ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Monto"; ?>
    </th>
    
  </tr>



<?php
	$total = 0;
	$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave);
	mysql_select_db($basedatos,$connect);
	
	$query = "select * from member_account where mbrid = '$mbrid' and transaction_type_cd = '-p' and facturado <> 'F'";
	$result = mysql_query($query,$connect);
	if ($row=mysql_fetch_array($result)){
	 
	    mysql_field_seek($result,0);
	    while ($field=mysql_fetch_field($result)){
		
	    }
	   		
	    do {
		
		$cantidad ++;
	
?>

 <tr>

    <td class="primary" valign="top" >
      <?php echo $row["mbrid"];?>
    </td>
    <td class="primary" valign="top" >
      <?php echo $row["description"];?>
    </td>
    <td class="primary" valign="top" >
      <?php echo $row["amount"];?>
    </td>
    
  </tr>


	 <?php $total = $total+$row["amount"];?>	

<?
	     } while ($row=mysql_fetch_array($result));
	     
	}






	$query = "update member_account set facturado='F' where mbrid = '$mbrid' and transaction_type_cd = '-p'";
		$result = mysql_query($query,$connect);
		if ($result) {
			//echo "<br><br><b><center>Registro Modificado.</center></b><br>";
			//echo "<p align='center'><br><br><b>Para Modificar Otro Registro...<br><br><a href='mantencomponentes.html'>[ Continuar ]</a></b></p>";
		} else {
			echo "<br><br><b><center><b>Error al modificar el Registro...</center></b><br>";
			}




?>


</table><br>

<?php echo "Total a cancelar: ".$total." Bs.F.";?>
<?php include("../shared/footer.php"); ?>

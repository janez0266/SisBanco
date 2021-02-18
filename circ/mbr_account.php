<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
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

  $cedula = $_GET["cedula"];

 $nombre = $_GET["nombre"];
 $apellido = $_GET["apellido"];

  #****************************************************************************
  #*  Loading a few domain tables into associative arrays
  #****************************************************************************
  $dmQ = new DmQuery();
  $dmQ->connect();
  $mbrClassifyDm = $dmQ->getAssoc("transaction_type_dm");
  $dmQ->close();

  #****************************************************************************
  #*  Show transaction input form
  #****************************************************************************
  require_once("../shared/header.php");
?>

<table bgcolor="#888888">

  <tbody>
    <tr>
      <td>

<?php echo $msg ?>

<form name="accttransform" method="POST" action="../circ/mbr_transaction.php">
<table class="primary">
  <tr>
    <th colspan="2" valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountLabel"); ?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo $loc->getText("mbrAccountTransTyp"); ?>
    </td>
    <td valign="top" class="primary">
      <?php printSelect("transactionTypeCd","transaction_type_dm",$postVars); ?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("mbrAccountDesc"); ?>
    </td>
    <td valign="top" class="primary">
      <?php //printInputText("description",40,128,$postVars,$pageErrors); ?>

<select name="description" onChange="modified=true" >
<option value="Pago por devolucion" selected>Pago por devolucion</option>
<option value="Abono a Deudas Actuales" >Abono a Deudas Actuales</option>
<option value="Abono Inicial sobre Alquiler de libros">Abono Inicial sobre Alquiler de libros</option>
<option value="Pago total de la deuda pendiente">Pago total de la deuda pendiente</option>
<option value="Cargos por daños al material devuelto">Cargos por daños al material devuelto</option>
<option value="Cargos por Devolución sistema anterior" >Cargos por Devolución sistema anterior</option>
<option value="Cargos por conceptos varios" >Cargos por conceptos varios</option>
</select>


    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">

      <?php echo $loc->getText("mbrAccountAmount"); ?>
    </td>
    <td valign="top" class="primary">
      <?php printInputText("amount",12,12,$postVars,$pageErrors); ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="primary" valign="top" align="center">
      <input type="submit" value="  <?php echo $loc->getText("circAdd"); ?>  " class="button">
    </td>
  </tr>
</table>
<input type="hidden" name="mbrid" value="<?php echo H($mbrid);?>">
<input type="hidden" name="cedula" value="<?php echo H($cedula);?>">
<input type="hidden" name="nombre" value="<?php echo H($nombre);?>">
<input type="hidden" name="apellido" value="<?php echo H($apellido);?>">
</form>
</td>
<td>Añadir solo transacciones de pago de devoluciones de alquileres y abonos a deudas. No se deben registrar ingresos por otros conceptos como Solvencias, plastificados, carnets, y otros.<br>

</td>
</tr>
</tbody>
</table>

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

?>

<h1><?php echo $loc->getText("mbrAccountHead1"); ?></h1>
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountHdr1"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountHdr2"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountHdr3"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountHdr4"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountHdr5"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("mbrAccountHdr6"); ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Facturado"; ?>
    </th>
  </tr>

<?php
  if ($transQ->getRowCount() == 0) {
?>
  <tr>
    <td class="primary" align="center" colspan="6">
      <?php echo $loc->getText("mbrAccountNoTrans"); ?>
    </td>
  </tr>
<?php
  } else {
    $bal = 0;
    ?>$
    <tr><td class="primary" colspan="5"><?php echo $loc->getText("mbrAccountOpenBal"); ?></td><td class="primary"><?php echo H(moneyFormat($bal,2));?></td></tr>

    <?php
    while ($trans = $transQ->fetchRow()) {
      $bal = $bal + $trans->getAmount();
?>
  <tr>
    <td class="primary" valign="top" >
    <a href="../circ/mbr_transaction_del_confirm.php?mbrid=<?php echo HURL($mbrid);?>&amp;transid=<?php echo HURL($trans->getTransid());?>"><?php echo $loc->getText("mbrAccountDel");?></a>  
    </td>
    <td class="primary" valign="top" >
      <?php echo H($trans->getCreateDt());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($trans->getTransactionTypeDesc());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($trans->getDescription());?>
    </td>
    <td class="primary" valign="top" >
      <?php echo H($trans->getAmount(),2);?>
    </td>
    <td class="primary" valign="top" >
<!--      <?php echo H($bal,2);?> -->
          <?php echo H(moneyFormat($bal,2));?>
	<?php $deuda_total = H(moneyFormat($bal,2));?>
    </td>
    <td class="primary" valign="top" >
      <?php
       // procedimiento para ocultar la "N" en el campo Facturado si es un //cargo
      $cero=0;
       if ($trans->getAmount()<- 0) {
    echo H($trans->getfacturado());
  } 
      ?>
      
      
    </td>
  </tr>

<?php
    }
  }
  $transQ->close();



	$total = 0;


#******************************************************************************
#*  Busqueda de los demas datos del usuario
#****************************************************************************

	$query = "select * from member where mbrid = '$mbrid'";
	$result = mysql_query($query,$connect);


	
	$row=mysql_fetch_array($result);

	if ($result) {
		$cantidad ++;
		echo "Cedula: ".$row["barcode_nmbr"]." / ";
		echo " Nombre: ".$row["last_name"].", ";
		echo $row["first_name"]." ";
		$cedula = $row["barcode_nmbr"];
		$nombre = $row["first_name"];
		$apellido = $row["last_name"];
		echo "<hr>";
		
		} 


#******************************************************


$fecha = date("Y-n-d");
$fecha_es = date("d/n/Y");
//$fecha = date("d-n-Y");


?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="primary" valign="top">Total Deuda:</td>
		<td class="primary" valign="top"><?php echo $deuda_total; ?></td>.
	</tr>
</table>
<br>

Nota:<br> 
- Un Saldo positivo en la columna BALANCE representa la deuda del usuario 
mientras que un saldo negativo representa monto a favor del usuario.<br>
- Los Pagos que hagan los Usuarios se representan con signo negativo en la columna CANTIDAD<br>
- Los cargos o deudas asignadas al Usuario se representan con signo positivo en la columna CANTIDAD
<br>
<br>



<table bgcolor="#888888">

  <tbody>
    <tr>
      <td>





<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "ID"; ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Descripcion"; ?>
    </th>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Monto"; ?>
    </th>
    
  </tr>



<?php
$FILA = 1;

#******************************************************************************
#*  Busqueda de transacciones para su facturacion
#****************************************************************************

	
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
      <?php echo $FILA;?>
    </td>
    <td class="primary" valign="top" >
      <?php echo $row["description"];?>
    </td>
    <td class="primary" valign="top" >
      <?php echo -$row["amount"];?>
    </td>
    
  </tr>


	 <?php $total = $total+$row["amount"];?>	

<?
	$FILA = $FILA + 1;
	     } while ($row=mysql_fetch_array($result));
	     
	}



$total = -$total;

?>


</table><br>

<?php echo "Total a cancelar: ".$total." Bs.F.";?>


</td>
<td>


<form name="Facturar" method="POST" action="../new/crear_imprimir_factura.php">
<table class="primary">
  <tr>
    <th colspan="2" valign="top" nowrap="yes" align="left">
      <?php echo "Datos para generar la Factura"; ?>
    </td>
  </tr>
 
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo "Usuario ID"; ?>
    </td>
    <td valign="top" class="primary">
      <?php echo $mbrid; ?>
    </td>
  </tr>

  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo "Cedula: "; ?>
    </td>
    <td valign="top" class="primary">
      <?php echo $cedula; ?>
    </td>
  </tr>

  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo "Nombre: "; ?>
    </td>
    <td valign="top" class="primary">
      <?php echo $nombre; ?>
    </td>
  </tr>

  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo "Apellido"; ?>
    </td>
    <td valign="top" class="primary">
      <?php echo $apellido; ?>
    </td>
  </tr>

 <tr>
    <td nowrap="true" class="primary">
      <?php echo "Nro Bauche"; ?>
    </td>
    <td valign="top" class="primary">
    <input type=text name=bauche value=0>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo "Fecha"; ?>
    </td>
    <td valign="top" class="primary">
      <?php echo $fecha_es; ?>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="primary" valign="top" align="center">
 
<input type="hidden" name="mbrid" value="<?php echo H($mbrid);?>">
<input type="hidden" name="cedula" value="<?php echo H($cedula);?>">
<input type="hidden" name="nombre" value="<?php echo H($nombre);?>">
<input type="hidden" name="apellido" value="<?php echo H($apellido);?>">
<input type="hidden" name="fecha" value="<?php echo H($fecha);?>">
<input type="hidden" name="fecha_es" value="<?php echo H($fecha_es);?>">


<?php  if ($total == 0) {  

echo "No hay datos para Facturar";


} else { 

 echo "<input type=submit value='ELABORAR E IMPRIMIR FACTURA' class=button>";
//echo "<input type=button value='ELABORAR E IMPRIMIR FACTURA' onclick='loadApp()'>";

 } 


?>
    </td>
  </tr>
</table>


</form>

</td>
    </tr>
  </tbody>
</table>


<?php require_once("../shared/footer.php"); ?>

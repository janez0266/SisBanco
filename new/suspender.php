<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);
  $tab = "circulation";
  $nav = "suspencion";
  $helpPage = "checkin";
  $focus_form_name = "barcodesearch";
  $focus_form_field = "searchText";

  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

$entrada=date("d/m/Y");
//  $entrada = $_POST["entrada"];

  $salida = $_POST["salida"];


?>



<script type="text/javascript" >

function seleccionaFecha(dd, mm, aa)	{
	var fecha = new Date();
	fecha.setDate(dd);
	fecha.setMonth(mm - 1);
	fecha.setFullYear(aa);
	var Semana = ["Dominago","Lunes","Martes","Miércoles","Jueves","Viernes","Sabado"];
	var mes = ",enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre".split(",");
	cadena = Semana[fecha.getDay()] + " " + dd + " de " + mes[mm] + " de " + aa;
	document.forms.salida.comentario.value = cadena;
}



var campoDestino;
var formDestino;
function leerDestino()	{
	url = location.search.substr(1).split("=");
	Destino = url[1].split(".");
	formDestino = Destino[0];
	campoDestino = Destino[1];
}
window.onload = leerDestino;

// "seleccionaFecha" debe ser el cuarto parámetro del calendario.
function seleccionaFecha(dd, mm, aa)	{
	if (opener)	{
		opener.document.forms[formDestino][campoDestino].value = dd + "/" + mm + "/" + aa;
		window.close();
	}
	else	alert("año: " + aa + "\nmes: " + mm + "\ndia: " + dd);
}



<!--
_hoy = new Date();
document.writeln(calendar(_hoy.getMonth(), _hoy.getFullYear(), "calendario1", "seleccionaFecha"));
//-->
</script>

<body
onload="_ya = new Date();
 calendario(	_ya.getMonth(),
		_ya.getFullYear(),
		'calendario',
		'otrasFechas',
		false,
		'seleccionandoFecha')" >






<h1><img src="../images/circ.png" border="0" width="30" height="30" align="top"> Módulo de Suspensión de Usuarios con problemas</h1>
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("indexCardHdr"); ?>
    </th>
  </tr>
  <tr>
    <td nowrap="true" class="primary">

<form name="ej" method="post" action="../new/suspender_2.php">
      <?php echo $loc->getText("indexCard"); ?>

      <input type="text" name="cedula" size="20" maxlength="20"><br><br>Problema: 
      <input type="text" name="problema" size="50" maxlength="100"><br><br><br> Desde: <?php echo H($entrada);?>
	<input type="hidden" name="entrada"  value="<?php echo H($entrada);?>" >
	 --> Hasta <input type="text" name="salida" size="10" maxlength="10" >
	<button type="button"  onclick="window.open('popup.html?destino=ej.salida', '_blank', 'width=264,height=167')">
	Cal</button>
      <hr><center><input type="submit" value="<?php echo "Suspender"; ?>" class="button"></center>
    </td>
  </tr>
</table>
</form>




<?php include("../shared/footer.php"); ?>

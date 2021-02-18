<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);
  $tab = "reports";
  $nav = "contabilidad";

 // $fecha = date("Y-m-d");
$fecha = date("d/m/Y");
  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

?>

<h1><img src="../images/circ.png" border="0" width="30" height="30" align="top"> Módulo de Contabilidad - Informe de ingresos</h1>


<form name="barcodesearch" method="POST" action="../new/crear_imprimir_reporte_diario.php">
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo "Imprimir reportes diarios"; ?>
    </th>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo "Fecha: "; ?>
      <input type="text" name="fecha" size="20" maxlength="20" value=<?php echo $fecha; ?> >
      <input type="hidden" name="searchType" value="barcodeNmbr">
      <input type="submit" value="Buscar" class="button">
    </td>
  </tr>
</table>
</form>




<?php include("../shared/footer.php"); ?>

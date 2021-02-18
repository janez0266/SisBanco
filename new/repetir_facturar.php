<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  session_cache_limiter(null);
  $tab = "circulation";
  $nav = "repetir_factura";
  $helpPage = "checkin";
  $focus_form_name = "barcodesearch";
  $focus_form_field = "searchText";

  require_once("../shared/logincheck.php");
  require_once("../shared/header.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);

?>

<h1><img src="../images/circ.png" border="0" width="30" height="30" align="top"> Módulo de Facturación - Repetir e imprimir facturas (Solo del año en curso)</h1>
<form name="barcodesearch" method="POST" action="../new/imprimir_repetir_factura.php">
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      <?php echo $loc->getText("Indique el numero de la factura a repetir"); ?>
    </th>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      <?php echo $loc->getText("Factura"); ?>
      <input type="text" name="factura" size="20" maxlength="20">
      <input type="hidden" name="searchType" value="barcodeNmbr">
      <input type="submit" value="<?php echo $loc->getText("indexSearch"); ?>" class="button">
    </td>
  </tr>
</table>
</form>




<?php include("../shared/footer.php"); ?>
<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  
  #****************************************************************************
  #*  Checking for get vars.  Go back to form if none found.
  #****************************************************************************
  if (count($_GET) == 0) {
    header("Location: ../catalog/index.php");
    exit();
  }


  #****************************************************************************
  #*  Checking for tab name to show OPAC look and feel if searching from OPAC
  #****************************************************************************
  if (isset($_GET["tab"])) {
    $tab = $_GET["tab"];
  } else {
    $tab = "cataloging";
  }




  if ($tab != "opac") {
    require_once("../shared/logincheck.php");
  }
  require_once("../classes/Biblio.php");
  require_once("../classes/BiblioQuery.php");
  require_once("../classes/BiblioCopy.php");
  require_once("../classes/BiblioCopyQuery.php");
  require_once("../classes/DmQuery.php");
  require_once("../classes/UsmarcTagDm.php");
  require_once("../classes/UsmarcTagDmQuery.php");
  require_once("../classes/UsmarcSubfieldDm.php");
  require_once("../classes/UsmarcSubfieldDmQuery.php");
  require_once("../functions/marcFuncs.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,"shared");


  #****************************************************************************
  #*  Retrieving get var
  #****************************************************************************
  $bibid = $_GET["bibid"];
  $reg   = $_GET["reg"];


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
  $collectionDm = $dmQ->getAssoc("collection_dm");
  $materialTypeDm = $dmQ->getAssoc("material_type_dm");
  $biblioStatusDm = $dmQ->getAssoc("biblio_status_dm");
  $dmQ->close();

  $marcTagDmQ = new UsmarcTagDmQuery();
  $marcTagDmQ->connect();
  if ($marcTagDmQ->errorOccurred()) {
    $marcTagDmQ->close();
    displayErrorPage($marcTagDmQ);
  }
  $marcTagDmQ->execSelect();
  if ($marcTagDmQ->errorOccurred()) {
    $marcTagDmQ->close();
    displayErrorPage($marcTagDmQ);
  }
  $marcTags = $marcTagDmQ->fetchRows();
  $marcTagDmQ->close();

  $marcSubfldDmQ = new UsmarcSubfieldDmQuery();
  $marcSubfldDmQ->connect();
  if ($marcSubfldDmQ->errorOccurred()) {
    $marcSubfldDmQ->close();
    displayErrorPage($marcSubfldDmQ);
  }
  $marcSubfldDmQ->execSelect();
  if ($marcSubfldDmQ->errorOccurred()) {
    $marcSubfldDmQ->close();
    displayErrorPage($marcSubfldDmQ);
  }
  $marcSubflds = $marcSubfldDmQ->fetchRows();
  $marcSubfldDmQ->close();


  #****************************************************************************
  #*  Search database
  #****************************************************************************
  $biblioQ = new BiblioQuery();
  $biblioQ->connect();
  if ($biblioQ->errorOccurred()) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  if (!$biblio = $biblioQ->doQuery($bibid)) {
    $biblioQ->close();
    displayErrorPage($biblioQ);
  }
  $biblioFlds = $biblio->getBiblioFields();

  #**************************************************************************
  #*  Show bibliography info.
  #**************************************************************************
  if ($tab == "opac") {
    require_once("../shared/header_opac.php");
  } else {
    require_once("../shared/header.php");
  }
//           echo "ID: ". $bibid;

echo "<h3>  Reserva de libros: Ejecute solo si va a reservar el ejemplar:</h3> ";

?>

<?php echo $msg ?>
<table class="primary">
  <tr>
    <th align="left" colspan="2" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble1Hdr"); ?>:
    </th>
  </tr>
  <tr>	
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("biblioViewMaterialType"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php echo H($materialTypeDm[$biblio->getMaterialCd()]);?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("biblioViewCollection"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php echo H($collectionDm[$biblio->getCollectionCd()]);?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php echo $loc->getText("biblioViewCallNmbr"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php echo H($biblio->getCallNmbr1()); ?>
      <?php echo H($biblio->getCallNmbr2()); ?>
      <?php echo H($biblio->getCallNmbr3()); ?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php printUsmarcText(245,"a",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["245a"])) echo H($biblioFlds["245a"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php printUsmarcText(245,"b",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["245b"])) echo H($biblioFlds["245b"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td class="primary" valign="top">
      <?php printUsmarcText(100,"a",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["100a"])) echo H($biblioFlds["100a"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php printUsmarcText(245,"c",$marcTags, $marcSubflds, FALSE);?>:
    </td>
    <td valign="top" class="primary">
      <?php if (isset($biblioFlds["245c"])) echo H($biblioFlds["245c"]->getFieldData());?>
    </td>
  </tr>
  <tr>
    <td nowrap="true" class="primary" valign="top">
      <?php echo $loc->getText("biblioViewOpacFlg"); ?>:
    </td>
    <td valign="top" class="primary">
      <?php if ($biblio->showInOpac()) {
        echo $loc->getText("biblioViewYes");
      } else {
        echo $loc->getText("biblioViewNo");
      }?>
    </td>
  </tr>
</table>
<br />





<?php
  #****************************************************************************
  #*  Show copy information
  #****************************************************************************
  if ($tab == "cataloging") { ?>
    <a href="../catalog/biblio_copy_new_form.php?bibid=<?php echo HURL($bibid);?>&reset=Y">
      <?php echo $loc->getText("biblioViewNewCopy"); ?></a><br/>
    <?php
    $copyCols=7;
  } else {
    $copyCols=5;
  }

  $copyQ = new BiblioCopyQuery();
  $copyQ->connect();
  if ($copyQ->errorOccurred()) {
    $copyQ->close();
    displayErrorPage($copyQ);
  }
  if (!$copy = $copyQ->execSelect($bibid)) {
    $copyQ->close();
    displayErrorPage($copyQ);
  }
?>

<h1><?php echo $loc->getText("biblioViewTble2Hdr"); ?>:</h1>
<table class="primary">
  <tr>
    <?php if ($tab == "cataloging") { ?>
      <th colspan="2" nowrap="yes">
        <?php echo $loc->getText("biblioViewTble2ColFunc"); ?>
      </th>
    <?php } ?>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col1"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col2"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col3"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col4"); ?>
    </th>
    <th align="left" nowrap="yes">
      <?php echo $loc->getText("biblioViewTble2Col5"); ?>
    </th>
  </tr>
  <?php
    if ($copyQ->getRowCount() == 0) { ?>
      <tr>
        <td valign="top" colspan="<?php echo H($copyCols); ?>" class="primary" colspan="2">
          <?php echo $loc->getText("biblioViewNoCopies"); ?>
        </td>
      </tr>      
    <?php } else {
      $row_class = "primary";
 
     while ($copy = $copyQ->fetchCopy()) {     // *** hay que ubicar el registro dado
If (H($copy->getBarcodeNmbr()) == $reg) {
  ?>
    <tr>
     
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getBarcodeNmbr()); ?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getCopyDesc()); ?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>"> 
        <?php echo H($biblioStatusDm[$copy->getStatusCd()]); // variable del estado del libro. Verificar si esta disponible para apartarlo
?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getStatusBeginDt()); ?>
      </td>
      <td valign="top" class="<?php echo H($row_class);?>">
        <?php echo H($copy->getDueBackDt()); ?>
      </td>
    </tr>      
  <?php 
$copyid = H($copy->getCopyid());

}
        # swap row color
        if ($row_class == "primary") {
          $row_class = "alt1";
        } else {
          $row_class = "primary";
        }
      }

 //echo $reg;               nro de registro del ejemplar
//echo $copyid;             id del ejemplar
      $copyQ->close();
    } ?>
</table>
<br>
Se requiere el numero de su cedula para poder apartar el ejemplar:<b> <?echo $reg;?></b>

<br />

<h1><img src="../images/circ.png" border="0" width="30" height="30" align="top"> RESERVA</h1>
<form name="barcodesearch" method="POST" action="../new/hold_view.php">
<table class="primary">
  <tr>
    <th valign="top" nowrap="yes" align="left">
      Buscar Usuario por numero de Cedula:    </th>
  </tr>
  <tr>
    <td nowrap="true" class="primary">
      Numero de Cedula:      
      <input type="text" name="searchText" size="20" maxlength="20">
      <input type="hidden" name="searchType" value="barcodeNmbr">
      <input type="hidden" name="registro" value="<?php echo $reg;?>">
      <input type="hidden" name="libro" value="<?php echo $bibid;?>">
      <input type="hidden" name="copia" value="<?php echo $copyid;?>"> 
      <input type="submit" value="Buscar y Reservar" class="button">
    </td>
  </tr>
</table>
</form>


<?php require_once("../shared/footer.php"); ?>

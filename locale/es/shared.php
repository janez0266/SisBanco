<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
/**********************************************************************************
 *   Instructions for translators:
 *
 *   All gettext key/value pairs are specified as follows:
 *     $trans["key"] = "<php translation code to set the $text variable>";
 *   Allowing translators the ability to execute php code withint the transFunc string
 *   provides the maximum amount of flexibility to format the languange syntax.
 *
 *   Formatting rules:
 *   - Resulting translation string must be stored in a variable called $text.
 *   - Input arguments must be surrounded by % characters (i.e. %pageCount%).
 *   - A backslash ('\') needs to be placed before any special php characters 
 *     (such as $, ", etc.) within the php translation code.
 *
 *   Simple Example:
 *     $trans["homeWelcome"]       = "\$text='Welcome to OpenBiblio';";
 *
 *   Example Containing Argument Substitution:
 *     $trans["searchResult"]      = "\$text='page %page% of %pages%';";
 *
 *   Example Containing a PHP If Statment and Argument Substitution:
 *     $trans["searchResult"]      = 
 *       "if (%items% == 1) {
 *         \$text = '%items% result';
 *       } else {
 *         \$text = '%items% results';
 *       }";
 *
 **********************************************************************************
 */

#****************************************************************************
#*  Common translation text shared among multiple pages
#****************************************************************************
$trans["sharedCancel"]             = "\$text = 'Cancelar';";
$trans["sharedDelete"]             = "\$text = 'Borrar';";

#****************************************************************************
#*  Translation text for page biblio_view.php
#****************************************************************************
$trans["biblioViewTble1Hdr"]        = "\$text = 'Informaci�n bibliogr�fica';";
$trans["biblioViewMaterialType"]   = "\$text = 'Tipo de material';";
$trans["biblioViewCollection"]     = "\$text = 'Colecci�n';";
$trans["biblioViewCallNmbr"]       = "\$text = 'Signatura';";
$trans["biblioViewTble2Hdr"]       = "\$text = 'Informaci�n de la copia bibliogr�fica';";
$trans["biblioViewTble2Col1"]      = "\$text = 'C�digo de barras #';";
$trans["biblioViewTble2Col2"]      = "\$text = 'Descripci�n';";
$trans["biblioViewTble2Col3"]      = "\$text = 'Estado';";
$trans["biblioViewTble2Col4"]      = "\$text = 'Estado Dt';";
$trans["biblioViewTble2Col5"]      = "\$text = 'Fecha de devoluci�n';";
$trans["biblioViewTble2ColFunc"]   = "\$text = 'Funci�n';";
$trans["biblioViewTble2Coldel"]    = "\$text = 'borrar';";
$trans["biblioViewTble2Coledit"]   = "\$text = 'editar';";
$trans["biblioViewTble3Hdr"]        = "\$text = 'Informaci�n bibliogr�fica adicional';";
$trans["biblioViewNoAddInfo"]      = "\$text = 'No existe informaci�n bibliogr�fica adicional disponible.';";
$trans["biblioViewNoCopies"]       = "\$text = 'No se han creado copias.';";
$trans["biblioViewOpacFlg"]        = "\$text = 'Mostrar en OPAC';";
$trans["biblioViewNewCopy"]        = "\$text = 'A�adir nueva copia';";
$trans["biblioViewNeweCopy"]       = "\$text = 'A�adir nueva copia electr�nica';";
$trans["biblioViewYes"]            = "\$text = 's�';";
$trans["biblioViewNo"]             = "\$text = 'no';";

#****************************************************************************
#*  Translation text for page biblio_search.php
#****************************************************************************
$trans["biblioSearchNoResults"]    = "\$text = 'No se han encontrado registros.';";
$trans["biblioSearchResults"]      = "\$text = 'Resultados de la b�squeda';";
$trans["biblioSearchResultPages"]  = "\$text = 'P�ginas de resultados';";
$trans["biblioSearchPrev"]         = "\$text = 'anterior';";
$trans["biblioSearchNext"]         = "\$text = 'siguiente';";
$trans["biblioSearchResultTxt"]    = "if (%items% == 1) {
                                        \$text = '%items% resultado encontrado.';
                                      } else {
                                        \$text = '%items% resultado encontrado';
                                      }";
$trans["biblioSearchauthor"]       = "\$text = ' ordenados por autor';";
$trans["biblioSearchtitle"]        = "\$text = ' ordenados por t�tulo';";
$trans["biblioSearchSortByAuthor"] = "\$text = 'ordenados por autor';";
$trans["biblioSearchSortByTitle"]  = "\$text = 'ordenados por t�tulo';";
$trans["biblioSearchTitle"]        = "\$text = 'T�tulo';";
$trans["biblioSearchAuthor"]       = "\$text = 'Autor';";
$trans["biblioSearchMaterial"]     = "\$text = 'Material';";
$trans["biblioSearchCollection"]   = "\$text = 'Colecci�n';";
$trans["biblioSearchCall"]         = "\$text = 'Signatura';";
$trans["biblioSearchCopyBCode"]    = "\$text = 'C�digo de copia';";
$trans["biblioSearchCopyStatus"]   = "\$text = 'Estado';";
$trans["biblioSearchNoCopies"]     = "\$text = 'No hay ninguna copia disponible.';";
$trans["biblioSearchHold"]         = "\$text = 'mantener';";
$trans["biblioSearchOutIn"]        = "\$text = 'desactivar / activar';";
$trans["biblioSearchDetail"]       = "\$text = 'Mostrar la informaci�n bibliogr�fica detallada';";
$trans["biblioSearchBCode2Chk"]    = "\$text = 'C�digo para desactivar o activar formularios';";
$trans["biblioSearchBCode2Hold"]   = "\$text = 'C�digo para mantener el formulario';";

#****************************************************************************
#*  Translation text for page loginform.php
#****************************************************************************
$trans["loginFormTbleHdr"]         = "\$text = 'Entrada para administradores';";
$trans["loginFormUsername"]        = "\$text = 'Nombre de usuario';";
$trans["loginFormPassword"]        = "\$text = 'Contrase�a';";
$trans["loginFormLogin"]           = "\$text = 'Entrar';";

#****************************************************************************
#*  Translation text for page hold_del_confirm.php
#****************************************************************************
$trans["holdDelConfirmMsg"]        = "\$text = '�Est�s seguro de querer borrar esta solicitud de pr�stamo?';";

#****************************************************************************
#*  Translation text for page hold_del.php
#****************************************************************************
$trans["holdDelSuccess"]           = "\$text='La solicitud de pr�stamo se borr� correctamente.';";

#****************************************************************************
#*  Translation text for page help_header.php
#****************************************************************************
$trans["helpHeaderTitle"]          = "\$text='Ayuda de OpenBiblio';";
$trans["helpHeaderCloseWin"]       = "\$text='Cerrar ventana';";
$trans["helpHeaderContents"]       = "\$text='Contenidos';";
$trans["helpHeaderPrint"]          = "\$text='Imprimir';";
$trans["catalogResults"]           = "\$text='Resultados de b�squeda';";

#****************************************************************************
#*  Translation text for page header.php and header_opac.php
#****************************************************************************
$trans["headerTodaysDate"]         = "\$text='Fecha:';";
$trans["headerDateFormat"]         = "\$text='d.m.Y';";
$trans["headerLibraryHours"]       = "\$text='Horario:';";
$trans["headerLibraryPhone"]       = "\$text='Tel�fono:';";
$trans["headerHome"]               = "\$text=' Inicio ';";
$trans["headerCirculation"]        = "\$text=' Pr�stamo ';";
$trans["headerCataloging"]         = "\$text=' Catalogaci�n ';";
$trans["headerAdmin"]              = "\$text=' Administraci�n ';";
$trans["headerReports"]            = "\$text=' Informes ';";

#****************************************************************************
#*  Translation text for page footer.php
#****************************************************************************
$trans["footerLibraryHome"]        = "\$text='Biblioteca';";
$trans["footerOPAC"]               = "\$text='OPAC';";
$trans["footerHelp"]               = "\$text='Ayuda';";
$trans["footerPoweredBy"]          = "\$text='Impulsado por OpenBiblio';";
$trans["footerDatabaseVersion"]    = "\$text='Versi�n de la base de datos';";
$trans["footerCopyright"]          = "\$text='Copyright';";
$trans["footerUnderThe"]           = "\$text='bajo';";
$trans["footerGPL"]                = "\$text='Licencia P�blica General GNU';";

?>

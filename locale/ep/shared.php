<?php
/* Este archivo es parte de un trabajo protegido por derechos de autor, Se distribuye SIN GARANTIA.
 * Vea el archivo COPYRIGHT.html para m�s detalles.
 * EspaBiblio Versi�n 2.0 Basado en OpenBiblio 0.6.0<br />
 * Jorge Lara Cravero, Chile
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
$trans["biblioViewTble1Hdr"]       = "\$text = 'Informaci�n bibliogr�fica';";
$trans["biblioViewMaterialType"]   = "\$text = 'Tipo de material';";
$trans["biblioViewCollection"]     = "\$text = 'Colecci�n';";
$trans["biblioViewCallNmbr"]       = "\$text = 'N�mero de entrada';";
$trans["biblioViewTble2Hdr"]       = "\$text = 'Informaci�n de la copia bibliogr�fica';";
$trans["biblioViewTble2Col1"]      = "\$text = 'C�digo de barras #';";
$trans["biblioViewTble2Col2"]      = "\$text = 'Descripci�n';";
$trans["biblioViewTble2Col3"]      = "\$text = 'Estado';";
$trans["biblioViewTble2Col4"]      = "\$text = 'Estado Dt';";
$trans["biblioViewTble2Col5"]      = "\$text = 'Fecha de devoluci�n';";
$trans["biblioViewTble2ColFunc"]   = "\$text = 'Funci�n';";
$trans["biblioViewTble2Coldel"]    = "\$text = 'Borrar';";
$trans["biblioViewTble2Coledit"]   = "\$text = 'Editar';";
$trans["biblioViewTble3Hdr"]       = "\$text = 'Informaci�n bibliogr�fica adicional';";
$trans["biblioViewNoAddInfo"]      = "\$text = 'No existe informaci�n bibliogr�fica adicional disponible.';";
$trans["biblioViewNoCopies"]       = "\$text = 'No se han creado copias.';";
$trans["biblioViewOpacFlg"]        = "\$text = 'Mostrar en OPAC';";
$trans["biblioViewNewCopy"]        = "\$text = 'A�adir nueva copia';";
$trans["biblioViewNeweCopy"]        = "\$text = 'A�adir nueva copia electr�nica';";
$trans["biblioViewYes"]            = "\$text = 'Si';";
$trans["biblioViewNo"]             = "\$text = 'No';";
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
$trans["biblioSearchCall"]         = "\$text = 'N�mero de entrada';";
$trans["biblioSearchCopyBCode"]    = "\$text = 'C�digo de copia';";
$trans["biblioSearchCopyStatus"]   = "\$text = 'Estado';";
$trans["biblioSearchNoCopies"]     = "\$text = 'Ninguna copia disponible.';";

$trans["biblioSearchHold"]         = "\$text = 'hold';";
$trans["biblioSearchOutIn"]        = "\$text = 'checkear salidas/entradas';";
$trans["biblioSearchDetail"]       = "\$text = 'Mostrar informaci�n detallada de la Bibliograf�a';";
$trans["biblioSearchBCode2Chk"]    = "\$text = 'C�digo de barras para comprobar o verificar en form';";
$trans["biblioSearchBCode2Hold"]   = "\$text = 'C�digo de barras for hold form';";
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
$trans["holdDelConfirmMsg"]        = "\$text = 'Est�s seguro de querer borrar esta solicitud de pr�stamo?';";
#****************************************************************************
#*  Translation text for page hold_del.php
#****************************************************************************
$trans["holdDelSuccess"]           = "\$text='La solicitud de pr�stamo se elimin� correctamente.';";
#****************************************************************************
#*  Translation text for page help_header.php
#****************************************************************************
$trans["helpHeaderTitle"]          = "\$text='Ayuda';";
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
$trans["headerCirculation"]        = "\$text=' Alquiler ';";
$trans["headerCataloging"]         = "\$text=' Catalogaci�n ';";
$trans["headerAdmin"]              = "\$text=' Administraci�n ';";
$trans["headerReports"]            = "\$text=' Informes ';";
#****************************************************************************
#*  Translation text for page footer.php
#****************************************************************************
$trans["footerLibraryHome"]        = "\$text='Biblioteca Home';";
$trans["footerOPAC"]               = "\$text='Cat�logo Online P�blico (OPAC)';";
$trans["footerHelp"]               = "\$text='Ayuda';";
$trans["footerPoweredBy"]          = "\$text='versi�n';";
$trans["footerDatabaseVersion"]    = "\$text='Versi�n de base de datos';";
$trans["footerCopyright"]          = "\$text='Copyright';";
$trans["footerUnderThe"]           = "\$text='bajo';";
$trans["footerGPL"]                = "\$text='GNU General Public License';";
?>

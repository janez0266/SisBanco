<?php
/* Este archivo es parte de un trabajo protegido por derechos de autor, Se distribuye SIN GARANTIA.
 * Vea el archivo COPYRIGHT.html para más detalles.
 * EspaBiblio Versión 2.0 Basado en OpenBiblio 0.6.0<br />
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
$trans["biblioViewTble1Hdr"]       = "\$text = 'Información bibliográfica';";
$trans["biblioViewMaterialType"]   = "\$text = 'Tipo de material';";
$trans["biblioViewCollection"]     = "\$text = 'Colección';";
$trans["biblioViewCallNmbr"]       = "\$text = 'Número de entrada';";
$trans["biblioViewTble2Hdr"]       = "\$text = 'Información de la copia bibliográfica';";
$trans["biblioViewTble2Col1"]      = "\$text = 'Código de barras #';";
$trans["biblioViewTble2Col2"]      = "\$text = 'Descripción';";
$trans["biblioViewTble2Col3"]      = "\$text = 'Estado';";
$trans["biblioViewTble2Col4"]      = "\$text = 'Estado Dt';";
$trans["biblioViewTble2Col5"]      = "\$text = 'Fecha de devolución';";
$trans["biblioViewTble2ColFunc"]   = "\$text = 'Función';";
$trans["biblioViewTble2Coldel"]    = "\$text = 'Borrar';";
$trans["biblioViewTble2Coledit"]   = "\$text = 'Editar';";
$trans["biblioViewTble3Hdr"]       = "\$text = 'Información bibliográfica adicional';";
$trans["biblioViewNoAddInfo"]      = "\$text = 'No existe información bibliográfica adicional disponible.';";
$trans["biblioViewNoCopies"]       = "\$text = 'No se han creado copias.';";
$trans["biblioViewOpacFlg"]        = "\$text = 'Mostrar en OPAC';";
$trans["biblioViewNewCopy"]        = "\$text = 'Añadir nueva copia';";
$trans["biblioViewNeweCopy"]        = "\$text = 'Añadir nueva copia electrónica';";
$trans["biblioViewYes"]            = "\$text = 'Si';";
$trans["biblioViewNo"]             = "\$text = 'No';";
#****************************************************************************
#*  Translation text for page biblio_search.php
#****************************************************************************
$trans["biblioSearchNoResults"]    = "\$text = 'No se han encontrado registros.';";
$trans["biblioSearchResults"]      = "\$text = 'Resultados de la búsqueda';";
$trans["biblioSearchResultPages"]  = "\$text = 'Páginas de resultados';";
$trans["biblioSearchPrev"]         = "\$text = 'anterior';";
$trans["biblioSearchNext"]         = "\$text = 'siguiente';";
$trans["biblioSearchResultTxt"]    = "if (%items% == 1) {
                                        \$text = '%items% resultado encontrado.';
                                      } else {
                                        \$text = '%items% resultado encontrado';
                                      }";
$trans["biblioSearchauthor"]       = "\$text = ' ordenados por autor';";
$trans["biblioSearchtitle"]        = "\$text = ' ordenados por título';";
$trans["biblioSearchSortByAuthor"] = "\$text = 'ordenados por autor';";
$trans["biblioSearchSortByTitle"]  = "\$text = 'ordenados por título';";
$trans["biblioSearchTitle"]        = "\$text = 'Título';";
$trans["biblioSearchAuthor"]       = "\$text = 'Autor';";

$trans["biblioSearchMaterial"]     = "\$text = 'Material';";
$trans["biblioSearchCollection"]   = "\$text = 'Colección';";
$trans["biblioSearchCall"]         = "\$text = 'Número de entrada';";
$trans["biblioSearchCopyBCode"]    = "\$text = 'Código de copia';";
$trans["biblioSearchCopyStatus"]   = "\$text = 'Estado';";
$trans["biblioSearchNoCopies"]     = "\$text = 'Ninguna copia disponible.';";

$trans["biblioSearchHold"]         = "\$text = 'hold';";
$trans["biblioSearchOutIn"]        = "\$text = 'checkear salidas/entradas';";
$trans["biblioSearchDetail"]       = "\$text = 'Mostrar información detallada de la Bibliografía';";
$trans["biblioSearchBCode2Chk"]    = "\$text = 'Código de barras para comprobar o verificar en form';";
$trans["biblioSearchBCode2Hold"]   = "\$text = 'Código de barras for hold form';";
#****************************************************************************
#*  Translation text for page loginform.php
#****************************************************************************
$trans["loginFormTbleHdr"]         = "\$text = 'Entrada para administradores';";
$trans["loginFormUsername"]        = "\$text = 'Nombre de usuario';";
$trans["loginFormPassword"]        = "\$text = 'Contraseña';";
$trans["loginFormLogin"]           = "\$text = 'Entrar';";
#****************************************************************************
#*  Translation text for page hold_del_confirm.php
#****************************************************************************
$trans["holdDelConfirmMsg"]        = "\$text = 'Estás seguro de querer borrar esta solicitud de préstamo?';";
#****************************************************************************
#*  Translation text for page hold_del.php
#****************************************************************************
$trans["holdDelSuccess"]           = "\$text='La solicitud de préstamo se eliminó correctamente.';";
#****************************************************************************
#*  Translation text for page help_header.php
#****************************************************************************
$trans["helpHeaderTitle"]          = "\$text='Ayuda';";
$trans["helpHeaderCloseWin"]       = "\$text='Cerrar ventana';";
$trans["helpHeaderContents"]       = "\$text='Contenidos';";
$trans["helpHeaderPrint"]          = "\$text='Imprimir';";

$trans["catalogResults"]           = "\$text='Resultados de búsqueda';";

#****************************************************************************
#*  Translation text for page header.php and header_opac.php
#****************************************************************************
$trans["headerTodaysDate"]         = "\$text='Fecha:';";
$trans["headerDateFormat"]         = "\$text='d.m.Y';";
$trans["headerLibraryHours"]       = "\$text='Horario:';";
$trans["headerLibraryPhone"]       = "\$text='Teléfono:';";
$trans["headerHome"]               = "\$text=' Inicio ';";
$trans["headerCirculation"]        = "\$text=' Alquiler ';";
$trans["headerCataloging"]         = "\$text=' Catalogación ';";
$trans["headerAdmin"]              = "\$text=' Administración ';";
$trans["headerReports"]            = "\$text=' Informes ';";
#****************************************************************************
#*  Translation text for page footer.php
#****************************************************************************
$trans["footerLibraryHome"]        = "\$text='Biblioteca Home';";
$trans["footerOPAC"]               = "\$text='Catálogo Online Público (OPAC)';";
$trans["footerHelp"]               = "\$text='Ayuda';";
$trans["footerPoweredBy"]          = "\$text='versión';";
$trans["footerDatabaseVersion"]    = "\$text='Versión de base de datos';";
$trans["footerCopyright"]          = "\$text='Copyright';";
$trans["footerUnderThe"]           = "\$text='bajo';";
$trans["footerGPL"]                = "\$text='GNU General Public License';";
?>

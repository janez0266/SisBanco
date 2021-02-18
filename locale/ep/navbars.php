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
#*  Translation text shared by various php files under the navbars dir
#****************************************************************************
$trans["login"]                    = "\$text = 'Entrar';";
$trans["logout"]                   = "\$text = 'Salir';";
$trans["help"]                     = "\$text = 'Ayuda';";
#****************************************************************************
#*  Translation text for page home.php
#****************************************************************************
$trans["homeHomeLink"]             = "\$text = 'Inicio';";
$trans["homeLicenseLink"]          = "\$text = 'Licencia-Esp';";
$trans["homeLicenseLink1"]          = "\$text = 'Licencia-Original';";
#****************************************************************************
#*  Translation text for page admin.php
#****************************************************************************
$trans["adminSummary"]             = "\$text = 'Administración';";
$trans["adminStaff"]               = "\$text = 'Admin. Personal';";
$trans["adminSettings"]            = "\$text = 'Config. Biblioteca';";
$trans["adminMaterialTypes"]       = "\$text = 'Tipos de material';";
$trans["adminCollections"]         = "\$text = 'Colecciones';";
$trans["adminThemes"]              = "\$text = 'Temas de diseño';";
$trans["adminTranslation"]         = "\$text = 'Idiomas';";
#****************************************************************************
#*  Translation text for page cataloging.php
#****************************************************************************
$trans["catalogSummary"]           = "\$text = 'Catalogación';";
$trans["catalogSearch1"]           = "\$text = 'Búsqueda de material';";
$trans["catalogSearch2"]           = "\$text = 'Búsqueda bibliográfica';";
$trans["catalogResults"]           = "\$text = 'Resultados de la búsqueda';";
$trans["catalogBibInfo"]           = "\$text = 'Información bibliográfica';";
$trans["catalogBibEdit"]           = "\$text = 'Edicción básica';";
$trans["catalogBibEditMarc"]       = "\$text = 'Editar-MARC';";
$trans["catalogBibMarcNewFld"]     = "\$text = 'Nuevo campo MARC';";
$trans["catalogBibMarcNewFldShrt"] = "\$text = 'Nuevo MARC';";
$trans["catalogBibMarcEditFld"]    = "\$text = 'Editar campo MARC';";
$trans["catalogCopyNew"]           = "\$text = 'Nueva copia';";
$trans["catalogCopyEdit"]          = "\$text = 'Editar Copia';";
$trans["catalogHolds"]             = "\$text = 'Reservas';";
$trans["catalogDelete"]            = "\$text = 'Borrar';";
$trans["catalogBibNew"]            = "\$text = 'Nuevo material';";
$trans["Upload Marc Data"]         = "\$text = 'Subir datos Marc';";

#****************************************************************************
#*  Translation text for page reports.php
#****************************************************************************
$trans["reportsSummary"]           = "\$text = 'Informes';";
$trans["reportsReportListLink"]    = "\$text = 'Lista de informes';";
$trans["reportsLabelsLink"]        = "\$text = 'Imprimir etiquetas';";
$trans["reportsLettersLink"]        = "\$text = 'Imprimir cartas';";
#****************************************************************************
#*  Translation text for page opac.php
#****************************************************************************
$trans["catalogSearch1"]           = "\$text = 'Buscar';";
$trans["catalogSearch2"]           = "\$text = 'Búscar material';";
$trans["catalogResults"]           = "\$text = 'Resultados de la búsqueda';";
$trans["catalogBibInfo"]           = "\$text = 'Información bibliográfica';";

#Added
$trans["memberInfo"]="\$text = 'Información de Usuarios';";
$trans["memberSearch"]="\$text = 'Búscar Usuario';";
$trans["editInfo"]="\$text = 'Editar datos';";
$trans["checkoutHistory"]= "\$text = 'Historial de alquileres';";
$trans["account"]="\$text = 'Cuenta';";
$trans["checkIn"]="\$text = 'Devolución';";
$trans["memberSearch"]= "\$text = 'Buscar Usuario';";
$trans["newMember"]= "\$text = 'Nuevo Usuario';";
//$trans["account"]        	= "\$text = 'Cuenta';";
 #****************************************************************************
  #* Translation text for Library of Congress SRU module
  #****************************************************************************
$trans["LOCsearch"]                 = "\$text = 'Consultar Biblioteca del Congreso';";
?>

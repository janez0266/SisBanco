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
#*  Translation text for page index.php
#****************************************************************************
$trans["opac_Header"]        = "\$text='Cat�logo online de acceso p�blico (OPAC)';";
$trans["opac_WelcomeMsg"]    = "\$text= 'Bienvenido a nuestro Catalogo p�blico online de nuestra biblioteca. Busca en nuestro cat�logo.';";
$trans["opac_SearchTitle"]   = "\$text='Buscar bibliograf�a por frase de b�squeda:';";
$trans["opac_Title"]         = "\$text='T�tulo';";
$trans["opac_Author"]        = "\$text='Autor';";
$trans["opac_Subject"]       = "\$text='Resumen';";
$trans["opac_Search"]        = "\$text='Buscar';";
;
?>

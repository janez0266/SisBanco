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
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHeading"]       = "\$text='Bienvenido a OpenBiblio';";
$trans["indexIntro"]         = "\$text=
  'Utiliza las pesta�as superiores para acceder a las diferentes p�ginas de administraci�n de la biblioteca.';";
$trans["indexTab"]           = "\$text='Pesta�a';";
$trans["indexDesc"]          = "\$text='Descripci�n';";
$trans["indexCirc"]          = "\$text='Pr�stamo';";
$trans["indexCircDesc1"]     = "\$text='Utiliza esta p�gina para administrar los datos de los socios.';";
$trans["indexCircDesc2"]     = "\$text='Administraci�n de socios (a�adir nuevos, buscar, editar, borrar)';";
$trans["indexCircDesc3"]     = "\$text='Pr�stamos, reservas, cuentas e historial de los socios de la biblioteca';";
$trans["indexCircDesc4"]     = "\$text='Registros de bibliograf�a y del carrito de reposici�n en estanter�a';";
//$trans["indexCircDesc5"]   = "\$text='Pago de una multa por retraso en la devoluci�n';";
$trans["indexCat"]           = "\$text='Catalogac��n';";
$trans["indexCatDesc1"]      = "\$text='Administraci�n de datos bibliogr�ficos.';";
$trans["indexCatDesc2"]      = "\$text='Administraci�n bibliogr�fica (nuevo, buscar, editar, borrar)';";
//$trans["indexCatDesc3"]    = "\$text='Bibliograf�a importante de los archivos de USMarc';";
$trans["indexAdmin"]         = "\$text='Administraci�n';";
$trans["indexAdminDesc1"]    = "\$text='Administraci�n de bibliotecarios y de datos administrativos.';";
$trans["indexAdminDesc2"]    = "\$text='Administraci�n de bibliotecarios (a�adir nuevos, editar, cambiar contrase�as, borrar)';";
$trans["indexAdminDesc3"]    = "\$text='Configuraci�n general de la biblioteca';";
$trans["indexAdminDesc5"]    = "\$text='Lista de tipos de material';";
$trans["indexAdminDesc4"]    = "\$text='Lista de colecciones';";
$trans["indexAdminDesc6"]    = "\$text='Editor de temas';";
$trans["indexReports"]       = "\$text='Informes';";
$trans["indexReportsDesc1"]  = "\$text='En esta p�gina puedes ejecutar informes a partir de los datos de la biblioteca.';";
$trans["indexReportsDesc2"]  = "\$text='Informes.';";
$trans["indexReportsDesc3"]  = "\$text='Etiquetas.';";

?>

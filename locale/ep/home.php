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
$trans["indexHeading"]       = "\$text='Bienvenido al Sistema de Alquiler del Banco de Libros ';";
$trans["indexIntro"]         = "\$text= 'Utiliza las pesta�as superiores para acceder a las diferentes p�ginas de administraci�n del Sistema.';";
$trans["indexTab"]           = "\$text='P�gina (pesta�a)';";
$trans["indexDesc"]          = "\$text='Descripci�n';";
$trans["indexCirc"]          = "\$text='Alquiler ';";
$trans["indexCircDesc1"]     = "\$text='Utiliza esta p�gina para administrar los datos de los usuarios.';";
$trans["indexCircDesc2"]     = "\$text='Administraci�n de Usuarios (a�adir nuevos, buscar, editar, borrar)';";
$trans["indexCircDesc3"]     = "\$text='Alquiler, reservas, cuentas e historial de los Usuarios de la biblioteca';";
$trans["indexCircDesc4"]     = "\$text='Devoluci�n de bibliograf�a y del carrito de reposici�n en estanter�a';";
$trans["indexCircDesc5"]     = "\$text='Pago de alquileres y otros ingresos';";
$trans["indexCat"]           = "\$text='Catalogaci�n';";
$trans["indexCatDesc1"]      = "\$text='Administraci�n de datos bibliogr�ficos.';";
$trans["indexCatDesc2"]      = "\$text='Administraci�n bibliogr�fica (nuevo, buscar, editar, borrar)';";
$trans['locsru_detalle']     = "\$text = 'Permite al Usuario recuperar la informaci�n de la Biblioteca del Congreso utilizando SRU (Search Retrival URL), que devuelve un formulario XML.';";
//$trans["indexCatDesc3"]      = "\$text='Bibliograf�a importante de los archivos de USMarc';";
$trans["indexAdmin"]         = "\$text='Administraci�n';";
$trans["indexAdminDesc1"]    = "\$text='Administraci�n del Personal y de datos administrativos.';";
$trans["indexAdminDesc2"]    = "\$text='Administraci�n del personal (a�adir nuevos, editar, cambiar contrase�as, borrar)';";
$trans["indexAdminDesc3"]    = "\$text='Configuraci�n general de la biblioteca';";
$trans["indexAdminDesc5"]    = "\$text='Lista de tipos de material';";
$trans["indexAdminDesc4"]    = "\$text='Lista de colecciones';";
$trans["indexAdminDesc6"]    = "\$text='Editor de temas de dise�o';";
$trans["indexReports"]       = "\$text='Informes';";
$trans["indexReportsDesc1"]  = "\$text='En esta p�gina puedes ejecutar informes a partir de los datos de la biblioteca.';";
$trans["indexReportsDesc2"]  = "\$text='Informes.';";
$trans["indexReportsDesc3"]  = "\$text='Etiquetas.';";
?>
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
#*  Translation text for class Biblio
#****************************************************************************
$trans["biblioError1"]            = "\$text = 'N�mero de llamada requerido.';";

#****************************************************************************
#*  Translation text for class BiblioField
#****************************************************************************
$trans["biblioFieldError1"]       = "\$text = 'Campo requerido.';";
$trans["biblioFieldError2"]       = "\$text = 'La etiqueta debe ser num�rica.';";

#****************************************************************************
#*  Translation text for class BiblioQuery
#****************************************************************************
$trans["biblioQueryQueryErr1"]    = "\$text = 'Error al acceder a la informaci�n bibliogr�fica.';";
$trans["biblioQueryQueryErr2"]    = "\$text = 'Error al acceder al campo de informaci�n bibliogr�fica.';";
$trans["biblioQueryInsertErr1"]   = "\$text = 'Error al insertar nueva informaci�n bibliogr�fica.';";
$trans["biblioQueryInsertErr2"]   = "\$text = 'Error al insertar nuevo campo de informaci�n bibliogr�fica.';";
$trans["biblioQueryUpdateErr1"]   = "\$text = 'Error al actualizar la informaci�n bibliogr�fica.';";
$trans["biblioQueryUpdateErr2"]   = "\$text = 'Error al limpiar el campo de informaci�n bibliogr�fica para actualizarlo.';";
$trans["biblioQueryDeleteErr"]    = "\$text = 'Error al borrar la informaci�n bibliogr�fica.';";

#****************************************************************************
#*  Translation text for class BiblioSearchQuery
#****************************************************************************
$trans["biblioSearchQueryErr1"]   = "\$text = 'Error al contar los resultados de b�squeda bibliogr�fica.';";
$trans["biblioSearchQueryErr2"]   = "\$text = 'Error al buscar informaci�n bibliogr�fica.';";
$trans["biblioSearchQueryErr3"]   = "\$text = 'Error al leer la informaci�n bibliogr�fica.';";

#****************************************************************************
#*  Translation text for class BiblioCopy
#****************************************************************************
$trans["biblioCopyError1"]        = "\$text = 'N�mero de c�digo de barras requerido.';";
$trans["biblioCopyError2"]        = "\$text = 'El c�digo de barras debe ser totalmente alfab�tico y/o num�rico.';";

#****************************************************************************
#*  Translation text for class BiblioCopyQuery
#****************************************************************************
$trans["biblioCopyQueryErr1"]     = "\$text = 'Error al comprobar el c�digo de barras.';";
$trans["biblioCopyQueryErr2"]     = "\$text = 'El c�digo de barras %barcodeNmbr% ya est� en uso.';";
$trans["biblioCopyQueryErr3"]     = "\$text = 'Error al insetar nueva copia de la informaci�n bibliogr�fica.';";
$trans["biblioCopyQueryErr4"]     = "\$text = 'Error al acceder a la copia de la informaci�n bibliogr�fica.';";
$trans["biblioCopyQueryErr5"]     = "\$text = 'Error al actualizar la copia de informaci�n bibliogr�fica.';";
$trans["biblioCopyQueryErr6"]     = "\$text = 'Error al borrar la informaci�n bibliogr�fica.';";
$trans["biblioCopyQueryErr7"]     = "\$text = 'Error al acceder a la informaci�n bibliogr�fica para obtener el c�digo de la colecci�n.';";
$trans["biblioCopyQueryErr8"]     = "\$text = 'Error al acceder a la informaci�n de la colecci�n para comprobar la fecha de devoluci�n.';";
$trans["biblioCopyQueryErr9"]     = "\$text = 'Ocurri� un error al registrar las copias';";
$trans["biblioCopyQueryErr10"]    = "\$text = 'Ocurri� un error al comprobar los l�mites de pr�stamo';";
$trans["biblioCopyQueryErr11"]    = "\$text = 'Error al traer el copyid m�s alto.';";

#****************************************************************************
#*  Translation text for class BiblioFieldQuery
#****************************************************************************
$trans["biblioFieldQueryErr1"]    = "\$text = 'Error al hacer la lectura de un campo bibliogr�fico.';";
$trans["biblioFieldQueryErr2"]    = "\$text = 'Error al leer los campos bibliogr�ficos.';";
$trans["biblioFieldQueryInsertErr"] = "\$text = 'Error al insertar un nuevo campo bibliogr�fico.';";
$trans["biblioFieldQueryUpdateErr"] = "\$text = 'Error al actualizar un campo bibliogr�fico.';";
$trans["biblioFieldQueryDeleteErr"] = "\$text = 'Error al borrar un campo bibliogr�fico.';";

#****************************************************************************
#*  Translation text for class UsmarcBlockDmQuery
#****************************************************************************
$trans["usmarcBlockDmQueryErr1"]  = "\$text = 'Error al acceder a los datos del bloque marc.';";

#****************************************************************************
#*  Translation text for class UsmarcTagDmQuery
#****************************************************************************
$trans["usmarcTagDmQueryErr1"]    = "\$text = 'Error al acceder a la etiqueta de datos marc.';";

#****************************************************************************
#*  Translation text for class UsmarcSubfieldDmQuery
#****************************************************************************
$trans["usmarcSubfldDmQueryErr1"] = "\$text = 'Error al acceder al subcampo de datos marc.';";

#****************************************************************************
#*  Translation text for class BiblioHoldQuery
#****************************************************************************
$trans["biblioHoldQueryErr1"]     = "\$text = 'Error al acceder a los datos de pr�stamo por parte de la identificaci�n bibliogr�fica.';";
$trans["biblioHoldQueryErr2"]     = "\$text = 'Error al acceder a los datos de pr�stamo por parte de un socio.';";
$trans["biblioHoldQueryErr3"]     = "\$text = 'Error al obtener identificaci�n bibliogr�fica e identificaci�n de copia para realizar una solicitud de pr�stamo.';";
$trans["biblioHoldQueryErr4"]     = "\$text = 'Error al insertar los datos de pr�stamo.';";
$trans["biblioHoldQueryErr5"]     = "\$text = 'Error al borrar los datos de pr�stamo.';";
$trans["biblioHoldQueryErr6"]     = "\$text = 'Error al obtener el socio que ha realizado la reserva para hacer una copia.';";

#****************************************************************************
#*  Translation text for class ReportQuery
#****************************************************************************
$trans["reportQueryErr1"]         = "\$text = 'Error al llevar a cabo el informe.';";

#****************************************************************************
#*  Translation text for class ReportCriteria
#****************************************************************************
$trans["reportCriteriaErr1"]      = "\$text = 'Un valor no num�rico no es v�lido en una columna num�rica.';";
$trans["reportCriteriaDateTimeErr"] = "\$text = 'Formato de fecha y hora no v�lido.';";
$trans["reportCriteriaDateErr"]   = "\$text = 'Formato de fecha no v�lido.';";

#****************************************************************************
#*  Translation text for class LabelFormat and LetterFormat
#****************************************************************************
$trans["labelFormatFontErr"]      = "\$text = 'Tipo de fuente no v�lido  xml.  Los tipos de fuente v�lidos son Courier, Helvetica, y Times-Roman.';";
$trans["labelFormatFontSizeErr"]  = "\$text = 'Tama�o de fuente no v�lido  xml.  El tama�o de la fuente debe ser num�rico.';";
$trans["labelFormatFontSizeErr2"] = "\$text = 'Tama�o de fuente no v�lido  xml.  El tama�o de la fuente debe ser mayor de cero.';";
$trans["labelFormatLMarginErr"]   = "\$text = 'Margen izquierdo no v�lido  xml.  El margen izquierdo debe ser num�riico.';";
$trans["labelFormatLMarginErr2"]  = "\$text = 'Margen izquierdo no v�lido  xml.  El margen izquierdo debe ser mayor de cero.';";
$trans["labelFormatRMarginErr"]   = "\$text = 'Margen derecho no v�lido  xml.  El margen derecho debe ser num�rico.';";
$trans["labelFormatRMarginErr2"]  = "\$text = 'Margen derecho no v�lido  xml.  El margen derecho debe ser mayor de cero.';";
$trans["labelFormatTMarginErr"]   = "\$text = 'Margen superior no v�lido  xml.  El margen superior debe ser num�rico.';";
$trans["labelFormatTMarginErr2"]  = "\$text = 'Margen superior no v�lido  xml.  El margen superior debe ser mayor de cero.';";
$trans["labelFormatBMarginErr"]   = "\$text = 'Margen inferior no v�lido  xml.  El margen inferior debe ser num�rico.';";
$trans["labelFormatBMarginErr2"]  = "\$text = 'Margen inferior no v�lido  xml.  El margen inferior debe ser mayor de cero.';";
$trans["labelFormatColErr"]       = "\$text = 'Columnas no v�lidas xml.  Las columnas deben ser num�ricas.';";
$trans["labelFormatColErr2"]      = "\$text = 'Columnas no v�lidas xml.  Las columnas deben ser mayores de cero.';";
$trans["labelFormatWidthErr"]     = "\$text = 'Ancho de p�gina no v�lido xml.  El ancho de p�gina debe ser num�rico.';";
$trans["labelFormatWidthErr2"]    = "\$text = 'Ancho de p�gina no v�lido xml.  El ancho de p�gina debe ser mayor de cero.';";
$trans["labelFormatHeightErr"]    = "\$text = 'Altura de p�gina no v�lida xml.  La altura de p�gina debe ser num�rica.';";
$trans["labelFormatHeightErr2"]   = "\$text = 'Altura de p�gina no v�lida xml.  La altura de p�gina debe ser mayor de cero.';";
$trans["labelFormatNoLabelsErr"]  = "\$text = 'L�neas no v�lidas xml.';";

#****************************************************************************
#*  Translation text for class BiblioStatusHistQuery
#****************************************************************************
$trans["biblioStatusHistQueryErr1"] = "\$text = 'Error al obtener el estado del historial bibliogr�fico.';";
$trans["biblioStatusHistQueryErr2"] = "\$text = 'Error al obtener elestado del historial bibliogr�fico por parte del socio';";
$trans["biblioStatusHistQueryErr3"] = "\$text = 'Error al insertar el estado del historial bibliogr�fico';";
$trans["biblioStatusHistQueryErr4"] = "\$text = 'Error al borrar el estado del historial';";
$trans["biblioStatusHistQueryErr5"] = "\$text = 'Error al borrar el estado del historial bibliogr�fico por parte de un socio';";

#****************************************************************************
#*  Translation text for class MemberAccountTransaction
#****************************************************************************
$trans["memberAccountTransError1"]  = "\$text = 'Cantidad requerida.';";
$trans["memberAccountTransError2"]  = "\$text = 'La cantidad debe ser num�rica.';";
$trans["memberAccountTransError3"]  = "\$text = 'Descripci�n requerida.';";

#****************************************************************************
#*  Translation text for class MemberAccountQuery
#****************************************************************************
$trans["memberAccountQueryErr1"]    = "\$text = 'Error al acceder a la informaci�n de la cuenta del socio.';";
$trans["memberAccountQueryErr2"]    = "\$text = 'Error al insertar la informaci�n de la cuenta del socio.';";
$trans["memberAccountQueryErr3"]    = "\$text = 'Error al borrar la informaci�n de la cuenta del socio.';";

?>

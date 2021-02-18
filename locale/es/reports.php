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
#*  Translation text used on multiple pages
#****************************************************************************
$trans["reportsCancel"]            = "\$text = 'Cancelar';";

#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHdr"]                 = "\$text = 'Informes';";
$trans["indexDesc"]                = "\$text = 'Utilice el informe o lista de etiquetas situado en la zona de navegaci�n izquierda para crear informes o etiquetas.';";

#****************************************************************************
#*  Translation text for page report_list.php
#****************************************************************************
$trans["reportListHdr"]            = "\$text = 'Listado de informes';";
$trans["reportListDesc"]           = "\$text = 'Elija uno de los siguientes enlaces para elaborar un informe.';";
$trans["reportListXmlErr"]         = "\$text = 'Ocurri� un error al analizar un informe xml.';";
$trans["reportListCannotRead"]     = "\$text = 'No se pudo leer la etiqueta del archivo: %fileName%';";

#****************************************************************************
#*  Translation text for page label_list.php
#****************************************************************************
$trans["labelListHdr"]             = "\$text = 'Listado de etiquetas';";
$trans["labelListDesc"]            = "\$text = 'Elija uno de los siguientes enlaces para crear etiquetas en formato pdf.';";
$trans["displayLabelsXmlErr"]      = "\$text = 'Ocurri� un error al analizar un informe xml. Error = ';";

#****************************************************************************
#*  Translation text for page letter_list.php
#****************************************************************************
$trans["letterListHdr"]            = "\$text = 'Listado de cartas';";
$trans["letterListDesc"]           = "\$text = 'Elija uno de los siguientes enlaces para crear cartas en formato pdf.';";
$trans["displayLettersXmlErr"]      = "\$text = 'Ocurri� un error al analizar un informe xml.  Error = ';";

#****************************************************************************
#*  Translation text for page report_criteria.php
#****************************************************************************
$trans["reportCriteriaHead1"]      = "\$text = 'Criterios de b�squeda de informes (opcional)';";
$trans["reportCriteriaHead2"]      = "\$text = 'Clasificaci�n de informes (opcional)';";
$trans["reportCriteriaHead3"]      = "\$text = 'Tipo de salida del informe';";
$trans["reportCriteriaCrit1"]      = "\$text = 'Criterio 1:';";
$trans["reportCriteriaCrit2"]      = "\$text = 'Criterio 2:';";
$trans["reportCriteriaCrit3"]      = "\$text = 'Criterio 3:';";
$trans["reportCriteriaCrit4"]      = "\$text = 'Criterio 4:';";
$trans["reportCriteriaEQ"]         = "\$text = '=';";
$trans["reportCriteriaNE"]         = "\$text = 'no =';";
$trans["reportCriteriaLT"]         = "\$text = '&lt;';";
$trans["reportCriteriaGT"]         = "\$text = '&gt;';";
$trans["reportCriteriaLE"]         = "\$text = '&lt o =';";
$trans["reportCriteriaGE"]         = "\$text = '&gt o =';";
$trans["reportCriteriaBT"]         = "\$text = 'entre';";
$trans["reportCriteriaAnd"]        = "\$text = 'y';";
$trans["reportCriteriaRunReport"]  = "\$text = 'Ejecutar informe';";
$trans["reportCriteriaSortCrit1"]  = "\$text = 'Clase 1:';";
$trans["reportCriteriaSortCrit2"]  = "\$text = 'Clase 2:';";
$trans["reportCriteriaSortCrit3"]  = "\$text = 'Clase 3:';";
$trans["reportCriteriaAscending"]  = "\$text = 'ascendente';";
$trans["reportCriteriaDescending"] = "\$text = 'descendente';";
$trans["reportCriteriaStartOnLabel"] = "\$text = 'Empezar a imprimir en la etiqueta:';";
$trans["reportCriteriaOutput"]     = "\$text = 'Tipo de Salida:';";
$trans["reportCriteriaOutputHTML"] = "\$text = 'HTML';";
$trans["reportCriteriaOutputCSV"]  = "\$text = 'CSV';";

#****************************************************************************
#*  Translation text for page run_report.php
#****************************************************************************
$trans["runReportReturnLink1"]     = "\$text = 'criterios de selecci�n de informes';";
$trans["runReportReturnLink2"]     = "\$text = 'lista de informes';";
$trans["runReportTotal"]           = "\$text = 'Total de filas:';";

#****************************************************************************
#*  Translation text for page display_labels.php
#****************************************************************************
$trans["displayLabelsStartOnLblErr"] = "\$text = 'El campo debe ser num�rico.';";
$trans["displayLabelsXmlErr"]      = "\$text = 'Ocurri� un error al analizar el informe xml.  Error = ';";
$trans["displayLabelsCannotRead"]  = "\$text = 'No se pudo leer el archivo: %fileName%';";

#****************************************************************************
#*  Translation text for page noauth.php
#****************************************************************************
$trans["noauthMsg"]                = "\$text = 'No est�s autorizado a utilizar las etiquetas de los informes.';";

#****************************************************************************
#*  Report Titles
#****************************************************************************
$trans["reportHolds"]              = "\$text = 'Peticiones de pr�stamo que contienen informaci�n de contacto con el socio';";
$trans["reportCheckouts"]          = "\$text = 'Listado de bibliograf�a prestada';";
$trans["Over Due Letters"]         = "\$text = 'Cartas de fuera de plazo';";
$trans["reportLabels"]             = "\$text = 'Informaci�n sobre impresi�n de etiquetas';";
$trans["popularBiblios"]           = "\$text = 'Bibliograf�as m�s populares';";
$trans["overdueList"]              = "\$text = 'Lista de socios con art�culos pendientes de devoluci�n';";
$trans["balanceDueList"]           = "\$text = 'Lista de art�culos pendientes de devoluci�n por los socios';";

#****************************************************************************
#*  Label Titles
#****************************************************************************
$trans["labelsMulti"]              = "\$text = 'Ejemplo de etiqueta m�ltiple';";
$trans["labelsSimple"]             = "\$text = 'Ejemplo de etiqueta simple';";

#****************************************************************************
#*  Column Text
#****************************************************************************
$trans["biblio.bibid"]             = "\$text = 'ID del registro';";
$trans["biblio.create_dt"]         = "\$text = 'Fecha de registro';";
$trans["biblio.last_change_dt"]    = "\$text = 'Modificado por �ltima vez';";
$trans["biblio.material_cd"]       = "\$text = 'Material en CD';";
$trans["biblio.collection_cd"]     = "\$text = 'Colecci�n';";
$trans["biblio.call_nmbr1"]        = "\$text = 'Entrada 1';";
$trans["biblio.call_nmbr2"]        = "\$text = 'Entrada 2';";
$trans["biblio.call_nmbr3"]        = "\$text = 'Entrada 3';";
$trans["biblio.title_remainder"]   = "\$text = 'Resto de t�tulos';";
$trans["biblio.responsibility_stmt"] = "\$text = 'Acuerdo de Responsabilidad';";
$trans["biblio.opac_flg"]          = "\$text = 'OPAC Flag';";
$trans["biblio_copy.barcode_nmbr"] = "\$text = 'C�digo de barras';";
$trans["biblio.title"]             = "\$text = 'T�tulo';";
$trans["biblio.author"]            = "\$text = 'Autor';";
$trans["biblio_copy.status_begin_dt"]   = "\$text = 'Fecha de comienzo de estado';";
$trans["biblio_copy.due_back_dt"]       = "\$text = 'Fecha de devoluci�n';";
$trans["member.mbrid"]             = "\$text = 'Identificaci�n del socio';";
$trans["member.barcode_nmbr"]      = "\$text = 'C�digo de barras del socio';";
$trans["member.last_name"]         = "\$text = 'Apellidos';";
$trans["member.first_name"]        = "\$text = 'Nombre';";
$trans["member.address"]          = "\$text = 'Direcci�n';";
$trans["biblio_hold.hold_begin_dt"] = "\$text = 'Fecha de pr�stamo';";
$trans["member.home_phone"]        = "\$text = 'Tel�fono personal';";
$trans["member.work_phone"]        = "\$text = 'Tel�fono del trabajo';";
$trans["member.email"]             = "\$text = 'Correo electr�nico';";
$trans["biblio_status_dm.description"] = "\$text = 'Estado';";
$trans["settings.library_name"]    = "\$text = 'Nombre de la biblioteca';";
$trans["settings.library_hours"]   = "\$text = 'Horario de la biblioteca ';";
$trans["settings.library_phone"]   = "\$text = 'Tel�fono de la biblioteca';";
$trans["days_late"]                = "\$text = 'D�as de retraso';";
$trans["title"]                    = "\$text = 'T�tulo';";
$trans["author"]                   = "\$text = 'Autor';";
$trans["due_back_dt"]              = "\$text = 'Fecha de devoluci�n';";
$trans["checkoutCount"]            = "\$text = 'Cuenta de pr�stamos';";

?>

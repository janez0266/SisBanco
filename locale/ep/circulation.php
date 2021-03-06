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
$trans["circCancel"]              = "\$text = 'Cancelar';";
$trans["circDelete"]              = "\$text = 'Borrar';";
$trans["circLogout"]              = "\$text = 'Salir';";
$trans["circAdd"]                 = "\$text = 'A�adir';";
$trans["mbrDupBarcode"]           = "\$text = 'Registro, %barcode%, ya est� en uso.';";
#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHeading"]            = "\$text='Circulaci�n';";
$trans["indexCardHdr"]            = "\$text='Buscar Usuario por n�mero de C�dula:';";
$trans["indexCard"]               = "\$text='N�mero de C�dula:';";
$trans["indexSearch"]             = "\$text='Buscar';";
$trans["indexNameHdr"]            = "\$text='Buscar Usuario por Apellido:';";
$trans["indexName"]               = "\$text='Apellido comienza por:';";
#****************************************************************************
#*  Translation text for page mbr_new_form.php, mbr_edit_form.php and mbr_fields.php
#****************************************************************************
$trans["Mailing Address:"] = "\$text='Direcci�n postal:';";
$trans["mbrNewForm"]              = "\$text='A�adir nuevo';";
$trans["mbrEditForm"]             = "\$text='Editar';";
$trans["mbrFldsHeader"]           = "\$text='Usuario:';";
$trans["mbrFldsCardNmbr"]         = "\$text='N�mero de C�dula:';";
$trans["mbrFldsLastName"]         = "\$text='Apellido:';";
$trans["mbrFldsFirstName"]        = "\$text='Nombre:';";
$trans["mbrFldsAddr1"]            = "\$text='Direcci�n:';";
$trans["mbrFldsAddr2"]            = "\$text='Direcci�n2:';";
$trans["mbrFldsCity"]             = "\$text='Ciudad:';";
$trans["mbrFldsStateZip"]         = "\$text='Provincia, C�digo postal:';";
$trans["mbrFldsHomePhone"]        = "\$text='Tel�fono:';";
$trans["mbrFldsWorkPhone"]        = "\$text='Tel�fono trabajo:';";
$trans["mbrFldsEmail"]            = "\$text='Email:';";
$trans["mbrFldsClassify"]         = "\$text='Clasificaci�n:';";
$trans["mbrFldsGrade"]            = "\$text='Curso:';";
$trans["mbrFldsTeacher"]          = "\$text='Tutor:';";
$trans["mbrFldsSubmit"]           = "\$text='Enviar';";
$trans["mbrFldsCancel"]           = "\$text='Cancelar';";
$trans["mbrsearchResult"]         = "\$text='P�ginas de Resultados: ';";
$trans["mbrsearchprev"]           = "\$text='Anterior';";
$trans["mbrsearchnext"]           = "\$text='Siguiente';";
$trans["mbrsearchNoResults"]      = "\$text='No se encontro un resultado.';";
$trans["mbrsearchFoundResults"]   = "\$text='Resultados encontrados.';";
$trans["mbrsearchSearchResults"]  = "\$text='Resultados de la b�squeda:';";
$trans["mbrsearchCardNumber"]     = "\$text='N�mero de C�dula:';";
$trans["mbrsearchClassification"] = "\$text='Clasificaci�n:';";
#****************************************************************************
#*  Translation text for page mbr_new.php
#****************************************************************************
$trans["mbrNewSuccess"]           = "\$text='Usuario a�adido a la base de datos correctamente.';";

#****************************************************************************
#*  Translation text for page mbr_edit.php
#****************************************************************************
$trans["mbrEditSuccess"]          = "\$text='Datos de Usuario actualizados correctamente.';";

#****************************************************************************
#*  Translation text for page mbr_view.php
#****************************************************************************
$trans["mbrViewHead1"]            = "\$text='Informaci�n de Usuarios:';";
$trans["mbrViewName"]             = "\$text='Nombre:';";
$trans["mbrViewAddr"]             = "\$text='Direcci�n:';";
$trans["mbrViewCardNmbr"]         = "\$text='N�mero de C�dula:';";
$trans["mbrViewClassify"]         = "\$text='Clasificaci�n:';";
$trans["mbrViewPhone"]            = "\$text='Tel�fono:';";
$trans["mbrViewPhoneHome"]        = "\$text='Casa:';";
$trans["mbrViewPhoneWork"]        = "\$text='Trabajo:';";
$trans["mbrViewEmail"]            = "\$text='Email:';";
$trans["mbrViewGrade"]            = "\$text='Curso:';";
$trans["mbrViewTeacher"]          = "\$text='Tutor:';";
$trans["mbrViewHead2"]            = "\$text='Historial Alquileres:';";
$trans["mbrViewStatColHdr1"]      = "\$text='Material';";
$trans["mbrViewStatColHdr2"]      = "\$text='Cantidad';";
$trans["mbrViewStatColHdr3"]      = "\$text='L�mite';";
$trans["mbrViewStatColHdr4"]      = "\$text='Cantidad';";
$trans["mbrViewStatColHdr5"]      = "\$text='L�mite';";
$trans["mbrViewHead3"]            = "\$text='Alquiler:';";
$trans["mbrViewBarcode"]          = "\$text='Registro:';";
$trans["mbrViewCheckOut"]         = "\$text='Alquilar';";
$trans["mbrViewHead4"]            = "\$text='Material actualmente alquilado:';";
$trans["mbrViewOutHdr1"]          = "\$text='Alquilado';";
$trans["mbrViewOutHdr2"]          = "\$text='Material';";
$trans["mbrViewOutHdr3"]          = "\$text='Registro';";
$trans["mbrViewOutHdr4"]          = "\$text='T�tulo';";
$trans["mbrViewOutHdr5"]          = "\$text='Autor';";
$trans["mbrViewOutHdr6"]          = "\$text='Fecha devoluci�n';";
$trans["mbrViewOutHdr7"]          = "\$text='D�as transcurridos';";
$trans["mbrViewOutHdr8"]          = "\$text='Renovar';";
$trans["mbrViewOutHdr9"]          = "\$text='Hora/s';";
$trans["mbrViewOutHdr10"]         = "\$text='Deuda Bs.F.';";
$trans["mbrViewOutHdr11"]         = "\$text='Costo mensual';";
$trans["mbrViewNoCheckouts"]      = "\$text='No tiene material alquilado.';";
$trans["mbrViewHead5"]            = "\$text='Reservas:';";
$trans["mbrViewHead6"]            = "\$text='Material actualmente en reserva:';";
$trans["mbrViewPlaceHold"]        = "\$text='Reservar';";
$trans["mbrViewHoldHdr1"]         = "\$text='Funci�n';";
$trans["mbrViewHoldHdr2"]         = "\$text='En reserva';";
$trans["mbrViewHoldHdr3"]         = "\$text='Material';";
$trans["mbrViewHoldHdr4"]         = "\$text='Registro';";
$trans["mbrViewHoldHdr5"]         = "\$text='T�tulo';";
$trans["mbrViewHoldHdr6"]         = "\$text='Autor';";
$trans["mbrViewHoldHdr7"]         = "\$text='Estado';";
$trans["mbrViewHoldHdr8"]         = "\$text='Fecha devoluci�n';";
$trans["mbrViewNoHolds"]          = "\$text='No posee material en reserva.';";
$trans["mbrViewBalMsg"]           = "\$text='Nota: el Usuario tiene un saldo pendiente en su cuenta de %bal%.';";
$trans["mbrPrintCheckouts"]	  = "\$text='Imprimir selecci�n';";
$trans["mbrViewDel"]              = "\$text='Borrar';";

#$trans["mbrViewStatColHdr4"]      = "\$text='Seleccionar';";
#$trans["mbrViewStatColHdr5"]      = "\$text='Renovar';";

#****************************************************************************
#*  Translation text for page checkout.php
#****************************************************************************
$trans["checkoutBalErr"]          = "\$text='Los Usuarios deben pagar el saldo pendiente en su cuenta antes de solicitar un libro.';";
$trans["checkoutErr1"]            = "\$text='El n�mero del Registro debe ser completamente alfanum�rico.';";
$trans["checkoutErr2"]            = "\$text='No se encontr� bibliograf�a con ese Registro.';";
$trans["checkoutErr3"]            = "\$text='La bibliograf�a con el Registro %barcode% ya ha sido alquilada.';";
$trans["checkoutErr4"]            = "\$text='La bibliograf�a con Registro n�mero %barcode% no est� disponible para el alquiler.';";
$trans["checkoutErr5"]            = "\$text='La bibliograf�a con Registro n�mero %barcode% est� actualmente siendo utilizada por otro Usuario.';";
$trans["checkoutErr6"]            = "\$text='El Usuario ha alcanzado el tiempo l�mite de alquiler en el tipo de material bibliogr�fico especificado.';";
$trans["checkoutErr7"]            = "\$text='El item con Registro %barcode% ha alcanzo el limite para su renovaci�n.';";
$trans["checkoutErr8"]            = "\$text='Es demasiado tarde para renovar el item con Registro: %barcode%.';";

#****************************************************************************
#*  Translation text for page shelving_cart.php
#****************************************************************************
$trans["shelvingCartErr1"]        = "\$text='El n�mero del Registro debe ser completamente alfanum�rico.';";
$trans["shelvingCartErr2"]        = "\$text='No se encontr� ninguna bibliograf�a con ese n�mero de Registro.';";
$trans["shelvingCartTrans"]       = "\$text='Monto a pagar por la devoluci�n (Registro=%barcode%)';";
#****************************************************************************
#*  Translation text for page checkin_form.php
#****************************************************************************
$trans["checkinFormHdr1"]         = "\$text='Devoluci�n:';";
$trans["checkinFormBarcode"]      = "\$text='Registro:';";
$trans["checkinFormShelveButton"] = "\$text='A�adir al carrito de reposici�n en las estanter�as';";
$trans["checkinFormCheckinLink1"] = "\$text='Devolver el material seleccionado';";
$trans["checkinFormCheckinLink2"] = "\$text='Devolver todo';";
$trans["checkinFormHdr2"]         = "\$text='Lista actual del carrito de reposici�n en las estanter�as:';";
$trans["checkinFormColHdr1"]      = "\$text='Fecha de devoluci�n';";
$trans["checkinFormColHdr2"]      = "\$text='Registro';";
$trans["checkinFormColHdr3"]      = "\$text='T�tulo';";
$trans["checkinFormColHdr4"]      = "\$text='Autor';";
$trans["checkinFormEmptyCart"]    = "\$text='En la actualidad no hay items en meson para reponerlos en las estanter�as.';";

#****************************************************************************
#*  Translation text for page checkin.php
#****************************************************************************
$trans["checkinErr1"]             = "\$text='No se ha seleccionado ning�n art�culo.';";

#****************************************************************************
#*  Translation text for page hold_message.php
#****************************************************************************
$trans["holdMessageHdr"]          = "\$text='Bibliograf�a ha sido Reservada!';";
$trans["holdMessageMsg1"]         = "\$text='La bibliograf�a con el registro %barcode% que quieres seleccionar posee uno o m�s requerimientos de Reserva.  <b>Por favor archive esta bibliograf�a con sus art�culos en reserva en vez de colocarlo en su carro de estanter�as.</b>  El status de esta bibliografia es Reservado.';";
$trans["holdMessageMsg2"]         = "\$text='Regreso a Devoluciones.';";

$trans["holdMessageHdr"]          = "\$text='La bibliograf�a est� alquilada!';";
$trans["holdMessageMsg1"]         = "\$text='La bibliograf�a con n�mero de Registro %barcode% que est�s intentando conseguir tiene una o m�s peticiones de reserva.  <b>Por favor, retorna el item en las estanter�as .</b>  El c�digo de estado de esta bibliograf�a ha quedado libre para su uso.';";
$trans["holdMessageMsg2"]         = "\$text='Volver a la devoluci�n del Items.';";
#****************************************************************************
#*  Translation text for page place_hold.php
#****************************************************************************
$trans["placeHoldErr1"]           = "\$text='El Registro debe ser num�rico.';";
$trans["placeHoldErr2"]           = "\$text='El Registro no existe.';";
$trans["placeHoldErr3"]           = "\$text='El Usuario cancel� la reserva del item -- No Reservado.';";

#****************************************************************************
#*  Translation text for page mbr_del_confirm.php
#****************************************************************************
$trans["mbrDelConfirmWarn"]       = "\$text = 'El Usuario, %name%, tiene %checkoutCount% alquileres y %holdCount% peticiones de Reserva.  Todos los materiales alquilados deben ser devueltos y todas las peticiones de Reserva borradas antes de eliminar a este Usuario.';";
$trans["mbrDelConfirmReturn"]     = "\$text = 'Volver a la informaci�n del Usuario';";
$trans["mbrDelConfirmMsg"]        = "\$text = 'Est�s seguro de que quieres borrar al Usuario, %name%?  Esto tambi�n borrar� todo el historial de alquileres de este Usuario.';";


#****************************************************************************
#*  Translation text for page mbr_del.php
#****************************************************************************
$trans["mbrDelSuccess"]           = "\$text='Usuario, %name%, borrado.';";
$trans["mbrDelReturn"]            = "\$text='Volver a Buscar Usuario';";

#****************************************************************************
#*  Translation text for page mbr_history.php
#****************************************************************************
$trans["mbrHistoryHead1"]         = "\$text='Historial de alquileres del Usuario:';";
$trans["mbrHistoryNoHist"]        = "\$text='No se encontr� ning�n historial.';";
$trans["mbrHistoryHdr1"]          = "\$text='Registro';";
$trans["mbrHistoryHdr2"]          = "\$text='T�tulo';";
$trans["mbrHistoryHdr3"]          = "\$text='Autor';";
$trans["mbrHistoryHdr4"]          = "\$text='Nuevo estado';";
$trans["mbrHistoryHdr5"]          = "\$text='Fecha de cambio de estado';";
$trans["mbrHistoryHdr6"]          = "\$text='Fecha de devoluci�n';";

#****************************************************************************
#*  Translation text for page mbr_account.php
#****************************************************************************
$trans["mbrAccountLabel"]         = "\$text='A�adir una transacci�n:';";
$trans["mbrAccountTransTyp"]      = "\$text='Tipo de transacci�n:';";
$trans["mbrAccountAmount"]        = "\$text='Cantidad:';";
$trans["mbrAccountDesc"]          = "\$text='Descripci�n:';";
$trans["mbrAccountHead1"]         = "\$text='Transacciones para cuenta del Usuario:';";
$trans["mbrAccountNoTrans"]       = "\$text='No se encontraron transacciones.';";
$trans["mbrAccountOpenBal"]       = "\$text='Balance de apertura';";
$trans["mbrAccountDel"]           = "\$text='Borrar';";
$trans["mbrAccountHdr1"]          = "\$text='Funci�n';";
$trans["mbrAccountHdr2"]          = "\$text='Fecha';";
$trans["mbrAccountHdr3"]          = "\$text='Tipo de transacci�n';";
$trans["mbrAccountHdr4"]          = "\$text='Descripci�n';";
$trans["mbrAccountHdr5"]          = "\$text='Cantidad';";
$trans["mbrAccountHdr6"]          = "\$text='Balance';";
#****************************************************************************
#*  Translation text for page mbr_transaction.php
#****************************************************************************
$trans["mbrTransactionSuccess"]   = "\$text='Transacci�n realizada correctamente.';";
#****************************************************************************
#*  Translation text for page mbr_transaction_del_confirm.php
#****************************************************************************
$trans["mbrTransDelConfirmMsg"]   = "\$text='Est�s seguro de que quieres eliminar esta transacci�n?';";
#****************************************************************************
#*  Translation text for page mbr_transaction_del.php
#****************************************************************************
$trans["mbrTransactionDelSuccess"] = "\$text='Transacci�n eliminada correctamente.';";
#****************************************************************************
#*  Translation text for page mbr_print_checkouts.php
#****************************************************************************
$trans["mbrPrintCheckoutsTitle"]  = "\$text='Alquileres de %mbrName%';";
$trans["mbrPrintCheckoutsHdr1"]   = "\$text='Fecha:';";
$trans["mbrPrintCheckoutsHdr2"]   = "\$text='Usuario:';";
$trans["mbrPrintCheckoutsHdr3"]   = "\$text='N�mero de C�dula:';";
$trans["mbrPrintCheckoutsHdr4"]   = "\$text='Clasificaci�n:';";
$trans["mbrPrintCloseWindow"]     = "\$text='Cerrar ventana';";


?>

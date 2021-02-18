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
$trans["circCancel"]              = "\$text = 'Cancelar';";
$trans["circDelete"]              = "\$text = 'Borrar';";
$trans["circLogout"]              = "\$text = 'Salir';";
$trans["circAdd"]                 = "\$text = 'A�adir';";
$trans["mbrDupBarcode"]           = "\$text = 'El c�digo de barras, %barcode%, ya est� utilizado.';";

#****************************************************************************
#*  Translation text for page index.php
#****************************************************************************
$trans["indexHeading"]            = "\$text='Pr�stamo';";
$trans["indexCardHdr"]            = "\$text='Buscar socio por n�mero de carn�:';";
$trans["indexCard"]               = "\$text='N�mero de carn�:';";
$trans["indexSearch"]             = "\$text='Buscar';";
$trans["indexNameHdr"]            = "\$text='Buscar socio por apellido:';";
$trans["indexName"]               = "\$text='Apellido comienza por:';";

#****************************************************************************
#*  Translation text for page mbr_new_form.php, mbr_edit_form.php and mbr_fields.php
#****************************************************************************
$trans["Mailing Address:"]        = "\$text='Direcci�n de correo:';";
$trans["mbrNewForm"]              = "\$text='A�adir nuevo';";
$trans["mbrEditForm"]             = "\$text='Editar';";
$trans["mbrFldsHeader"]           = "\$text='Socio:';";
$trans["mbrFldsCardNmbr"]         = "\$text='N�mero de carn�:';";
$trans["mbrFldsLastName"]         = "\$text='Apellidos:';";
$trans["mbrFldsFirstName"]        = "\$text='Nombre:';";
$trans["mbrFldsAddr1"]            = "\$text='Direcci�n:';";
$trans["mbrFldsAddr2"]            = "\$text='Direcci�n2:';";
$trans["mbrFldsCity"]             = "\$text='Ciudad:';";
$trans["mbrFldsStateZip"]         = "\$text='Provincia, C�digo postal:';";
$trans["mbrFldsHomePhone"]        = "\$text='Tel�fono:';";
$trans["mbrFldsWorkPhone"]        = "\$text='Tel�fono de trabajo:';";
$trans["mbrFldsEmail"]            = "\$text='Correo electr�nico:';";
$trans["mbrFldsClassify"]         = "\$text='Categor�a:';";
$trans["mbrFldsGrade"]            = "\$text='Curso:';";
$trans["mbrFldsTeacher"]          = "\$text='Tutor:';";
$trans["mbrFldsSubmit"]           = "\$text='Enviar';";
$trans["mbrFldsCancel"]           = "\$text='Cancelar';";
$trans["mbrsearchResult"]         = "\$text='P�ginas de resultados: ';";
$trans["mbrsearchprev"]           = "\$text='anterior';";
$trans["mbrsearchnext"]           = "\$text='siguiente';";
$trans["mbrsearchNoResults"]      = "\$text='No se ha encontrado ning�n resultado.';";
$trans["mbrsearchFoundResults"]   = "\$text=' resultados encontrados.';";
$trans["mbrsearchSearchResults"]  = "\$text='B�squeda de resultados:';";
$trans["mbrsearchCardNumber"]     = "\$text='N�mero de tarjeta:';";
$trans["mbrsearchClassification"] = "\$text='Clasificaci�n:';";

#****************************************************************************
#*  Translation text for page mbr_new.php
#****************************************************************************
$trans["mbrNewSuccess"]           = "\$text='Socio a�adido a la base de datos correctamente.';";

#****************************************************************************
#*  Translation text for page mbr_edit.php
#****************************************************************************
$trans["mbrEditSuccess"]          = "\$text='Datos del socio actualizados correctamente.';";

#****************************************************************************
#*  Translation text for page mbr_view.php
#****************************************************************************
$trans["mbrViewHead1"]            = "\$text='Informaci�n de socios:';";
$trans["mbrViewName"]             = "\$text='Nombre:';";
$trans["mbrViewAddr"]             = "\$text='Direcci�n:';";
$trans["mbrViewCardNmbr"]         = "\$text='N�mero de carn�:';";
$trans["mbrViewClassify"]         = "\$text='Categor�a:';";
$trans["mbrViewPhone"]            = "\$text='Tel�fono:';";
$trans["mbrViewPhoneHome"]        = "\$text='H:';";
$trans["mbrViewPhoneWork"]        = "\$text='W:';";
$trans["mbrViewEmail"]            = "\$text='Correo electr�nico:';";
$trans["mbrViewGrade"]            = "\$text='Curso:';";
$trans["mbrViewTeacher"]          = "\$text='Tutor:';";
$trans["mbrViewHead2"]            = "\$text='Pr�stamos:';";
$trans["mbrViewStatColHdr1"]      = "\$text='Material';";
$trans["mbrViewStatColHdr2"]      = "\$text='Cantidad';";
$trans["mbrViewStatColHdr3"]      = "\$text='L�mites';";
$trans["mbrViewStatColHdr4"]      = "\$text='Verificaci�n';";
$trans["mbrViewStatColHdr5"]      = "\$text='Renovaci�n';";
$trans["mbrViewHead3"]            = "\$text='Verificaci�n de pr�stamos:';";
$trans["mbrViewBarcode"]          = "\$text='N�mero de c�digo de barras:';";
$trans["mbrViewCheckOut"]         = "\$text='Verificaci�n';";
$trans["mbrViewHead4"]            = "\$text='Pr�stamos actualmente verificados:';";
$trans["mbrViewOutHdr1"]          = "\$text='Verificaci�n';";
$trans["mbrViewOutHdr2"]          = "\$text='Material';";
$trans["mbrViewOutHdr3"]          = "\$text='C�digo de barras';";
$trans["mbrViewOutHdr4"]          = "\$text='T�tulo';";
$trans["mbrViewOutHdr5"]          = "\$text='Autor';";
$trans["mbrViewOutHdr6"]          = "\$text='Vencimiento';";
$trans["mbrViewOutHdr7"]          = "\$text='D�as de retraso';";
$trans["mbrViewOutHdr8"]          = "\$text='Renovaci�n';";
$trans["mbrViewOutHdr9"]          = "\$text='vez/veces';";
$trans["mbrViewNoCheckouts"]      = "\$text='Ning�n pr�stamo est� actualmente verificado.';";
$trans["mbrViewHead5"]            = "\$text='Lugar mantenido:';";
$trans["mbrViewHead6"]            = "\$text='Bibliograf�as actualmente en reserva:';";
$trans["mbrViewPlaceHold"]        = "\$text='En reserva';";
$trans["mbrViewHoldHdr1"]         = "\$text='Funci�n';";
$trans["mbrViewHoldHdr2"]         = "\$text='En reserva';";
$trans["mbrViewHoldHdr3"]         = "\$text='Material';";
$trans["mbrViewHoldHdr4"]         = "\$text='C�digo de barras';";
$trans["mbrViewHoldHdr5"]         = "\$text='T�tulo';";
$trans["mbrViewHoldHdr6"]         = "\$text='Autor';";
$trans["mbrViewHoldHdr7"]         = "\$text='Estado';";
$trans["mbrViewHoldHdr8"]         = "\$text='Fecha de devoluci�n';";
$trans["mbrViewNoHolds"]          = "\$text='No tiene material en reserva.';";
$trans["mbrViewBalMsg"]           = "\$text='Nota: el socio tiene un saldo pendiente en su cuenta de %bal%.';";
$trans["mbrPrintCheckouts"]	    = "\$text='imprimir verificaciones';";
$trans["mbrViewDel"]              = "\$text='borrar';";

#****************************************************************************
#*  Translation text for page checkout.php
#****************************************************************************
$trans["checkoutBalErr"]          = "\$text='Los socios deben pagar el saldo pendiente en su cuenta antes de sacar un libro.';";
$trans["checkoutErr1"]            = "\$text='el n�mero del c�digo de barras debe ser completamente alfanum�rico.';";
$trans["checkoutErr2"]            = "\$text='No se encontr� bibliograf�a con ese c�digo de barras.';";
$trans["checkoutErr3"]            = "\$text='La bibliograf�a con el c�digo de barras %barcode% ya ha sido prestada.';";
$trans["checkoutErr4"]            = "\$text='La bibliograf�a con c�digo de barras n�mero %barcode% no est� disponible para el pr�stamo.';";
$trans["checkoutErr5"]            = "\$text='La bibliograf�a con c�digo de barras n�mero %barcode% est� actualmente siendo utilizada por otro socio.';";
$trans["checkoutErr6"]            = "\$text='El socio ha alcanzado el tiempo l�mite de pr�stamo en el tipo de material bibliogr�fico especificado.';";
$trans["checkoutErr7"]            = "\$text='La bibliograf�a con c�digo de barras %barcode% ha llegado al l�mite de renovaci�n del socio.';";
$trans["checkoutErr8"]            = "\$text='La bibliograf�a con c�digo de barras %barcode% no puede ser renovada por llegar tarde.';";

#****************************************************************************
#*  Translation text for page shelving_cart.php
#****************************************************************************
$trans["shelvingCartErr1"]        = "\$text='El n�mero del c�digo de barras debe ser completamente alfanum�rico.';";
$trans["shelvingCartErr2"]        = "\$text='No se encontr� ninguna bibliograf�a con ese n�mero de c�digo de barras.';";
$trans["shelvingCartTrans"]       = "\$text='Multa por retraso en la devoluci�n (barcode=%barcode%)';";

#****************************************************************************
#*  Translation text for page checkin_form.php
#****************************************************************************
$trans["checkinFormHdr1"]         = "\$text='Devoluci�n:';";
$trans["checkinFormBarcode"]      = "\$text='C�digo de barras:';";
$trans["checkinFormShelveButton"] = "\$text='A�adir al carrito de reposici�n en las estanter�as';";
$trans["checkinFormCheckinLink1"] = "\$text='Devolver el material seleccionado';";
$trans["checkinFormCheckinLink2"] = "\$text='Devolver todo';";
$trans["checkinFormHdr2"]         = "\$text='Lista actual del carrito de reposici�n en las estanter�as:';";
$trans["checkinFormColHdr1"]      = "\$text='Fecha de escaneado';";
$trans["checkinFormColHdr2"]      = "\$text='C�digo de barras';";
$trans["checkinFormColHdr3"]      = "\$text='T�tulo';";
$trans["checkinFormColHdr4"]      = "\$text='Autor';";
$trans["checkinFormEmptyCart"]    = "\$text='En la actualidad no hay bibliograf�as en el carrito de reposici�n en las estanter�as.';";

#****************************************************************************
#*  Translation text for page checkin.php
#****************************************************************************
$trans["checkinErr1"]             = "\$text='No se ha seleccionado ning�n art�culo.';";

#****************************************************************************
#*  Translation text for page hold_message.php
#****************************************************************************
$trans["holdMessageHdr"]          = "\$text='La bibliograf�a est� prestada!';";
$trans["holdMessageMsg1"]         = "\$text='La bibliograf�a con n�mero de c�digo de barras %barcode% que est�s intentando conseguir tiene una o m�s peticiones de uso.  <b>Por favor, archiva esta bibliograf�a con tus art�culos en uso en lugar de en el carrito de reposici�n en las estanter�as.</b>  El c�digo de estado de esta bibliograf�a ha quedado libre para su uso.';";
$trans["holdMessageMsg2"]         = "\$text='Volver a la devoluci�n de bibliograf�a.';";

#****************************************************************************
#*  Translation text for page place_hold.php
#****************************************************************************
$trans["placeHoldErr1"]           = "\$text='El c�digo de barras debe ser num�rico.';";
$trans["placeHoldErr2"]           = "\$text='El c�digo de barras no existe.';";
$trans["placeHoldErr3"]           = "\$text='Este socio ya tiene ese �tem verificado.';";

#****************************************************************************
#*  Translation text for page mbr_del_confirm.php
#****************************************************************************
$trans["mbrDelConfirmWarn"]       = "\$text = 'El socio, %name%, tiene %checkoutCount% pr�stamos y %holdCount% peticiones de uso.  Todos los materiales prestados beben ser devueltos y todas las peticiones de uso borradas antes de borrar a este socio.';";
$trans["mbrDelConfirmReturn"]     = "\$text = 'Volver a la informaci�n del socio';";
$trans["mbrDelConfirmMsg"]        = "\$text = 'Est�s seguro de que quieres borrar al socio, %name%?  Esto tambi�n borrar� todo el historial de pr�stamos de este socio.';";

#****************************************************************************
#*  Translation text for page mbr_del.php
#****************************************************************************
$trans["mbrDelSuccess"]           = "\$text='Socio, %name%, borrado.';";
$trans["mbrDelReturn"]            = "\$text='Volver a Buscar socio';";

#****************************************************************************
#*  Translation text for page mbr_history.php
#****************************************************************************
$trans["mbrHistoryHead1"]         = "\$text='Historial de pr�stamo del socio:';";
$trans["mbrHistoryNoHist"]        = "\$text='No se encontr� ning�n historial.';";
$trans["mbrHistoryHdr1"]          = "\$text='C�digo de barras';";
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
$trans["mbrAccountHead1"]         = "\$text='Transacciones de cuenta del socio:';";
$trans["mbrAccountNoTrans"]       = "\$text='No se encontraron transacciones.';";
$trans["mbrAccountOpenBal"]       = "\$text='Balance de apertura';";
$trans["mbrAccountDel"]           = "\$text='borrar';";
$trans["mbrAccountHdr1"]          = "\$text='Funci�n';";
$trans["mbrAccountHdr2"]          = "\$text='Fecha';";
$trans["mbrAccountHdr3"]          = "\$text='Tipo de transacci�n';";
$trans["mbrAccountHdr4"]          = "\$text='Descripci�n';";
$trans["mbrAccountHdr5"]          = "\$text='Cantidad';";
$trans["mbrAccountHdr6"]          = "\$text='Balance';";

#****************************************************************************
#*  Translation text for page mbr_transaction.php
#****************************************************************************
$trans["mbrTransactionSuccess"]   = "\$text='Transacci�n completada correctamente.';";

#****************************************************************************
#*  Translation text for page mbr_transaction_del_confirm.php
#****************************************************************************
$trans["mbrTransDelConfirmMsg"]   = "\$text='�Est�s seguro de que quieres borrar esta transacci�n?';";

#****************************************************************************
#*  Translation text for page mbr_transaction_del.php
#****************************************************************************
$trans["mbrTransactionDelSuccess"] = "\$text='Transacci�n borrada correctamente.';";

#****************************************************************************
#*  Translation text for page mbr_print_checkouts.php
#****************************************************************************
$trans["mbrPrintCheckoutsTitle"]  = "\$text='Pr�stamos de %mbrName%';";
$trans["mbrPrintCheckoutsHdr1"]   = "\$text='Fecha:';";
$trans["mbrPrintCheckoutsHdr2"]   = "\$text='Socio:';";
$trans["mbrPrintCheckoutsHdr3"]   = "\$text='N�mero de carn�:';";
$trans["mbrPrintCheckoutsHdr4"]   = "\$text='Clasificaci�n:';";
$trans["mbrPrintCloseWindow"]     = "\$text='Cerrar ventana';";

?>

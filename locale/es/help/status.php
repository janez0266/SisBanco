<h1>Entendiendo los cambios de estado bibliogr�ficos:</h1>
La siguiente tabla muestra los estados posibles para una copia bibliogr�fica.<br><br>
<table class="primary">
  <tr><th>Estado</th><th>Descripci�n</th></tr>
  <tr><td class="primary" valign="top">Por revisar</td><td class="primary">La Bibliograf�a est� disponible para ser revisada.</td></tr>
  <tr><td class="primary" valign="top">Revisado</td><td class="primary">La Bibliograf�a ha sido revisada por el usuario corresondiente.</td></tr>
  <tr><td class="primary" valign="top">En espera</td><td class="primary">La bibliograf�a est� en espera.</td></tr>
  <tr><td class="primary" valign="top">Lista de Estanter�a</td><td class="primary">La Bibliograf�a est� en el carro de estante.</td></tr>
  <tr><td class="primary" valign="top">Da�ado/en reparaci�n</td><td class="primary">La bibliograf�a est� actualmente siendo reparada debido a da�os.</td></tr>
  <tr><td class="primary" valign="top">�rea de Interfaz</td><td class="primary">La bibliograf�a no est� disponible para su revisi�n debido a que est� en  exhibici�n .</td></tr>
  <tr><td class="primary" valign="top">Perdido</td><td class="primary">La bibliograf�a no esta disponible para su revisi�n debido a que esta no fue encontrada.</td></tr>
  <tr><td class="primary" valign="top">en pr�stamo</td><td class="primary">La bibliograf�a est� en pr�stamo.</td></tr>
  <tr><td class="primary" valign="top">En orden</td><td class="primary">La bibliograf�a est� solicitada, pero no ha llegado todav�a.</td></tr>
</table>
<br>Los cambios en el estado de la bibliograf�a est�n permitidos en las siguientes p�ginas con las siguientes reglas.<br><br>
<table class="primary">
  <tr><th>P�gina</th><th>Estado antiguo</th><th>Nuevo estado</th><th>Reglas</th></tr>
  <tr>
    <td class="primary" valign="top" rowspan="3">Informaci�n de usuario</td>
    <td class="primary" valign="top">Por revisar</td>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">Otro<sup>*</sup></td>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top">Solo se permite si el usuario est� primero en la lista de espera para la copia dada o si la lista de espera est� vac�a.</td>
  </tr>
  <tr>
    <td class="primary" valign="top" rowspan="5">Por revisar</td>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top">Lista de Estanter�a</td>
    <td class="primary" valign="top">Calcular� las entregas atrasadas.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Calcular� las entregas atrasadas y mostrar� un mensaje para colocar el libro en la estanter�a en espera.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top">Lista de Estanter�a</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Lista de Estanter�a</td>
    <td class="primary" valign="top">Solo se permitir� si la lista de espera est� vac�a.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">Lista de Estanter�a</td>
    <td class="primary" valign="top">Por revisar</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top" rowspan="5">Informaci�n Bibliogr�fica</td>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top">Por revisar</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">Por revisar</td>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Por revisar</td>
    <td class="primary" valign="top">Solo se permitir� si la lista de espera est� vac�a.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top">Solo se permitir� si la lista de espera est� vac�a.</td>
  </tr>
</table>

<font class="small">* - Nota: Otro incluye da�ados/en reparaci�n, en muestra, perdidos, en pr�stamo...</font>

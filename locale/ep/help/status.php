<h1>Entendiendo los cambios de estado bibliográficos:</h1>
La siguiente tabla muestra los estados posibles para una copia bibliográfica.<br><br>
<table class="primary">
  <tr><th>Estado</th><th>Descripción</th></tr>
  <tr><td class="primary" valign="top">Por revisar</td><td class="primary">La Bibliografía está disponible para ser revisada.</td></tr>
  <tr><td class="primary" valign="top">Revisado</td><td class="primary">La Bibliografía ha sido revisada por el usuario corresondiente.</td></tr>
  <tr><td class="primary" valign="top">En espera</td><td class="primary">La bibliografía está en espera.</td></tr>
  <tr><td class="primary" valign="top">Lista de Estantería</td><td class="primary">La Bibliografía está en el carro de estante.</td></tr>
  <tr><td class="primary" valign="top">Dañado/en reparación</td><td class="primary">La bibliografía está actualmente siendo reparada debido a daños.</td></tr>
  <tr><td class="primary" valign="top">Área de Interfaz</td><td class="primary">La bibliografía no está disponible para su revisión debido a que está en  exhibición .</td></tr>
  <tr><td class="primary" valign="top">Perdido</td><td class="primary">La bibliografía no esta disponible para su revisión debido a que esta no fue encontrada.</td></tr>
  <tr><td class="primary" valign="top">en préstamo</td><td class="primary">La bibliografía está en préstamo.</td></tr>
  <tr><td class="primary" valign="top">En orden</td><td class="primary">La bibliografía está solicitada, pero no ha llegado todavía.</td></tr>
</table>
<br>Los cambios en el estado de la bibliografía están permitidos en las siguientes páginas con las siguientes reglas.<br><br>
<table class="primary">
  <tr><th>Página</th><th>Estado antiguo</th><th>Nuevo estado</th><th>Reglas</th></tr>
  <tr>
    <td class="primary" valign="top" rowspan="3">Información de usuario</td>
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
    <td class="primary" valign="top">Solo se permite si el usuario está primero en la lista de espera para la copia dada o si la lista de espera está vacía.</td>
  </tr>
  <tr>
    <td class="primary" valign="top" rowspan="5">Por revisar</td>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top">Lista de Estantería</td>
    <td class="primary" valign="top">Calculará las entregas atrasadas.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">Revisado</td>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Calculará las entregas atrasadas y mostrará un mensaje para colocar el libro en la estantería en espera.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top">Lista de Estantería</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Lista de Estantería</td>
    <td class="primary" valign="top">Solo se permitirá si la lista de espera está vacía.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">Lista de Estantería</td>
    <td class="primary" valign="top">Por revisar</td>
    <td class="primary" valign="top"></td>
  </tr>
  <tr>
    <td class="primary" valign="top" rowspan="5">Información Bibliográfica</td>
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
    <td class="primary" valign="top">Solo se permitirá si la lista de espera está vacía.</td>
  </tr>
  <tr>
    <td class="primary" valign="top">En espera</td>
    <td class="primary" valign="top">Otros<sup>*</sup></td>
    <td class="primary" valign="top">Solo se permitirá si la lista de espera está vacía.</td>
  </tr>
</table>

<font class="small">* - Nota: Otro incluye dañados/en reparación, en muestra, perdidos, en préstamo...</font>

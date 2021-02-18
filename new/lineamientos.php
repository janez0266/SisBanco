<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
 
  require_once("../shared/common.php");
  $tab = "home";
  $nav = "lineamientos";
  require_once("../functions/inputFuncs.php");


  require_once("../shared/get_form_vars.php");
  require_once("../classes/Localize.php");
  $loc = new Localize(OBIB_LOCALE,$tab);
  $total_a_cancelar=0;

?>
<html>
<head>
<style type="text/css">
  <?php include("../css/style.php");?>
</style>
<meta name="description" content="OpenBiblio Library Automation System">
<title>Alquileres  </title>

</head>
<body bgcolor="<?php echo H(OBIB_PRIMARY_BG);?>" topmargin="5" bottommargin="5" leftmargin="5" rightmargin="5" marginheight="5" marginwidth="5" onLoad="self.focus();">
<html>
  <head>
  </head>
  <body><strong>Bienvenidos al nuevo Servicio Digital de Alquileres del Banco de Libros.</strong>
    <br>
    <br>
	Este servicio permite alquilar al usuario los libros que pueda necesitar de forma contínua a lo largo de su carrera de estudio y por un tiempo prolongado, en contraposición al préstamo in situ y por muy poco tiempo de los libros de una biblioteca. Es por ello que se debe tener en cuenta que estos alquileres se deben hacer de acuerdo a sus necesidades de estudio y posibilidades de pago, ya que en caso de perdidas o de no entregar el ejemplar se puede incrementar su deuda de forma progresiva. Para sacar el mayor provecho del sistema, se deben cumplir las siguientes normativas que garantizan un servicio más eficiente y acorde a las necesidades de los usuarios. 
    <br>
    <br>
    Entre los nuevos servicios a prestar se encuentran: 
    <br>
      
    <br>
    - Consultas via Web del material existente. 
    <br>
    - Reservaci&oacute;n de ejemplares via Web. 
   <br>
    - Consulta de saldo y estatus del usuario via Web. 
    <br>
    - Flexibilidad en los pagos y abonos a las deudas. 
    <br>
    - Catalogaci&oacute;n de los ejemplares bajo estandares MARC. 
   <br>
    - Otros 
    <br>
    <br>
    <br>
    <u>Normas y lineamientos a seguir por parte de los usuarios: 
    </u>
    <br>
    <br>
     Para Alquileres 
    <br>
    <br>
    - El Usuario podr&aacute; alquilar hasta un m&aacute;ximo de 10 ejemplares 
   <br>
    - El tiempo m&aacute;ximo para poseer los ejemplares depender&aacute; del semestre: 6 meses o 1 año dependiendo de la carrera. 
   <br>
     - Al momento de solicitar un ejemplar, se deber&aacute; abonar por lo menos el monto equivalente a un mes de alquiler por cada uno. 
   <br>
    - No existe la figura de renovaci&oacute;n, ya que el usuario debe entregar los ejemplares al final del semestre.
   <br>
     - En caso que el costo del alquiler sea menor al abonado inicialmente, este quedar&aacute; como saldo a favor del Usuario. <br>
    
     
   <br>
    Para Devoluciones
    <br>
   <br>
     - El Usuario podr&aacute; devolver los ejemplares antes de cumplirse el mes, y por ende, solo se cobrar&aacute; por los dias que utiliz&oacute; el servicio. 
   <br>
     - En caso que el costo del alquiler sea menor al abonado inicialmente, este quedar&aacute; como saldo a favor del Usuario. 
   <br>
    - Si el usuario no devuelve un ejemplar en el momento estipulado para ello, el sistema continuar&aacute; generando costos de alquiler y por ende, ir&aacute; aumentando la deuda de forma progresiva. 
   <br>
    <br>
     Otros <br>

    <br>
    - El usuario se someter&aacute; a multas y a suspensiones del servicio, al devolver el ejemplar en mal estado. 
    <br>
    - Se podr&aacute;n reservar hasta un m&aacute;ximo de tres ejemplares. 
   <br>
      
    - El tiempo de la reserva caduca a las 12:00 del mediodia del dia siguiente a la reserva. 
   <br>
     - El Usuario podrá perder credibilidad si reserva y luego no retira el ejemplar, o sea, el sistema bloqueará automáticamente la opción de reservar. 
    <br>
    - Solo se podr&aacute;n emitir solvencias, cuando el usuario no posea libros alquilados ni deudas por pagar. 
   <br>
     - Los pagos deber&aacute;n hacerce en el banco y presentar el bauche al momento de la transaccion. 
   <br>
    - No es requerido un monto exacto para las transacciones, pero debe cubrir por lo menos toda la deuda en el caso de requerir solvencias.
    <br>
 
    - El Usuario podr&aacute; consultar desde Internet su cuenta. 
   <br>
    - El Usuario podr&aacute; consultar desde Internet el cat&aacute;logo de libros y hacer sus reservas.
   <br>
     
    
    <br>
  </body>
</html>
<font class="primary">

<br>

<br>


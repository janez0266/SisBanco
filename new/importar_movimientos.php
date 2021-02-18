<?
	
	$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave); 
	mysql_select_db($basedatos,$connect); 
	

 function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0){
   
          $date_r = getdate(strtotime($date));
   
          $date_result = date("d/m/Y h:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),($date_r["seconds"]+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));
   
          return $date_result;
//   http://www1.serbi.luz.edu.ve/serbiluz_f/index.htm
      }
  
       
   
      $fecha = date("d/m/Y h:i:s");
  
     

echo "Fecha: ".$fecha."<br>";

echo "_________________________________<br>";


?>

<html>
<head><title>Banco de Libros</title>

<script language="javascript">
	function cerrar() {
		window.close();
		opener.history.go(0);
	}
</script>

</head>

<body bgcolor="777777" >
 <h3> Importacion de la base de datos MOVIMIENTOS, DEUDAS Y PROBLEMAS al nuevo sistema</h3>

 <br>
Movimientos de Usuarios que no existen en la base de datos USUARIOS y que no se importaron:<br>
Favor revisar los libros a ver si estan en estanteria, ya que estaban bloqueados para alquiler<br>
pero en la importación aparecen como disponibles..

 <? 
 

// preparar primero la base de datos biblio_copy  con $status_cd = "in" y $mbrid = 0;

$query = "update biblio_copy set status_cd='in',mbrid=0";
		$result = mysql_query($query,$connect);
			if ($result) {

			} else {
			echo "<br><br><b><center><b>Error al modificar el Registro...</center></b><br>";
			}

$contador=0;
$archivo="../new/movimien.txt";
$fichero=fopen($archivo,"r");
if ($fichero) {
	print ("Archivo abierto para procesar"."<br>");



	while (!feof($fichero)) {
	    $linea=fgets($fichero,255);
	    $separador = ";";
	    list ($cedula, $fechreg,$fechent,$facultad,$escuela,$deuda,$registro,$diario,)=split($separador, $linea);
	    
 		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechreg,$res))
  		 {
  		    $aux="{$res[3]}-{$res[1]}-{$res[2]} 12:00:00"; }
		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechent,$res2))
  		 {
  		    $aux2="{$res2[3]}-{$res2[1]}-{$res2[2]}"; }
       		//print ("<br> . ".$cedula."=".$aux."+ ");
		//print (". ");
//Buscar datos del usuario

	$query = "select mbrid from member where barcode_nmbr='$cedula'";
	$result = mysql_query($query,$connect);

	if ($row=mysql_fetch_array($result)){

		$mbrid =$row['mbrid'];

// Modificar datos en Biblio Copy
	$status_cd = "out";
	$query = "update biblio_copy set status_cd='$status_cd',mbrid='$mbrid',status_begin_dt='$aux',due_back_dt='$aux2' where barcode_nmbr='$registro'";
		$result = mysql_query($query,$connect);
		if ($result) {

		} else {
			echo "<br><br><b><center><b>Error al modificar el Registro...</center></b><br>";
			}


//grabar en member_account si deuda > 0

		if ($deuda > 0){
//		$create_dt =  date("Y-m-d h:i:s");
		$create_dt = $aux;
		$create_userid =1;
		$facturado = "O";
		$transaction_type_cd = "+c";
		$description = "Deuda Pendiente por alquiler del libro: ".$registro;

		$query2 = "insert into member_account (mbrid,create_dt,create_userid,transaction_type_cd,amount,description,facturado) values ('$mbrid','$create_dt','$create_userid','$transaction_type_cd','$deuda','$description','$facturado')";
		$result2 = mysql_query($query2,$connect);
		}
		
						
	}else { echo "<br> Cedula: ".$cedula."-- F.registro: ".$fechreg."-- F. Devoluc: ".$fechent."-- Facul: ".$facultad."-- Deuda: ".$deuda."-- Libro: ".$registro;
		$contador++;}

	}
 	fclose($fichero);
	print ("<br>Archivo cerrado <br> ");
	}

else { print ("error al abrir el archivo");
}



//***************************************************
//
//   Procedimiento para importar deudas paralizadas
//
//******************************************************
 	print ("Lista de usuarios con deuda paralizada que no aparecen en la base de inscritos"."<br>");
$archivo="../new/paraliza.txt";
$fichero=fopen($archivo,"r");
if ($fichero) {
	print ("Archivo abierto para procesar"."<br>");



	while (!feof($fichero)) {
	    $linea=fgets($fichero,255);
	    $separador = ";";
	    list ($cedula,$registro,$deuda,$fechapara)=split($separador, $linea);
	    
 		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechapara,$res))
  		 {
  		    $aux="{$res[3]}-{$res[1]}-{$res[2]} 12:00:00"; }
		
       		//print ("<br> . ".$cedula."=".$aux."+ ");
		//print (". ");
//Buscar datos del usuario

	$query = "select mbrid from member where barcode_nmbr='$cedula'";
	$result = mysql_query($query,$connect);

	if ($row=mysql_fetch_array($result)){

		$mbrid =$row['mbrid'];



//grabar en member_account si deuda > 0

		if ($deuda > 0){
//		$create_dt =  date("Y-m-d h:i:s");
		$create_dt = $aux;
		$create_userid =1;
		$facturado = "O";
		$transaction_type_cd = "+c";
		$description = "Deuda Pendiente por paralizar deuda del libro: ".$registro;

		$query2 = "insert into member_account (mbrid,create_dt,create_userid,transaction_type_cd,amount,description,facturado) values ('$mbrid','$create_dt','$create_userid','$transaction_type_cd','$deuda','$description','$facturado')";
		$result2 = mysql_query($query2,$connect);
		}
		
						
	}else { echo "<br> Cedula: ".$cedula."-- Fecha paralizada: ".$aux."-- Deuda: ".$deuda."-- Libro: ".$registro;
		$contador++;}

	}
 	fclose($fichero);
	print ("<br>Archivo cerrado <br>");
	}

else { print ("error al abrir el archivo");
}


//***************************************************
//
//   Procedimiento para crear base de problemas
//
//******************************************************
 	print ("usuarios con problemas que no aparecen en la base de datos"."<br>");


$archivo="../new/problema.txt";
$fichero=fopen($archivo,"r");
if ($fichero) {
	print ("Archivo abierto para procesar"."<br>");



	while (!feof($fichero)) {
	    $linea=fgets($fichero,255);
	    $separador = ";";
	    list ($cedula,$problema,$fechadesde,$fechahasta)=split($separador, $linea);
	    
 		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechadesde,$res))
  		 {
  		    $aux="{$res[3]}-{$res[1]}-{$res[2]}"; }
 		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechahasta,$res2))
  		 {
  		    $aux2="{$res2[3]}-{$res2[1]}-{$res2[2]}"; }		
       		//print ("<br> . ".$cedula."=".$aux."+ ");
		//print (". ");
//Buscar datos del usuario

	$query = "select mbrid from member where barcode_nmbr='$cedula'";
	$result = mysql_query($query,$connect);

	if ($row=mysql_fetch_array($result)){

		$mbrid =$row['mbrid'];
//grabar en problemas
		$query2 = "insert into problemas (cedula,problema,desde,hasta) values ('$cedula','$problema','$aux','$aux2')";
		$result2 = mysql_query($query2,$connect);
		}
		else { echo "<br> Cedula: ".$cedula."-- Problema: ".$problema."-- Desde: ".$aux."-- hasta: ".$aux2;
		$contador++;}
						
	}


 	fclose($fichero);
	print ("<br>Archivo cerrado <br><hr> Total Registros: ".$contador);
	}

else { print ("error al abrir el archivo");
}



 ?>

<br>
<center><a href='/php/biblio/index2.HTM'>Principal<a></center>


</body>
</html>

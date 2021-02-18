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
   
      }
  
       
   
      $fecha = "10/15/1985"; //mes/dia/año
  
      $fecha_actualizada = dateadd($fecha,0,0,0,0,0,0); // suma 1 dia a la fecha

echo "Fecha: ".$fecha."<br>";

echo "Fecha actualizada: ".$fecha_actualizada."<br>";

echo "_________________________________<br>";

   /*---------------------------------------
     En este momento la fecha ya tiene el formato:
                   21/03/2007
                   
     Lo cual es ya un formato de fecha aceptable 
     en algunos sistemas, pero no en MySQL.
    -----------------------------------------*/
   
   // Con una expresión regular descompongo la fecha en sus elementos
   if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fecha,$res))
   {
     /*--------------------------------------
       En este momento la fecha se dividió en:
       $res[1] = 21
       $res[2] = 03
       $res[3] = 2007
       
       Asíq ue simplemente se vuelve a armar la cadena 
       con el acomodo deseado que es: 2007-03-21
     ----------------------------------------*/
     $aux="{$res[3]}-{$res[2]}-{$res[1]}";
     
     // Muestro en pantalla el antes y el después:
     echo  $aux ;   
     }
    
	
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
 <h3> Importar desde "usuarios.txt" a la
tabla "member" en la Biblioteca</h3><br><br>
 <br>
 Instrucciones: Abrir desde Foxpro la tabla que se va a exportar, 
luego se ejecuta el siguiente comando: 
  COPY TO "e:\visual banco\usuarios.txt" DELIMITED WITH "" WITH CHAR ';'
donde usuarios.txt es el archivo exportado..
 
 <br>
 <? 
 
 
$archivo="../new/usuarios.txt";
$fichero=fopen($archivo,"r");
if ($fichero) {
	print ("Archivo abierto para procesar"."<br>");


	while (!feof($fichero)) {
	    $linea=fgets($fichero,255);

	    $separador = ";";
	    list ($cedula, $apellidos,$nombres,$facultad,$clase,$infsocial,$telefono,$fiador,$fiador_telf,$carnet,$fechain,$bancolib,$moro,$rif)=split($separador, $linea);

 		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechain,$res))
  		 {
  		    $aux="{$res[3]}-{$res[1]}-{$res[2]} 12:00:00"; }
       print ("<br> . ".$cedula."=".$aux."+ ");
		//print (". ");
// ooojjjoooo..... clasificar el tipo de usuario a numeracion: 1=estudiante, 2=profesor, etc.......

	$tipo = 6;
	If ($clase == "EST") { $tipo= 1;}
	If ($clase == "PRO") { $tipo= 2;}
	If ($clase == "EMP") { $tipo= 3;}
	If ($clase == "POS") { $tipo= 5;}
	$last_change_userid = 1;

	$query = "insert into member (barcode_nmbr,create_dt,last_change_dt,last_change_userid,last_name,first_name,home_phone,classification) values ('$cedula','$aux','$aux','$last_change_userid','$apellidos','$nombres','$telefono','$tipo')";
	$result = mysql_query($query,$connect);

		if ($result) { 
			$mbrid = mysql_insert_id(); // trae el ultimo registro asignado a bibid
		 
		
		$code = "fiador";
		$query3 = "insert into member_fields (mbrid,code,data) values ('$mbrid','$code','$fiador')";
		$result3 = mysql_query($query3,$connect);
 		print ("-1-");
		
		
		$code = "fiador_telf";
		$query3 = "insert into member_fields (mbrid,code,data) values ('$mbrid','$code','$fiador_telf')";
		$result3 = mysql_query($query3,$connect);
 		print ("-2-");
		
		$code = "facultad";
		$query3 = "insert into member_fields (mbrid,code,data) values ('$mbrid','$code','$facultad')";
		$result3 = mysql_query($query3,$connect);
 		print ("-3-");
		
		$code = "nucleo";
		$query3 = "insert into member_fields (mbrid,code,data) values ('$mbrid','$code','$bancolib')";
		$result3 = mysql_query($query3,$connect);
 		print ("-4-");
		
		$code = "infsocial";
		$query3 = "insert into member_fields (mbrid,code,data) values ('$mbrid','$code','$infsocial')";
		$result3 = mysql_query($query3,$connect);
 		print ("-5-");
		
		$code = "rif";
		$query3 = "insert into member_fields (mbrid,code,data) values ('$mbrid','$code','$rif')";
		$result3 = mysql_query($query3,$connect);
 		print ("-6-");
		
		} else { echo "********************errr al incorporar el archivo";}
 	
}

 	fclose($fichero);
	print ("Archivo cerrado"."<br>");
	}
else { print ("error al abrir el archivo");
}



 ?>

<br>
<center><a href='/php/biblio/index2.HTM'>Principal<a></center>
//<?
	//} else {

//		$query = "insert into libros (registro,titulo,autor,materia,editorial,uso) values ('$registroLib','$tituloLib','$autorLib','$materiaLib','$editorialLib','$usoLib')";
//		$result = mysql_query($query,$connect);
//		$html.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
//		if ($result) {
//			$html.="<tr><td align='center' class='neg2'>Registro añadido a la Base.</td></tr>";
//		} else {
//			$html.="<tr><td align='center' class='neg2'>Error al añadir el registro a la base.</td></tr>";
//		}
//		$html.="</table>";
//		$html.="<p align='center'><a href='/php/biblio/incluir.php'>[ REGRESAR ]</a></p>";		
//		print($html);
//	}
//?>

</body>
</html>

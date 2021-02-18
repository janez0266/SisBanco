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
  
function quitar_caracteres($cadena){
$caracteres = ' \' ';
$caracteres    =    explode(' ',$caracteres);
$nchar        =    count($caracteres);
$base        =    0;
while($base<$nchar){
$cadena = str_replace($caracteres[$base],' ',$cadena);
$base++;
}
return $cadena;
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
 <h3> Importar desde "Libros.csv" a la
tabla "libros" en la Biblioteca</h3><br><br>
 <br>
 Instrucciones: Abrir desde Foxpro la tabla que se va a exportar, 
luego se ejecuta el siguiente comando: 
  COPY TO "e:\visual banco\libros.txt" DELIMITED WITH "" WITH CHAR ';'
donde Libros.txt es el archivo exportado..
 
 <br>
 <? 
 
 
$archivo="../new/libros.csv";
$fichero=fopen($archivo,"r");
if ($fichero) {
	print ("Archivo abierto para procesar"."<br>");



//$date = "04/30/1973";  // Delimiters may be slash, dot, or hyphen
//list ($month, $day, $year) = split ('[/.-]', $date);
//echo "Month: $month; Day: $day; Year: $year<br>\n";

	while (!feof($fichero)) {
	    $linea=fgets($fichero,255);
	    // print ($linea."<br>");
	    // colocar aqui el procedimiento para dividir
	    // la cadena en campos y grabar en bd.
	    // $long=strlen($linea);  // muestra la longitud de la cadena
	    $separador = ";";
	    // print ($separador."<br>");
	    list ($registro, $titulo,$autor,$editorial,$coslbo,$codmat,$uso,$fechadq,$inventa,$observa)=split($separador, $linea);
	   //print ($arr[0].$arr[1].$arr[2].$arr[3].$arr[4].$arr[5].$arr[6]."<br>");
  	   // print ("Registro:"."<b>".$registro."</b><br>");
	   // print ("TITULO:".$titulo."<br>");
	   // Print ("AUTOR:".$autor."<br>");
		$titulo = quitar_caracteres($titulo);
		$autor = quitar_caracteres($autor);
	    
 		if(ereg("([0-9]{1,2})/([0-9]{2})/([0-9]{4})",$fechadq,$res))
  		 {
  		    $aux="{$res[3]}-{$res[1]}-{$res[2]} 12:00:00"; }
     //  print (". ".$fechadq."=".$aux."+");
		print (". ");


	$query = "insert into libros (registro,titulo,autor,uso,codmat,coslbo,editorial,fechadq,observa) values ('$registro','$titulo','$autor','$uso','$codmat','$coslbo','$editorial','$aux','$observa')";
	$result = mysql_query($query,$connect);
		//$html.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
		//if ($result) {
		//	$html.="<tr><td align='center' class='neg2'>Registro añadido a la Base.</td></tr>";
		//} else {
		//	$html.="<tr><td align='center' class='neg2'>Error al añadir el registro a la base.</td></tr>";
		//}
		//$html.="</table>";
		//$html.="<p align='center'><ahref='/php/biblio/importar.php'>[ REGRESAR ]</a></p>";		
  
//print($html);
 
 	
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

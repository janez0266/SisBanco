<?php
	
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
$caracteres = '. , : ; " N Ñ O Ó Ò S Y / # ( )';
$caracteres    =    explode(' ',$caracteres);
$nchar        =    count($caracteres);
$base        =    0;
while($base<$nchar){
$cadena = str_replace($caracteres[$base],'',$cadena);
$base++;
}
return $cadena;
}     
   
function quitar_espacios($cadena2){

$cadena2 = str_replace(' ', '', $cadena2); 
return $cadena2;

}



function cortar($texto)
{
$nr = 3;
$texto=substr($texto, 0, $nr);

return $texto;
}

function nivel($ano,$costo1,$costo2) {





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
$año = "{$res[3]}";
     
     // Muestro en pantalla el antes y el después:
     echo  $aux."<br>".$año ;   
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
 <h3>pasar de LIBROS a BIBLIO</h3><br><br>
 <br>
 Instrucciones: 
 
 <br>
 <? 
 		$cantidad_libros = 0;
		$cantidad_titulos = 0;
		$copyid = 1;
		$bibid2 = 0;
		$titulo2 = "qwertyuio";    // variables a usar para verificar que no se repitan los titulos
		$autor2 = "qwertyuiop";

#******************************************************************************
#*  leer cada registro a importar desde libros
#****************************************************************************

$query = "select * from libros order by titulo,autor";
$result = mysql_query($query,$connect);
if ($row=mysql_fetch_array($result)) 

{
	 
mysql_field_seek($result,0);

while ($field=mysql_fetch_field($result)){
	    }
do {
		
		$registro = $row["registro"];
		$titulo = $row["titulo"];
		$autor = $row["autor"];
		$codmat = $row["codmat"];
		$coslbo = $row["coslbo"];
		$editorial = $row["editorial"];
		$fechadq = $row["fechadq"];
		$observa = $row["observa"];
		$nivel = $row["nivel"];

		//echo ".  ****Base Libros*****".$titulo."<br>";

// chequear de todas maneras en biblio si no existe el titulo repetido
	//$query5 = "select * from biblio where title = '$titulo' and author = '$autor'" ;
	//$result5 = mysql_query($query5,$connect);
	//$row5=mysql_fetch_array($result5);
	//if ($result5) {	
	//	echo " ++++libro duplicado en biblio ".$row5["title"]." / ".$row5["author"]."<br>";
		
	//	$bibid = $row5["bibid"];

	//	$query6 = "select * from biblio_copy where bibid = '$bibid'";
	//	$result6 = mysql_query($query6,$connect);
	//	if ($row6=mysql_fetch_array($result6)){
	 
	  //  	mysql_field_seek($result6,0);
	    //	while ($field6=mysql_fetch_field($result6)){    }
	  // 		do {
	//		$copyid = $row6["copyid"];
 	//		} while ($row6=mysql_fetch_array($result6)); }
	//} else {

#******************************************************************************
#*  Grabar en Biblio
#****************************************************************************
// tratar de que los titulos similares sean iguales, quitandoles los signos de puntuacion y espacios

$titulo_valido = quitar_espacios(quitar_caracteres($titulo));
$titulo2_valido = quitar_espacios(quitar_caracteres($titulo2));
$autor_valido = quitar_espacios(quitar_caracteres(cortar($autor)));
$autor2_valido = quitar_espacios(quitar_caracteres(cortar($autor2)));
//echo " - ".$titulo_valido." / ".$autor_valido."<br>";
     // para los costos: usar if else en $collection_cd
if (($titulo_valido == $titulo2_valido && $autor_valido != $autor2_valido) || $titulo_valido != $titulo2_valido) 
	{
		echo " -----Titulo a grabar en Biblio----- ".$titulo." / ".$autor."<br>";
		//echo " + ".$titulo_valido." / ".$autor_valido."<br>";
		$cantidad_titulos ++;

		$last_change_userid = 1;
		$material_cd = 2;  // para libros
		$opac_flg = "Y"; // Para que aparesca en el opac
		//$collection_cd = 5;   // solo para pruebas. hacer un procedimiento para calcular el nivel segun el precio

		$query2 = "insert into biblio (create_dt,last_change_dt,last_change_userid,material_cd,collection_cd,call_nmbr1,title,author,opac_flg) values ('$fechadq','$fechadq','$last_change_userid','$material_cd','$nivel','$codmat','$titulo','$autor','$opac_flg')";
		$result2 = mysql_query($query2,$connect);
		
		if ($result2) { 
			$bibid = mysql_insert_id(); // trae el ultimo registro asignado a bibid
			$copyid = 1;
			
		} else {
			$html2.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html2.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base.Conta</td></tr>";
			$html2.="</table>";
			print($html2);
		}
		
#******************************************************************************
#*  grabar en Biblio_field
#****************************************************************************

		
		$tag = 260; //editor
		$ind1_cd = "N";
		$ind2_cd = "N";
		$subfield_cd = "b";
// ojo con bibid y fieldid

		$query3 = "insert into biblio_field (bibid,tag,ind1_cd,ind2_cd,subfield_cd,field_data) values ('$bibid','$tag','$ind1_cd','$ind2_cd','$subfield_cd','$editorial')";
		$result3 = mysql_query($query3,$connect);
		
		if ($result3) {
			
		} else {
			$html2.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html2.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base.Conta</td></tr>";
			$html2.="</table>";
			print($html2);
		}

		$tag = 541; //costo del libro
		$ind1_cd = "N";
		$ind2_cd = "N";
		$subfield_cd = "h";
// ojo con bibid y fieldid

		$query3 = "insert into biblio_field (bibid,tag,ind1_cd,ind2_cd,subfield_cd,field_data) values ('$bibid','$tag','$ind1_cd','$ind2_cd','$subfield_cd','$coslbo')";
		$result3 = mysql_query($query3,$connect);
		
		if ($result3) {
			
		} else {
			$html2.="<p><table cellpadding='0' cellspacing='0' width='100%'>";
			$html2.="<tr><td align='center' class='neg2'>Error al a&ntilde;adir el registro a la base.Conta</td></tr>";
			$html2.="</table>";
			print($html2);
		} 
	    
	//}  // ciclo else


	}


#******************************************************************************
#*  grabar en Biblio_COPY
#****************************************************************************
		$status_cd = "in";
		$mbrid = 0;
		if ($bibid == $bibid2) { 
			$copyid = $copyid + 1; } //verifica si es el mismo titulo para incrementar la copia
		$renewal_count = 0;
		$registro = (int)$registro;

		$query4 = "insert into biblio_copy (bibid,copyid,create_dt,copy_desc,barcode_nmbr,status_cd,status_begin_dt,mbrid,renewal_count) values ('$bibid','$copyid','$fechadq','$observa','$registro','$status_cd','$fechadq','$mbrid','$renewal_count')";
		$result4 = mysql_query($query4,$connect);

		$titulo2 = $titulo;
		$autor2 = $autor;
		$bibid2 = $bibid;
		$cantidad_libros ++;
		
} 

while ($row=mysql_fetch_array($result));  // pasa al siguiente registro de libros

}


echo "<hr><br> libros:  ".$cantidad_libros;
echo "<br> Titulos:  ".$cantidad_titulos;

?>

<br>
<center><a href=''>Principal<a></center>


</body>
</html>

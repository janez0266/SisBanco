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
 <h3>Niveles de precios</h3>
 <br>


<?php
$año_libros_hasta=1980;
$año_libros_desde=1000;

do {


$minimo=100;
$maximo=0;
$contador = 0;
$suma=0;
$query = "select * from libros where year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta' order by coslbo";
$result = mysql_query($query,$connect);
if ($row=mysql_fetch_array($result)) 

{
	 
mysql_field_seek($result,0);

while ($field=mysql_fetch_field($result)){
	    }
do {
		$contador ++;
		//$registro = $row["registro"];
		//$titulo = $row["titulo"];
		//$autor = $row["autor"];
		//$codmat = $row["codmat"];
		$coslbo = $row["coslbo"];
		//$editorial = $row["editorial"];
		$fechadq = $row["fechadq"];
		//$observa = $row["observa"];
 		$año = substr($fechadq,0,4);	
		$suma = $suma + $coslbo;
		if ($coslbo > $maximo){$maximo=$coslbo;}
		if ($coslbo < $minimo){$minimo=$coslbo;}

   
		//echo ".  *".$año." - ".$coslbo." + ".$titulo." ++ ".$registro."<br>";
 

} 

while ($row=mysql_fetch_array($result));  // pasa al siguiente registro de libros

}
$promedio = $suma / $contador;

echo "<br><hr>";
echo "Año: desde ".$año_libros_desde." Hasta ".$año_libros_hasta;
echo "<br> Cantidad = ".$contador;
echo "<br> promedio: ".$promedio;
echo "<br> Minimo: ".$minimo;
echo "<br> Maximo: ".$maximo;

$avance1=($promedio-$minimo)/5;
$n1=$minimo;
$n2=$n1+$avance1;
$n3=$n2+$avance1;
$n4=$n3+$avance1;
$n5=$n4+$avance1;
$n6=$promedio;
$avance2=($maximo-$promedio)/4;
$n7=$n6+$avance2;
$n8=$n7+$avance2;
$n9=$n8+$avance2;
$n10=$maximo;
echo "<br> Nivel 1: ".$n1;
echo "<br> Nivel 2: ".$n2;
echo "<br> Nivel 3: ".$n3;
echo "<br> Nivel 4: ".$n4;
echo "<br> Nivel 5: ".$n5;
echo "<br> nivel 6: ".$n6;
echo "<br> Nivel 7: ".$n7;
echo "<br> Nivel 8: ".$n8;
echo "<br> Nivel 9: ".$n9;
echo "<br> Nivel 10: ".$n10;

$query = "update libros set nivel='1' where coslbo <='$n1' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='2' where coslbo <='$n2' and coslbo >'$n1' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='3' where coslbo <='$n3' and coslbo >'$n2' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 
$query = "update libros set nivel='4' where coslbo <='$n4' and coslbo >'$n3' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='5' where coslbo <='$n5' and coslbo >'$n4' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='6' where coslbo <='$n6' and coslbo >'$n5' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='7' where coslbo <='$n7' and coslbo >'$n6' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='8' where coslbo <='$n8' and coslbo >'$n7' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='9' where coslbo <='$n9' and coslbo >'$n8' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 

$query = "update libros set nivel='10' where coslbo <='$n10' and coslbo >'$n9' and year(fechadq) >= '$año_libros_desde' and year(fechadq) < '$año_libros_hasta'";
$result = mysql_query($query,$connect);
if ($result) {	} 


$año_libros_desde = $año_libros_hasta;
$año_libros_hasta++;
} while ($año_libros_hasta!=2011);

?>

<br>
<center><a href=''>Principal<a></center>


</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
	Fechas
</title>
<link	rel=stylesheet type="text/css" href="calendario1.css">
<link	rel=stylesheet type="text/css" href="calendario.css">

<style type="text/css">
html, body	{
	margin: 0;
	padding: 0;
}

div	{
	padding: 0 1cm;
}

h1	{
	margin-top: 0;
	background: #eeeeee url(../miemoticon.gif) no-repeat 2% 50%;
	text-align: center;
}

p	{
	text-align: justify;
	text-indent: 1cm;
	margin: 0 0.5cm;
}

pre	{
	width: 100%;
	overflow: auto;
	background-color: #eeeccc;
	margin: .5cm;
}

.comentarios	{
	text-align: center;
	background-color: #eeeeee;
	color: inherit;
}
</style>
<script type="text/javascript" src="calendario.js" ></script>
<script type="text/javascript" >
<!--

function seleccionandoFecha(dd, mm, aa)	{
	alert("año: " + aa + "\nmes: " + mm + "\ndia: " + dd);
	return false;
}


function seleccionaFecha(dd, mm, aa)	{
	var fecha = new Date();
	fecha.setDate(dd);
	fecha.setMonth(mm - 1);
	fecha.setFullYear(aa);

	var Semana = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sabado"];
	var mes = ",enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre".split(",");
	cadena = Semana[fecha.getDay()] + " " + dd + " de " + mes[mm] + " de " + aa;
	document.forms.salida.comentario.value = cadena;
}

/*
function seleccionaFechaEjemplo(df, dc, dd, mm, aa)	{//alert("Ok" + df + "/" + dc + "." + dd);
	var fecha = new Date();
	fecha.setDate(dd);
	fecha.setMonth(mm - 1);
	fecha.setFullYear(aa);

	window.document.forms[df][dc].value = dd + "/" + mm + "/" + aa;
}
*/

//-->
</script>

</head>
<body
onload="_ya = new Date();
 calendario(	_ya.getMonth(),
		_ya.getFullYear(),
		'calendario',
		'otrasFechas',
		false,
		'seleccionandoFecha')" >

<h1>Fechas</h1>
<div>
<script type="text/javascript" >
<!--
_hoy = new Date();
document.writeln(calendar(_hoy.getMonth(), _hoy.getFullYear(), "calendario1", "seleccionaFecha"));
//-->
</script>
<p>
Este calendario puede usarse para insertar fechas en los formularios simplemente
seleccionando desde sus propios controles el mes y el año, y pinchando el día deseado.
</p>
<p>
Prueba seleccionar día, mes y año... En esta misma página se indica cómo
cambiar el comportamiento del script.
</p>

<form name="salida" action="" method="post" style="display: inline" onsubmit="return false">
<p>Resultado:<input type="text" value="" name="comentario" style="width: 270px; background-color: #fedcba;" />
</p>

</form>

<h3>Características</h3>
<p>
El fichero: <a href="calendario.js" >calendario.js</a> es donde se encuentra el script del calendario;
solo requiere como parámetros el mes y año que se quiera mostrar, junto con el identificador
 (tercero de los parámetros) y la el nombre de la función que gestionará la fecha seleccionada,
en este caso se trata de la función
seleccionaFecha(dd, mm, aa) que recibe los valores día, mes y año en ese órden.
</p>
<p>
En esta página se ha redefinido con el código siguiente:
</p>
<pre >
function seleccionaFecha(dd, mm, aa)	{
	var fecha = new Date();
	fecha.setDate(dd);
	fecha.setMonth(mm - 1);
	fecha.setFullYear(aa);
	var Semana = ["Dominago","Lunes","Martes","Miércoles","Jueves","Viernes","Sabado"];
	var mes = ",enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre".split(",");
	cadena = Semana[fecha.getDay()] + " " + dd + " de " + mes[mm] + " de " + aa;
	document.forms.salida.comentario.value = cadena;
}
</pre>

<p>
En el código se puede apreciar la creación de un nuevo objeto "Date" partiendo de la fecha obtenida anteriormente,
tan solo para obtener el día de la semana.
</p>
<p>
El identificador nos servirá también para darle al calendario el aspecto que más nos guste. Puede verse la
hoja de estilos de este calendario en esta dirección: <a href="calendario.css">calendario.css</a>.
</p>

<!--h3>Conclusiones</h3-->
<p>
Tan solo debe enlazar con el script, crear los estilos y por último ponr el código que crea el calendario:
</p>
<pre >
&lt;script type="text/javascript" &gt;

&lt;!--
_hoy = new Date();
document.writeln(calendar(_hoy.getMonth(), _hoy.getFullYear(), "calendario1", "seleccionaFecha"));
//--&gt;
&lt;/script&gt;
</pre>


</div>

<div id="enPopup" >
<h3>Calendario en pop-up</h3>
<p>
Hay Páginas que abren una ventana emergente para seleccionar una fecha... es algo tan sencillo como
poner el script del calendario en una página nueva con el calendario en él y que la función asociada
devuelva la fecha seleccionada al sitio deseado.
</p>
<p>
Vamos a crear un formulario donde se quiera incrustar 2 fechas distintas en sendos campos (entrada y salida)...

</p>


<pre >
&lt;form name="ej" action="" method="get" &gt;
&lt;fieldset style="text-align: center"&gt;
&lt;fieldset style="width: 45%; float: left"&gt;&lt;legend&gt;entrada&lt;/legend&gt;
&lt;input type="text" name="entrada" &gt;
&lt;button type="button" onclick="window.open('popup.html?destino=ej.entrada', '_blank', 'width=264,height=167')"&gt;

rellenar fecha1
&lt;/button&gt;
&lt;/fieldset&gt;
&lt;fieldset &gt;&lt;legend>fecha 2&lt;/legend&gt;
&lt;input type="text" name="salida" &gt;
&lt;button type="button" onclick="window.open('popup.html?destino=ej.salida', '_blank', 'width=264,height=167')"&gt;
rellenar fecha2
&lt;/button&gt;
&lt;/fieldset&gt;

&lt;/fieldset&gt;
&lt;/form&gt;
</pre>

<form name="ej" action="" method="get" >
<fieldset style="text-align: center; margin: auto; width: 100%"><legend style="text-align: center; margin: auto;">ejemplo</legend>

<fieldset style="width: 45%; float: left"><legend>entrada</legend>
<input type="text" name="entrada" >
<button type="button" onclick="window.open('popup.html?destino=ej.entrada', '_blank', 'width=277,height=202')">
rellenar entrada
</button>
</fieldset>

<fieldset ><legend>salida</legend>
<input type="text" name="salida" >
<button type="button" onclick="window.open('popup.html?destino=ej.salida', '_blank', 'width=277,height=202')">
rellenar salida
</button>
</fieldset>
</fieldset>
</form>

<p>

A partir de este formulario bastaría con definir 2 nuevas funciones en el popup para que funcione el
calendario a la perfección: una de ellas leería los parámetros de entrada (también puede hacerse con
otros lenguajes como asp, php... pero en javascript es tan sencillo como poner estas líneas en una
sección script de la página:
</p>
<pre>
var campoDestino;
var formDestino;
function leerDestino()	{
	url = location.search.substr(1).split("=");
	Destino = url[1].split(".");
	formDestino = Destino[0];
	campoDestino = Destino[1];
}
window.onload = leerDestino;
</pre>

<p>
Hay distintas formas de obtener variables desde una página, así que no voy a comentar el script, y
quién conozca otra forma que lo haga a su gusto... ahora tan solo voy a añadir la forma de definir
la función que llenará los campos que hemos reservado para las fechas:
</p>

<pre>
// "seleccionaFecha" debe ser el cuarto parámetro del calendario.
function seleccionaFecha(dd, mm, aa)	{
	if (opener)	{
		opener.document.forms[formDestino][campoDestino].value = dd + "/" + mm + "/" + aa;
		window.close();
	}
	else	alert("año: " + aa + "\nmes: " + mm + "\ndia: " + dd);
}
</pre>


</div>

<div id="otrasFechas" >
<h3>Versión DOM</h3>
<p>
También se puede usar un script que crea integramente el calendario de forma dinámica usando DOM (javascript).

<span style="text-decoration: line-through" >
Por el momento no funciona en el explorador Internet Explorer, pero en cuanto solucione el problema,
lo comunicaré.</span>
</p>
<p>
En este caso hacen falta otros parámetros: el sitio donde se quiere crear y un valor lógico cierto/falso
(true/false) indicando si se debe insertar al principio o al final del sitio especificado (su atributo id)
</p>
<p>
La forma de insertar este segundo calendario en esta página es la siguiente: 
</p>

<pre>
&lt;body
onload="_ya = new Date();
 calendario(	_ya.getMonth(),
		_ya.getFullYear(),
		'calendario',
		'otrasFechas',
		false,
		'seleccionandoFecha')" &gt;
</pre>

</div>

<div>
<h3>Agradecimiento</h3>
<p>
Agradezco la ayuda que siempre me han dado desde los foros del web, y en este script
un agradecimiento especial a "Cap.Buscapina" que ha participado en el siguiente mensaje:
<a href="http://www.forosdelweb.com/showthread.php?t=419823" >
creación dinámica de formularios (explorer) </a>.
</p>
<hr />
</div>




<div style="text-align: center; margin: 0">

<script type="text/javascript" src="http://www.caricatos.net/scripts/editor.js"></script>
<br /><h2>Comentarios</h2><div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #eeeddd;">
Nombre: Majony
<br />
Procedencia: estudiante
<br />
E-mail: juanc.romeroc@gmail.com
<br />
URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
Muy bueno y util 
</p>

</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #dddeee;">
Nombre: Roberto
<br />
Procedencia: España
<br />
E-mail: ranguita@swamedida.com
<br />
URL: http://www.swamedida.com
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
Muchas gracias por tu aporte, el calendario era justo lo que andaba buscando, pero no he conseguido que funcione correctamente ya que cuando pulso la fecha de salida se borra la de entrada y vicebersa, podrias echarme una mano?
</p>
</div>
<hr />

<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #eeeddd;">
Nombre: maria
<br />
Procedencia: Avila
<br />
E-mail: mnv_17@hotmail.com
<br />
URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
Hola,el calendario funciona a la perfección, pero tengo un problema, he puesto uno para la fecha de inicio y otro para la fecha de fin, el problema es que cuando introduzco por ejemplo la fecha inicio 1/9/2008 y fecha fin 10/9/2008 me dice que la fecha de inicio debe ser menor que la fecha fin, porque hago una comprobación de fechas pero esa comprobación de fechas está correcta, solo me da problemas cuando el dgito primero de fecha inicio solo es una cifra, espero que me puedan ayudar para ver que necesito cambiar.
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #dddeee;">
Nombre: principiante

<br />
Procedencia: Santiago de Chile
<br />
E-mail: dinamo68@hotmial.com
<br />
URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
excelente, era lo que necesita y funciona muy bien

Saludos y Gracias.
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #eeeddd;">
Nombre: quie
<br />
Procedencia: estudiante

<br />
E-mail: kerre_73173@hotmail.com
<br />
URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
YA TENGO EL CODIGO DEL CALENDARIO EN POP-UP PERO AL MOMENTO DE DAR CLICK EN LLENAR ENTRADA NO APARECE EL CALENDARIO COMO LE HAGO PARA QUE HAGA LO MISMO QUE HACE EN LA PAGINA PERO EN MI PC, PASAME EL CODIGO NO! POR FAVOR,Y NO PUEDO CON OTRO CALENDARIOS. ME GUSTARIA QUE ME DIGERAS PASO POR PASO ES QUE SOY NUEVO EN ESTO, QUE CODIGO PONER O QUE HACER , !!!!!!! POR FAVOR, URGENTE. 
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #dddeee;">
Nombre: Valdemar Ruben
<br />
Procedencia: Estado de Mexico
<br />
E-mail: valdemar1983@hotmail.com

<br />
URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">

Hola un favor no tendran codigo  para poner la fecha y la hora separados en  input (cajas de texto) de un formulario de manera automatica para q al momento de dar guardar se guarde junto con la demas informacion q se tecleo lo quiero de manera automatica para ahorrar tiempo al momento de capturar. tambien el codigo de un calendario desplegable pero el formato de la fecha sea ano mes y dia si saben donde podria conseguirlo se los agradeseria mucho
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #eeeddd;">
Nombre: jesus ruelas vargas
<br />
Procedencia: michoacan, mexico
<br />
E-mail: guaimo86@hotmail.com
<br />

URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
YA TENGO EL CODIGO DEL CALENDARIO EN POP-UP PERO AL MOMENTO DE DAR CLICK EN LLENAR ENTRADA NO APARECE EL CALENDARIO COMO LE HAGO PARA QUE HAGA LO MISMO QUE HACE EN LA PAGINA PERO EN MI PC, PASAME EL CODIGO NO! PRO FAVOR ES QUE LE ESTOY BA5TALLANDO Y NO PUEDO CON OTRO CALENDARIOS. ME GUSTARIA QUE ME DIGERAS PASO POR PASO ES QUE SOY NUEVO EN ESTO, QUE CODIGO PONER O QUE HACER , !!!!!!! POR FAVOR, URGENTE.
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #dddeee;">
Nombre: pablo
<br />
Procedencia: argentina
<br />
E-mail: pablo@vissionflash.com.ar
<br />
URL: http://
<br />

comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
PERFECTO! buenissimo, ahora mi pregunta es: como puedo hacer para enviar estos campos, junto a los datos de contacto por medio un enviar.php? agradecere respuesta, salu2
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #eeeddd;">
Nombre: phillippe
<br />
Procedencia: chile
<br />
E-mail: hatakekakashi__7@hotmail.com
<br />
URL: http://
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">

muy bueno el calendario justo estaba buscando uno en que me permitiera ingresar el año libremente ya que otros que he visto tienes que clickear año por año lo cual resulta un poco lento, excelente trabajo. PD: al del post anterior si es que todavia tiene problemas que me envie un mail para ayudarlo.
</p>
</div>
<hr />
<div style="text-align: justify; margin: .5cm; padding: .5cm; border: 1px solid gray; background-color: #dddeee;">
Nombre: regfgo
<br />
Procedencia: estudiante
<br />
E-mail: fredyrecalde@hotmail.com
<br />
URL: 
<br />
comentario:
<p style="border: 1px solid gray; background-color: #EEEEFF; color: blue; text-indent: 1cm; margin: .5cm">
Es muy interesante ver en funcionmiento el calendario, justo lo que buscaba, mas aun tengo problemas en implementarlo en mi pagina , estoy haciendo mis pinonos en php ,y no me funciona el calendario, me podrias ayudar para saber como hacer que funsione 
</p>

</div>
<hr />
<h2 id="comentar">Colabore enviando su comentario</h2>
<div style="text-align: center">
<form name="comentario" method="post" action="http://www.caricatos.net/webmaster/comentar.php" >
<table style="width: 80%; margin: auto; border: 1px solid gray">
<tbody>

<tr>
<td style="width: 20%" >
<input type="hidden" name="activo" value="1" />
<input type="hidden" name="elemento" value="script.calendario" />
Nombre
</td>
<td style="width: 80%">:<input type="text" name="Nombre" style="width: 80%" value="" /></td>

</tr>

<tr>
<td>Procedencia</td>
<td>:<input type="text" name="desde" style="width: 80%" value="" /></td>
</tr>

<tr>
<td>E-mail</td>
<td>:<input type="text" name="Email" style="width: 80%" value="" /></td>
</tr>

<tr>

<td>Página web</td>
<td>:<input type="text" name="URL" style="width: 80%" value="http://" /></td>
</tr>



<tr>
<td colspan="2" >
<fieldset style="width: 90%; margin: auto" ><legend>Código de envío</legend><input type="hidden" name="captcha" value="UJGUTS" />

<p style="margin: 0">
Rellene el campo adjunto con la clave de la imagen para poder enviar su comentario.


<img src="http://www.caricatos.net/webmaster/captcha.jpg?n=UJGUTS" style="float: right" alt="codigo de envío" 
onclick="this.src = 'http://www.caricatos.net/webmaster/captcha.jpg?azar=' + Math.random()"/>
<input type="text" name="codeCaptcha" size="6" style="float: right" />

</p>
</fieldset>
</td>
</tr>

<tr>
<td colspan="2" >
<fieldset style="text-align: left">
<legend>Edición</legend>
	<img src="http://www.caricatos.net/editor/negrita.gif" alt="negrita" onclick="formatear(this, 'Negrita')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<img src="http://www.caricatos.net/editor/cursiva.gif" alt="cursiva" onclick="formatear(this, 'Cursiva')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<img src="http://www.caricatos.net/editor/subrayado.gif" alt="subrayado" onclick="formatear(this, 'Subrayado')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<span class="separador" >&nbsp;</span>

	<img src="http://www.caricatos.net/editor/texto.gif" alt="formato"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<span class="separador" >&nbsp;</span>
	<img src="http://www.caricatos.net/editor/left.gif" alt="alineación izquierda" onclick="parrafar('izquierdo')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<img src="http://www.caricatos.net/editor/right.gif" alt="alineación derecha" onclick="parrafar('derecho')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<img src="http://www.caricatos.net/editor/center.gif" alt="alineación centrada" onclick="parrafar('centrado')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<img src="http://www.caricatos.net/editor/justify.gif" alt="alineación justificada" onclick="parrafar('justificado')"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />
	<span class="separador" >&nbsp;</span>
	<img src="http://www.caricatos.net/editor/parrafo.gif" alt="formato de alineación"
	style="border: 2px solid #eeeeee" onmouseover="this.style.borderStyle = 'outset'" 
	onmouseout="this.style.borderStyle = 'solid'" />

</fieldset>
<textarea id="comentando" name="comentario" cols="80" rows="5" style="width: 100%; height: 100px"></textarea>
</td>
</tr>



<tr>
<td colspan="2" >
<button type="submit" style="width: 100%; ">Envíe su comentario</button>
</td>
</tr>



</tbody>
</table>
</form>
<script type="text/javascript">
elEditor = ini_editor(document.getElementById('comentando'));
function parrafar(estilo)	{
	_insertar(elEditor, '[' + estilo + ']' + _lector() + '[/' + estilo + ']');
}

function formatear(boton, estilo)	{
	boton.style.borderStyle = "inset";
	_seleccion = _lector();
	_resultado = prompt(estilo + ":", _seleccion);
	if (_resultado == null)
		_insertar(elEditor, _seleccion);
	else
		_insertar(elEditor, '[' + estilo + ']' + _resultado + '[/' + estilo + ']');
	boton.style.borderStyle = "outset";
}

function insertarAsterisco()	{
	_insertar(elEditor, "*");
}

</script>

</div>


<hr />
<p style="text-align: center" >
	<a href="http://validator.w3.org/check?uri=referer">
	<img style="border:0;width:88px;height:31px"
	src="http://www.w3.org/Icons/valid-html401"
	alt="Valid HTML 4.01 Strict" ></a>

	<a href="http://jigsaw.w3.org/css-validator/check/referer">
	<img style="border:0;width:88px;height:31px"
	src="http://jigsaw.w3.org/css-validator/images/vcss" 
	alt="¡CSS Válido!"></a>

	<a href="http://www.caricatos.net">
	<img style="border: 0; width: 88px; height: 31px"
	src="http://www.caricatos.net/webmaster/webmaster.png" 
	alt="Página del webmaster"></a>

	<br /><b>Visitas</b>:
	<img src="http://www.caricatos.net/webmaster/contador.png?origen=caricatos&amp;url=script.calendario&amp;mostrar=si"
	alt="contador" />


</p>

</div>


</body>
</html>
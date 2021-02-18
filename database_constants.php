<?php
/*********************************************************************************
 *
 *                           A T T E N T I O N !
 *
 *  ||  Please modify the following database connection variables to match  ||
 *  \/  the MySQL database and user that you have created for OpenBiblio.   \/
 *********************************************************************************
 */
define("OBIB_HOST",     "localhost");
define("OBIB_DATABASE", "OpenBiblio");
define("OBIB_USERNAME", "obiblio_user");
define("OBIB_PWD",      "obiblio_password");
/*********************************************************************************
 *  /\                                                                      /\
 *  ||                                                                      ||
 *********************************************************************************
 */

	$servidor = "localhost";
	$usuario = "obiblio_user";
	$clave = "obiblio_password";
	$basedatos = "OpenBiblio";
	$connect = mysql_connect($servidor,$usuario,$clave);
	mysql_select_db($basedatos,$connect);
?>

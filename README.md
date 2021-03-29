# SisBanco

Proyecto para mejorar el actual sistema de alquileres de libros en los Bancos de Libros de La Universidad del Zulia. 

El sistema original fue creado en FoxPro para MsDos, pero estaba lleno de errores y no permitia la conexion multiusuario de sus bases de datos para los puntos de atencion y catálogos. Tuve a mi cargo realizar estas reparaciones, y luego de trabajar un tiempo en la reformas migré el programa a Visual FoxPro. Posterior a ello se penso en migrar a una plataforma Web para que los catálogos estuvieran en linea y disponibles para que todos los estudiantes pudieran revisar el catalogo y hacer reservaciones de los libros solicitados.

Para lograr esto, se evaluaron programas de software libre basados en Apache, Php y MySql, optando por usar un sistema casi adecuado para ello. El sistema es OpenBiblio, un sistema muy completo destinado para el préstamo de libros en las bibliotecas. Pero habia que hacerle muchas modificaciones al sistema para lograr agregar el proceso de alquiler, control y facturación y asi adaptarlo a los requerimientos del Banco de Libros.

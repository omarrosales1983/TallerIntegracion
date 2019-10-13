<html>
<head>
<a name="arriba"></a>
<title>Ayuda</title>
<h1>Bienvenido Ayuda del Sistema</h1>
</head>
<body>
<div id="navegación">
<div class="menu"><a href="iniciousuario.php">Inicio</a></div>
<div class="menu"><a href="insertarusuario.php">Guardar</a></div>
<div class="menu"><a href="ayuda.php">Ayuda</a></div>
<div class="menu"><a href="index.php">Salir</a></div>
</div>

<?php

$host="localhost"; //dirección donde se encuentra alojada nuestra pagina
			$usuario="root";//nombre de usuario de la base de datos
			$contraseña="";//contraseña de la base de datos
			$basededatos="agenda";//nombre de la base de datos

			$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");

$bitacora="insert into bitacora (usuario,fecha,accion) values ('usuario',NOW(),'ayuda')";
mysqli_query($conectar,$bitacora);
mysqli_close($conectar);
?>


<style>
.menu a {
	text-decoration:none; 
	text-align:center;
	}

.menu{
	width: 13%; 
	float:left;
	}
a {text-decoration:none;}

</style>
<ul>
<br>
<br>
<li><a href="#primero">Como ingresar un nuevo contacto</a></li> <br>
<br>
</ul>

<a name="primero"><h2>Como ingresar un nuevo contacto</h2><a/>
<p> 
Para poder ingresar un nuevo ususario primero debes estar registrado como usuario autorizado en nuestro sitio, es importante, que rellene todos los campos.
</p>
<center><img src="./imagenes/insertar/datos.png" width="500" height="400" ></center>
<p>
Aqui tenemos los datos que actualmente se encuentran almacenados en la base de datos.
</p>
<center><img src="./imagenes/insertar/insertar.png" width="500" height="400" ></center>
<p>
Todos los campos que muestra la imagen son los campos requeridos para el almacenamiento correcto de un contacto en la base de datos.
</p>
<center><img src="./imagenes/insertar/validar.png" width="500" height="400" ></center>
<p>
Para poder almacenar un registro debemos llenar todos los campos solicitados.
</p>
<center><img src="./imagenes/insertar/novalido.png" width="500" height="400" ></center>
<p>
Si el RUT que ingresamos en la casilla de texto no es un RUT valido el sistema nos informara de eso, y deberemos cambiarlo.
</p>
<center><img src="./imagenes/insertar/okey.png" width="500" height="400" ></center>
<p>
Despues de pasar las validaciones, y almacenar el registro en la base de datosnos enviara un mensaje informandonos que se almaceno correctamente.
</p>
<center><img src="./imagenes/insertar/verifica.png" width="500" height="400" ></center>
<p>
Una vez almacenado el registro verificamos en la ficha de inicio que se encuentre almacenado correctamente.
</p>

<a href="#arriba">Volver Arriba</a>

</body>
</html>

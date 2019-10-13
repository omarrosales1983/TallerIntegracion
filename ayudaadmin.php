<html>
<head>
<a name="arriba"></a>
<title>Ayuda</title>
<h1>Bienvenido Ayuda del Sistema</h1>
</head>
<body>
<div id="navegación">
<div class="menu"><a href="proyecto.php">Inicio</a></div>
<div class="menu"><a href="insertar.php">Guardar</a></div>
<div class="menu"><a href="modificar.php">Modificar</a></div>
<div class="menu"><a href="eliminar.php">Eliminar</a></div>
<div class="menu"><a href="seguridad.php">Copia Seguridad</a></div>
<div class="menu"><a href="ayudaadmin.php">Ayuda</a></div>
<div class="menu"><a href="salir.php">Salir</a></div>
</div>

<?php
$host="localhost"; //dirección donde se encuentra alojada nuestra pagina
			$usuario="root";//nombre de usuario de la base de datos
			$contraseña="";//contraseña de la base de datos
			$basededatos="agenda";//nombre de la base de datos

			$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");

$bitacora="insert into bitacora (usuario,fecha,accion) values ('admin',NOW(),'ayuda')";
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
<li><a href="#segundo">Como eliminar un contacto</a></li><br>
<li><a href="#tercero">Como modificar información de un contacto</a></li><br>
<li><a href="#cuarto">Como realizar una copia de seguridad</a></li><br>
<li><a href="#quinto">Como restaurar una copia de seguridad</a></li><br>
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
<a name="segundo"><h2>Como eliminar un contacto</h2></a>
<p>
Para eliminar cualquier contacto debe tener los permisos necesarios para poder realizarlo, para eso debemos tener el nivel de administrador, de caso contrario
no podremos eliminar ningun contacto, teniendo en cuenta lo anterior, para eliminar un contacto, debemos hacerlo a través de su RUT, si el rut no se encuentra
sera imposible eliminar el registro. Para poder realizarlo hay que seguir los siguientes pasos.
</p>
<center><img src="./imagenes/eliminar/datos.png" width="500" height="400" ></center>
<p>
Ingresando al sistema de información de los contactos tenemos los siguientes datos, para poder eliminar un contacto, se debe ir a la ficha que dice eliminar.
</p>
<center><img src="./imagenes/eliminar/eliminar.png" width="500" height="400" ></center>
<p>
Una vez dentro de la ficha de eliminar, nos solicitara el RUT del contacto que deseamos eliminar.
</p>
<center><img src="./imagenes/eliminar/validar.png" width="500" height="400" ></center>
<p>
Sino ingresamos ningun dato en la casilla de texto nos enviara un mensaje diciendo que debemos ingresar un rut.
</p>
<center><img src="./imagenes/eliminar/noexiste.png" width="500" height="400" ></center>
<p>
Si el rut que ingresamos no es un RUT valido, el sistema avisara que el RUT ingresado no es valido.
</p>
<center><img src="./imagenes/eliminar/okey.png" width="500" height="400" ></center>
<p>
De caso contrario si el RUT ingresado es valido y se encuentra el registro en la base de datos este enviara un mensaje que el registro se elimino correctamente.
</p>
<center><img src="./imagenes/eliminar/final.png" width="500" height="400" ></center>
<p>
Si vamos a la ficha de inicio donde nos muestra los registros de la base de datos podemos ver que el registro se elimino.
</p>
<a href="#arriba">Volver Arriba</a>
<a name="tercero"><h2>Como modificar información de un contacto</h2></a>
<p>
Para poder modificar cualquier información de un contacto en nuestra base de datos, es importante que cuentes con los permisos correspondientes para poder
realizar dicha acción, teniendo los permisos correspondientes es posible que puedas modificar la información personal del contacto mediante su RUT, el
sistema verificara si el rut ingresado se encuentra en la base de datos y procedera a modificar la información del contacto. 
</p>
<center><img src="./imagenes/modificar/modificar.png" width="500" height="400" ></center>
<p>
Estos son los datos solicitados para la modificación.
</p>
<center><img src="./imagenes/modificar/validar.png" width="500" height="400"></center>
<p>
Si en los campos de datos, no hems ingresado ninguno nos avisara mediante un color rojo y texto descriptivo que debemos llenar los campos para que sean modificados correctamente.
</p>
<center><img src="./imagenes/modificar/datos.png" width="500" height="400"></center>
<p>
LLenamos con información los campos solicitados, a modo que podamos realizar el ejercicio de modificación.
</p>
<center><img src="./imagenes/modificar/ok.png" width="500" height="400"></center>
<p>
Modificados correctamente los datos, nos enviara un mensaje que han sido modificados correctamente.
</p>
<center><img src="./imagenes/modificar/comprobacion.png" width="500" height="400"></center>
<p>
Hemos modificado el correo electronico relacionado con el numero de RUT: 150650321
</p>
<a href="#arriba">Volver Arriba</a>
<a name="cuarto"><h2>Como realizar una copia de seguridad</h2>
<p>
Para poder realizar una copia se seguridad de nuestra base de datos, esta se hace directamente en el servidor, solamente los usuarios que tengan el nivel de 
administrador podran realizar las copias de seguridad de la base de datos en el servidor, esto se hace automaticamente mediante una programación realizada 
en un archivo .bat, para realizar una copia de seguridad se debe seguir los siguientes pasos.<br>
Estando en la ficha de inicio donde se muestran todos los datos de nuestra agenda, debemos ir a la ficha que se llama, Copia Seguridad. <br>
A nosotros no nos mostrara nada pero realizara una copia de seguridad al memento de darle clic en el boton. Quedando como se muestra en las imagenes referenciales.

</p>

<center><img src="./imagenes/seguridad/inicio.png" width="500" height="400"></center>
<center><img src="./imagenes/seguridad/copia.png" width="500" height="400"></center>

<a href="#arriba">Volver Arriba</a>
<a name="quinto"><h2>Como restaurar una copia de seguridad</h2>
<p>
Para poder restaurar una copia se seguridad, debes tener las credenciales para poder acceder, a nustro servidor de manera fisica o remota.
Luego de eso debes identificar la carpeta del proyecto dentro de los archivos de respaldo del mismo.
Estando dentro del servidor, debes utilizar un navegador para poder acceder a phpMyAdmin, mediante la dirección web 192.168.0.1 o a través de localhost. De
esta manera podras ingresar a la base de datos, y realizar la restauración de la base de datos, a continuación te describiremos los pasos a seguir:
</p>
<center><img src="./imagenes/restaurar/phpmyadmin.png" width="500" height="400"></center>
<p>
Al ingrasar a la dirección web debemos ingresar a phpMyAdmin, para acceder a la base de datos MySQL.
</p>
<center><img src="./imagenes/restaurar/phpmyadmin2.png" width="500" height="400"></center>
<p>Una vez entro de la base de datos, se debe seleccionar la base de datos Agenda.</p>
<center><img src="./imagenes/restaurar/seleccionar.png" width="500" height="400"></center>
<p>Para poder restaurar correctamente el respaldo de la base de datos, es indispensable borrar la anterior, para mantener la integridad de esta.</p>
<p>Debemos ejecutar una sentencia SQL para poder eliminar las tablas dentro de la base de datos. Se debe hacer de la siguiente manera.</p>
<center><img src="./imagenes/restaurar/drop.png" width="500" height="400"></center>
<p>
Una rez, realizada correctemente la sentencia debemos, darle clic el botón de continuar y nos mostrara el siguiente mensaje para aceptar la confirmación.
</p>
<center><img src="./imagenes/restaurar/confirmar.png" width="500" height="400"></center>
<p>
Una vez aceptado el mensaje de confirmación, realizara la eliminación de la base de datos. Si hubiera un error avisaria que existe un error al eliminar la base de datos.
</p>
<center><img src="./imagenes/restaurar/exitoso.png" width="500" height="400"></center>
<p>
Para poder restaurar la base de datos, debemos ir a la pestaña importar, para poder seleccionar el respaldo de base de datos, que realiza el servidor.<br>
Presionando el botón de Seleccionar Archivo, y seleccionamos el respaldo de la base de datos a restaurar.
</p>
<center><img src="./imagenes/restaurar/importar.png" width="500" height="400"></center>
<p></p>
<center><img src="./imagenes/restaurar/select.png" width="500" height="400"></center>
<p>
Seleccionada la base de datos, se debe dar clic en el botón continuar para realizar la restauración.
</p>
<center><img src="./imagenes/restaurar/confir.png" width="500" height="400"></center>
<p>
Realizada correctamente la restauración de la base de datos y los datos que se encontraban dentro de ella.
</p>
<center><img src="./imagenes/restaurar/okey.png" width="500" height="400"></center>
<p></p>

<br>
<a href="#arriba" >Volver Arriba</a>
</body>
</html>

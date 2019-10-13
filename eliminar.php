<html>

<head>
<title>Eliminar Datos</title> 
<h1>Proyecto Taller Integración </h1>
<?php
//validacion de datos en el formulario

if($_POST){
	
$rut=$_POST["rut"];

//funcion que nos permite validar el rut utilizando digito verificador

function valida_rut($rut)
{
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

			$host="localhost"; //dirección donde se encuentra alojada nuestra pagina
			$usuario="root";//nombre de usuario de la base de datos
			$contraseña="";//contraseña de la base de datos
			$basededatos="agenda";//nombre de la base de datos

			$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");
			$buscarrut="select * from usuarios where rut='$rut'";
						
$claseRut ="";

$caracteresrut=9;//definimos la cantidad de caracteres del rut
	if($resultado = mysqli_query($conectar,$buscarrut))
		{
			if(!mysqli_num_rows($resultado)>0)
			{
			$mensajeRut= "rut no existe";
			$claseRut = "error";
			}
		}
	if(!$rut) {
	$mensajeRut= "debe ingresar un rut";
	$claseRut = "error";
	}
	elseif(strlen($_POST['rut'])<$caracteresrut) //valida la longitud de los caracteres de un rut
		{
			$mensajeRut= "debe ingresar un rut valido";
			$claseRut = "error";
		}
	
	else
	{
		if(!valida_rut($_POST['rut'])) //llamamos a la función y verficamos que el rut ingresado es valido
		{
			$mensajeRut= "debe ingresar un rut valido";
			$claseRut = "error";
		}
	}
	
$host="localhost"; //dirección donde se encuentra alojada nuestra pagina
$usuario="root";//nombre de usuario de la base de datos
$contraseña="";//contraseña de la base de datos
$basededatos="agenda";//nombre de la base de datos

$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");

if( $claseRut=="")
{
	
$eliminar="delete from usuarios where rut='$rut'";
mysqli_query($conectar,$eliminar);

$bitacora="insert into bitacora (usuario,fecha,accion) values ('admin',NOW(),'elimina registro')";
mysqli_query($conectar,$bitacora);

mysqli_close($conectar);

echo "<script>alert('Registro eliminado correctamente');</script>";
}

}
?>
<div id="navegación">
<div class="menu"><a href="proyecto.php">Inicio</a></div>
<div class="menu"><a href="insertar.php">Guardar</a></div>
<div class="menu"><a href="modificar.php">Modificar</a></div>
<div class="menu"><a href="eliminar.php">Eliminar</a></div>
<div class="menu"><a href="seguridad.php">Copia Seguridad</a></div>
<div class="menu"><a href="ayudaadmin.php">Ayuda</a></div>
<div class="menu"><a href="salir.php">Salir</a></div>
</div>

<style>
a {
	text-decoration:none; 
	text-align:center;
	}

div label{
	float: left;
	width:5%;
	}

.error{
	background: red;	
	}
	
.msg{
	color: white;	
}
.menu{
	width: 13%; 
	float:left;
	}

</style>
</head>
<body>
<br><h3>Eliminar Datos</h3>
<h4>Para Eliminar datos ingrese Rut</h4>
<form name="ingresar" method="post" action="eliminar.php">
<fieldset>
<legend>Datos a Eliminar</legend>
<div class="<?php echo $claseRut; ?>">
<label>Rut:</label>
<input type="text" name="rut">
<span class="msg"><?php echo $mensajeRut; ?></span>
</div>
<input type="submit" value="Eliminar"/>
</div>
</fieldset>
</form>
</body>
<?php

?>
</html>
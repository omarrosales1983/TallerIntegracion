<html>

<head>
<title>Guardar Datos</title> 
<h1>Proyecto Taller Integración </h1>
<?php
//validacion de datos en el formulario

if($_POST){
	
$rut=$_POST["rut"];
$nombre=$_POST["nombre"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];


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


$claseRut ="";
$claseNombre="";
$claseTelefono="";
$claseCorreo="";

$caracteresrut=9;//definimos la cantidad de caracteres del rut

			$host="localhost"; //dirección donde se encuentra alojada nuestra pagina
			$usuario="root";//nombre de usuario de la base de datos
			$contraseña="";//contraseña de la base de datos
			$basededatos="agenda";//nombre de la base de datos

			$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");
			$buscarrut="select * from usuarios where rut='$rut'";
			$buscarcorreo="select * from usuarios where correo='$correo'";
			
// valida si el rut ya se encuentra almacenado en la base de datos
if($resultado = mysqli_query($conectar,$buscarrut))
		{
			if(mysqli_num_rows($resultado)>0)
			{
			$mensajeRut= "rut ya existe";
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
	
	else{
		if(!valida_rut($_POST['rut'])) //llamamos a la función y verficamos que el rut ingresado es valido
		{
			$mensajeRut= "debe ingresar un rut valido";
			$claseRut = "error";
		}
		
	}
		
if(!$nombre)
{
	$mensajeNombre= "debe ingresar un nombre";
	$claseNombre="error";
}
if(!$telefono){
	$mensajeTelefono="debe ingresar un telefono";
	$claseTelefono="error";
}
else
{
	if(!is_numeric($telefono)){
		$mensajeTelefono="debe ingresar un número";
		$claseTelefono="error";
	}
}
//valida si el correo ya se encuentra almacenado en la base de datos
if($resultadocorreo = mysqli_query($conectar,$buscarcorreo))
{
			if(mysqli_num_rows($resultadocorreo	)>0)
			{
			$mensajeCorreo= "correo ya existe";
			$claseCorreo = "error";
			}
}
//funcion que nos permite que en el campo solo ingresemos correo analizando si tiene arroba
function validarCorreo($correo)
{
  return (false !== strpos($correo, "@") && false !== strpos($correo, "."));
}
if(!$correo) {
	$mensajeCorreo= "debe ingresar un correo";
	$claseCorreo="error";
}
else
{
if(!validarCorreo($_POST['correo']))
{
	$mensajeCorreo= "debe ingresar un correo valido";
	$claseCorreo="error";
}	
}
//si las clases no tienen ningun error entonces almacenamos los registros en nuestra base de datos
if( $claseRut==""&& $claseNombre==""&& $claseTelefono=="" && $claseCorreo =="")
{

$insertar="insert into usuarios (RUT,NOMBRE,TELEFONO,CORREO) values ('$rut','$nombre','$telefono','$correo')";
mysqli_query($conectar,$insertar);

$bitacora="insert into bitacora (usuario,fecha,accion) values ('usuario',NOW(),'insertar registro')";
mysqli_query($conectar,$bitacora);

mysqli_close($conectar);

echo "<script>alert('Registro almacenado correctamente');</script>";
}

}
?>
<div id="navegación">
<div class="menu"><a href="iniciousuario.php">Inicio</a></div>
<div class="menu"><a href="insertarusuario.php">Guardar</a></div>
<div class="menu"><a href="ayuda.php">Ayuda</a></div>
<div class="menu"><a href="index.php">Salir</a></div>
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
<br><h3>Guardar Datos</h3>
<form name="ingresar" method="post" action="insertarusuario.php">
<fieldset>
<legend>Datos de Ingreso </legend>
<div class="<?php echo $claseRut; ?>">
<label>Rut:</label>
<input type="text" name="rut">
<span class="msg"><?php echo $mensajeRut; ?></span>
</div>
<div class="<?php echo $claseNombre;?>">
<label>Nombre:</label>
<input type="text" name="nombre" >
<span class="msg"><?php echo $mensajeNombre; ?></span>
</div>
<div class="<?php echo $claseTelefono;?>">
<label>Teléfono:</label>
<input type="text" name="telefono">
<span class="msg"><?php echo $mensajeTelefono; ?></span>
</div>
<div class="<?php echo $claseCorreo;?>">
<label>Correo</label>
<input type="text" name="correo">
<span class="msg"><?php echo $mensajeCorreo; ?></span>
</div>
<div>
<input type="submit" value="Guardar"/>
</div>
</fieldset>
</form>
</body>
<?php

?>
</html>
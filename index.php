<html>
<head>
<title>Control de Acceso</title>
<?php
if($_POST){
$usuario=$_POST["usuario"];
$clave=$_POST["clave"];

$claseUsuario="";
$claseClave="";

if(!$usuario)
{
$mensajeUsuario="Debe ingresar un usuario";	
$claseUsuario="error";
}// final if usuario
if(!$clave)
{
$mensajeClave="Debe ingresar una clave";
$claseClave="error";
} //final if clave

$host="localhost";
$user="root";
$contraseña="";
$basededatos="agenda";
$conectar = mysqli_connect($host,$user,$contraseña,$basededatos) or dir ("problemas al conectar con el servidor");

$sqlvalidar="select * from acceso where usuario ='$usuario' and clave ='$clave'";
$sqlnivel="select nivel from acceso where usuario='$usuario' and clave='$clave'";

if($resultado = mysqli_query($conectar,$sqlvalidar))
{
	if(mysqli_num_rows($resultado)<=0)
	{
	echo "<script>alert('Usuario incorrecto')</script>";	
	}
}
if($resultadonivel=mysqli_query($conectar,$sqlnivel))
{
	if($fila=mysqli_fetch_array($resultadonivel))
	{
		if($fila[0]=="Usuario")
		{
			echo "<script>alert('Bienvenido Usuario'):</script>";
			header ('location:usuario.php');
		}
		else
			{
				if($fila[0]=="Administrador")
				{
					echo "<script>alert('Bienvenido Administrador');</script>";
					header ('location:proyecto.php');
				}
			}
	}
}

$bitacora="insert into bitacora (usuario,fecha,accion) values ('$usuario',NOW(),'ingreso al sistema')";
mysqli_query($conectar,$bitacora);
mysqli_close($conectar);




} //final post
?>

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
<h1>Ingreso al Sistema</h1>
<form method="POST" name="ingreso" action="index.php">
<div class="<?php echo $claseUsuario; ?>">
<label>Usuario: </label>
<input type="text" name="usuario">
<span class="msg"><?php echo $mensajeUsuario;?> </span>
</div>
<div class="<?php echo $claseClave; ?>">
<label>Clave: </label>
<input type="password" name="clave">
<span class="msg"><?php echo $mensajeClave;?></span>
</div>
<input type="submit" value="Ingresar">
<input type="reset" value="Cancelar">
</form>
</body>
</html>
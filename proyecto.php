<html>
<head>
<title>Bienvenidos</title>
<h1>Proyecto Taller Integración </h1>

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

.menu{
	width: 13%; 
	float:left;
	}

</style>
</head>
<body>
<br><h3> Datos del proyecto</h3>

<?php
$host="localhost"; 
$usuario="root";
$contraseña="";
$basededatos="agenda";

			$conectar=mysqli_connect($host,$usuario,$contraseña,$basededatos) or die ("problemas al conectar con el servidor");
			if ( $conectar -> connect_errno)
			{
			die ("Fallo la conexion al servidor MySQL: (".$conectar -> mysqli_connect_errno().")".$conectar -> mysqli_connect_error());
			}
			
			$seleccionar="select * from usuarios";


		if($resultado = mysqli_query($conectar,$seleccionar))
		{
			if(mysqli_num_rows($resultado) > 0)
				{
				echo "<br>";
				echo "<table>";
					echo "<tr>";
						
						echo "<th>Rut</th>";
						echo "<th>Nombre</th>";
						echo "<th>Telefono</th>";
						echo "<th>Correo</th>";
											
					echo "</tr>";
					while ($fila = mysqli_fetch_array($resultado))
					{
					echo "<tr>";
						
						echo "<td>".$fila['RUT']."</td>";
						echo "<td>".$fila['NOMBRE']."</td>";
						echo "<td>".$fila['TELEFONO']."</td>";
						echo "<td>".$fila['CORREO']."</td>";
						
					echo "</tr>";
					}
				echo "</table>";
				mysqli_free_result($resultado);
						
		
				}
				else
				{
				echo "<script>alert('no se han encontrado registros')</script>";
				}
		}
		
		?>
</body>
</html>
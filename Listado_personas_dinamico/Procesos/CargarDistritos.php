<?php 

include('../Conexion/conexion.php');
$id_pro=$_POST['provincia'];

	$consulta= $conn->query("SELECT id_distrito,
			 nom_distrito
		from distrito
		where id_provincia='$id_pro'");

while($cont=$consulta->fetch(PDO::FETCH_OBJ)){

    $m.="<option value=".$cont->id_distrito.">".$cont->nom_distrito."</option>";
}

echo $m;
?>

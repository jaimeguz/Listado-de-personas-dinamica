<?php
include('Conexion/conexion.php');
include('Conexion/usuario.php');

$consultaTodos = $conn->query("SELECT usuario.id_usuario,usuario.nombre,usuario.apellido,usuario.email,usuario.telefono,provincia.nom_provincia,distrito.nom_distrito,nivel.nom_nivel
FROM
usuario
INNER JOIN
distrito
on usuario.distrito = distrito.id_distrito
inner JOIN
nivel
on usuario.nivel = nivel.id_nivel
INNER JOIN
provincia
on distrito.id_provincia = provincia.id_provincia ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
  <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
    <title>Registro de usuario</title>

</head>
<body class="bg-light" text="center">
<h4 class=" text-center mt-3 ">Crear usuario </h4>
<div class=" shadow-lg p-3 mb-5 mt-4 rounded container  ">
    <form class="row g-3 needs-validation" novalidate method="POST" action="Procesos/Cargar.php">
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="validationTooltip01" name="Nombre"  required>
        <div class="valid-tooltip">
        Completo!
        </div>
        <div class="invalid-tooltip">
            Este campo es necesario!
          </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="validationTooltip02"  name="Apellido"  required>
        <div class="valid-tooltip">
          Completo!
        </div>
      </div>
      <div class="col-md-4 position-relative">
        <label for="validationTooltipUsername" class="form-label">Correo</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
          <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend"  name="Correo" required>
          <div class="invalid-tooltip">
          Este campo es necesario!
          </div>
        </div>
      </div>
      <div class="col-md-6 position-relative">
        <label for="validationTooltip03" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="validationTooltip03"  name="Telefono" required>
        <div class="valid-tooltip">
          Completo!
        </div>
        <div class="invalid-tooltip">
        Este campo es necesario!
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label">Tipo de usuario</label>
        <select class="form-select" id="validationTooltip04"  name="TipoUsuario" required>
            <div class="valid-tooltip">
            Completo!
            </div>
          <option selected disabled value="">Escoja...</option>
            <?php
                $query = $conn->prepare("SELECT * FROM nivel ");
                $query->execute();
                $data = $query->fetchAll();
                foreach ($data as $valores):
                echo '<option value="'.$valores["id_nivel"].'">'.$valores["nom_nivel"].'</option>';
                endforeach;
            ?>
        </select>
        <div class="invalid-tooltip">
        Este campo es necesario!
        </div>
      </div>
    
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label">Seleccione una provincia</label>
        <select class="form-select" id="lista1"  name="lista2" required>
        <div class="valid-tooltip">
          Completo!
        </div>
          <option selected disabled value="">Escoja...</option>
          <?php
                $query = $conn->prepare("SELECT * FROM provincia ");
                $query->execute();
                $data = $query->fetchAll();
                foreach ($data as $valores):
                echo '<option value="'.$valores["id_provincia"].'">'.$valores["nom_provincia"].'</option>';
                endforeach;
            ?>
        </select>
        <div class="invalid-tooltip">
        Este campo es necesario!
        </div>
      </div>
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label">Seleccione un distrito</label>
        <select class="form-select" id="select2lista"  name="distrito" required>
        </select>
        <div class="valid-tooltip">
          Completo!
        </div>
    
        <div class="invalid-tooltip">
        Este campo es necesario!
        </div>
      </div>
    
      <div class="col-12">
        <button  class=" btn btn-outline-success btn-lg mb-2 mt-3 col-md-6" type="submit">Enviar</button>
      </div>
    
    </form>
</div>
<h4 class=" text-center mt-3 ">Lista de usuarios </h4>
<div class=" shadow-lg p-3 mb-5 mt-4 rounded container" >
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Email</th>
          <th scope="col">Telefono</th>
          <th scope="col">Tipo de usuario</th>
          <th scope="col">Provincia</th>
          <th scope="col">Distrito</th>
        </tr>
      </thead>
      <tbody>
      <?php //se recorre todos los registros que provienen de la consulta
                                            while($detalleUsuario=$consultaTodos->fetch(PDO::FETCH_OBJ)){?>
                                            <tr>
                                                <td><?php echo $detalleUsuario->id_usuario;  ?></td>
                                                <td> <?php echo $detalleUsuario->nombre;?> </td>
                                                <td><?php echo $detalleUsuario->apellido; ?></td>
                                                <td><?php echo $detalleUsuario->email; ?></td>
                                                <td><?php echo $detalleUsuario->telefono; ?></td>
                                                <td><?php echo $detalleUsuario->nom_nivel; ?></td>
                                                <td><?php echo $detalleUsuario->nom_provincia; ?></td>
                                                <td><?php echo $detalleUsuario->nom_distrito; ?></td>
                                            </tr>
                                         <?php } ?>
      </tbody>
    </table>
</div>

<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Elaborado por: Jaime Guzmán  Cédula: 8-969-810 &copy; Grupo:1LS-131</span>
                    </div>
                </div>
            </footer>

<script src="Bootstrap/js/form-validation.js"></script>
</body>
</html>

<script type="text/javascript">

    $(document).ready(function(){

        //$('#lista1').val(1);

        recargarLista();

        $('#lista1').change(function(){

            recargarLista();

        });

    })


</script>

<script type="text/javascript">

    function recargarLista(){

        $.ajax({

            type:"POST",

            url:"Procesos/CargarDistritos.php",

            data:"provincia=" + $('#lista1').val(),

            success:function(r){

                $('#select2lista').html(r);

            }

        });

    }

</script>
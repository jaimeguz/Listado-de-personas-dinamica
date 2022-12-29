<?php
    include('../Conexion/conexion.php');
    include ('../Conexion/usuario.php');
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $correo = $_POST['Correo'];
        $tel = $_POST['Telefono'];
        $tu = $_POST['TipoUsuario'];
        $dis = $_POST['distrito'];


        echo ($nombre. "<br>".$apellido."<br>".$correo."<br>".$tel."<br>".$tu."<br>".$dis);

        //Insercion de objetos directamente a la BD
        $datos = new Usuario($nombre,$apellido,$correo,$tel,$tu,$dis);

        //PREPARANDO INSERCCION DE LOS DATOS

        $insercion=  $conn->prepare("INSERT INTO usuario (nombre,apellido,email,telefono,nivel,distrito) value (:Nombre,:Apellido, :Email, :Telefono, :TipoUsuario, :Distrito)");

        try{
            $insercion-> execute((array)$datos);// la insercion se hizo correctamente
            echo '<meta http-equiv="refresh" content="0; url=../index.php?">';
           

        }catch( PDOException $e){
            echo $e;
        }

?>
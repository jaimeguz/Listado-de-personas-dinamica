<?php
  include("config.php");

    // Nombres de constantes correctos
  /*  define("HOST_NAME", "localhost");
    define("USER_NAME", "admin");
    define("PASS", "123456");
    define("DATABASE", "sistemas");
 
 
    //MySQLi clásico
    //Conectando
    $conn = mysqli_connect(HOST_NAME, USER_NAME, PASS, DATABASE);
    //Manejo de errores
    if (!$conn)
    die("Falló la conexión a MySQL: " . mysqli_error($conn));
    else
        echo "Conexión exitosa!";
    
    //mysqli_close($con);



    //MySQLi
    //Conectando
    $conn = new mysqli(HOST_NAME, USER_NAME, PASS, DATABASE);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";
*/


    //MySQL PDO
    try {
      $conn = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE, USER_NAME, PASS);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch(PDOException $e) {
      echo "Problema de conexión : " . $e->getMessage();
    }

?>
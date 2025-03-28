<?php
session_start();
include 'link.php';
if(isset($_POST['val'])) {
  switch ($_POST['val']) {
    case 1 : //autentificacion de usuario login
      if(isset($_POST['email']) && $_POST['email']!='' && isset($_POST['password']) && $_POST['password']!='')      {
        #llegaron los datos
        $sql = "select * from usuario where email='$_POST[email]'";
        $query = mysqli_query($link,$sql);
        $num = mysqli_num_rows($query);
        if ($num==0)
        {?>
          <script> alert("No existe el usuario. "); </script><?php
        }
        else
        {
          # se encontro registro
          $row = mysqli_fetch_array($query); # descargo en el arreglo $row la primera fila
          if ($row['password'] != md5($_POST['password']))
            {# No coincide contraseña?>
              <script> alert("Contraseña Incorrecta. "); </script><?PHP
          } else {
            # Autentificacion (Creamos variables de sesión con los datos del usuario)
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['cedula'] = $row['cedula'];
            $_SESSION['tipo'] = $row['tipo'];
          }
        }
      } else {
      ?>
          <script> alert("Debe rellenar todos los datos. "); </script> <?php
      }
      break;
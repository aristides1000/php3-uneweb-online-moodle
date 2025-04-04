<?php
  $link = mysqli_connect('localhost','root','','d_php3_aristides1000');

  if (!$link) {
    die('Error de Conexión: (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  }
?>
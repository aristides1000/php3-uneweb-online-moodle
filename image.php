<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
  include("link.php");

  $id = $_GET['id'];

  $query = "SELECT imagen FROM producto WHERE id_producto=$id;";

  $result_tasks = mysqli_query($link, $query);

  $img_data = mysqli_fetch_assoc($result_tasks);

  header("Content-type: image/jpg");

  echo $img_data['image'];
?>
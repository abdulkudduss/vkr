<?php  
session_start();
include "../auth/db_conn.php";
$idPack = $_GET['idPackD'];

mysqli_query($conn,"DELETE FROM ` экскурсии` WHERE `id_Экскурсии`=".$idPack);
header("Location: ../profile/create_package.php");
//$idGuide = $_SESSION['idGuide'];

?>
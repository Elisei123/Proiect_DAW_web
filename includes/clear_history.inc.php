<?php
session_start();
include 'conectare.php';

if(isset($_POST['clear_history'])){
    $id_user = $_SESSION['id'];
    $sql = "DELETE FROM tasks WHERE ID_USER = '$id_user' AND Efectuat = 'Da'";
    $result = mysqli_query($conectare, $sql);
    header('Location: ../index.php?info=done_clear_history');
    die();
}else{
    header('Location: ../index.php');
    die();
}
<?php
session_start();
include 'conectare.php';

if(isset($_POST['Nume']) && !empty($_POST['Nume']) && isset($_POST['Parola']) && !empty($_POST['Parola'])) {
    $username = strtolower($_POST['Nume']);
    $password = $_POST['Parola'];

    $sql = "SELECT * FROM `accounts` WHERE Username ='$username'";
    $result = mysqli_query($conectare, $sql);
    $row = $result->fetch_assoc();
    $hash = $row['Parola'];
    $check = password_verify($password, $hash);

    if($check == 0){
        header("Location: ../login.php?info=gresit");
        die();
    }else{
        $sql = "SELECT * FROM `accounts` WHERE Username='$username' AND Parola='$hash'";
        $result = mysqli_query($conectare, $sql);
        if(!$row = $result->fetch_assoc()){
            echo 'Acest cont nu a fost creat.';
        }else{
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['nume'] = $row['Nume'];
            $_SESSION['prenume'] = $row['Prenume'];
            $_SESSION['email'] = $row['Email'];
        }
        header("Location: ../login.php");
    }
}else{
    header("Location: ../login.php?info=incomplet");
}
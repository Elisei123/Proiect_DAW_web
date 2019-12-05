<?php
include "conectare.php";
session_start();

 $nume_cont = $_POST['Numele_Contului'];
$nume = $_POST['Nume'];
$prenume = $_POST['Prenume'];
$email = $_POST['emailaddress'];
$id = intval($_SESSION['id']);

$sql = "UPDATE Accounts SET Username='$nume_cont', Nume='$nume', Prenume='$prenume', Email = '$email' WHERE ID='$id'";
$result = mysqli_query($conectare, $sql);

$sql = "SELECT * FROM `accounts` WHERE ID ='$id'";
$result = mysqli_query($conectare, $sql);
$row = $result->fetch_assoc();

$_SESSION['username'] = $row['Username'];
$_SESSION['nume'] = $row['Nume'];
$_SESSION['prenume'] = $row['Prenume'];
$_SESSION['email'] = $row['Email'];

header("Location: ../settings.php");
die();
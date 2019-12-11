<?php

include "conectare.php";

if(isset($_POST['Numele_Contului']) && !empty($_POST['Numele_Contului']) &&
    isset($_POST['Nume']) && !empty($_POST['Nume']) &&
    isset($_POST['Prenume']) && !empty($_POST['Prenume']) &&
    isset($_POST['emailaddress']) && !empty($_POST['emailaddress']) &&
    isset($_POST['Parola']) && !empty($_POST['Parola'])){

    $Username = strtolower($_POST['Numele_Contului']);
    $Nume = $_POST['Nume'];
    $Prenume = $_POST['Prenume'];
    $Email = $_POST['emailaddress'];
    $Parola = $_POST['Parola'];

    $password_hashed = password_hash($Parola, PASSWORD_DEFAULT);

    $sql = "SELECT Username FROM accounts WHERE Username ='$Username'";
    $result = mysqli_query($conectare, $sql);
    $check = mysqli_num_rows($result);


    if ($check > 0) {
        header("Location: ../register.php?info=nickname-existent");
        die();
    } else {
        $sql = "SELECT Username FROM accounts WHERE Email ='$Email'";
        $result = mysqli_query($conectare, $sql);
        $check = mysqli_num_rows($result);
        if ($check > 0) {
            header("Location: ../register.php?info=email-existent");
            die();
        } else {
            $sql = "INSERT INTO Accounts(Username, Nume, Prenume, Email, Parola) VALUES ('$Username', '$Nume', '$Prenume', '$Email', '$password_hashed')";
            $result = mysqli_query($conectare, $sql);
            header("Location: ../register.php?info=creat");
            die();
        }
    }
}else{
    header("Location: ../register.php?info=campuri_incomplete");
}

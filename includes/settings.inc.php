<?php
include "conectare.php";
session_start();

$nume_cont = $_POST['Numele_Contului'];
$nume = $_POST['Nume'];
$prenume = $_POST['Prenume'];
$email = $_POST['emailaddress'];
$id = intval($_SESSION['id']);

if(($nume_cont != $_SESSION['username']) || $email != $_SESSION['email']) {

    if ($nume_cont != $_SESSION['username']) {
        $sql = "SELECT Username FROM accounts WHERE Username = '$nume_cont'";
        $result = mysqli_query($conectare, $sql);
        $check = mysqli_num_rows($result);
        if ($check > 0) {
            header("Location: ../settings.php?info=username_invalid");
            die();
        }
    }
    if ($email != $_SESSION['email']) {
        $sql = "SELECT Email FROM accounts WHERE Email = '$email'";
        $result = mysqli_query($conectare, $sql);
        $check = mysqli_num_rows($result);
        if ($check > 0) {
            header("Location: ../settings.php?info=email_invalid");
            die();
        }
    }
}
    $sql = "UPDATE accounts SET Username='$nume_cont', Nume='$nume', Prenume='$prenume', Email = '$email' WHERE ID='$id'";
    $result = mysqli_query($conectare, $sql);

    $sql = "SELECT * FROM accounts WHERE ID ='$id'";
    $result = mysqli_query($conectare, $sql);
    $row = $result->fetch_assoc();

    $_SESSION['username'] = $row['Username'];
    $_SESSION['nume'] = $row['Nume'];
    $_SESSION['prenume'] = $row['Prenume'];
    $_SESSION['email'] = $row['Email'];

    if (isset($_POST['change_password']) == 1 && !empty($_POST['parola_veche']) && !empty($_POST['parola_noua1']) && !empty($_POST['parola_noua2'])) {
        $parola_veche = $_POST['parola_veche'];
        $parola_noua = $_POST['parola_noua1'];
        $parola_verificata = $_POST['parola_noua2'];
        if ($parola_noua == $parola_verificata) {
            if ($parola_noua == $parola_veche) {
                header("Location: ../settings.php?info=identica");
                die();
            } else {
                $sql = "SELECT * FROM `accounts` WHERE ID ='$id'";
                $result = mysqli_query($conectare, $sql);
                $row = $result->fetch_assoc();
                $hash = $row['Parola'];
                $check = password_verify($parola_veche, $hash);
                if ($check > 0) {
                    $password_hashed = password_hash($parola_noua, PASSWORD_DEFAULT);
                    $sql = "UPDATE Accounts SET Parola = '$password_hashed' WHERE ID='$id'";
                    $result = mysqli_query($conectare, $sql);
                    header("Location: ../settings.php?info=parola_schimbata");
                    die();
                } else {
                    header("Location: ../settings.php?info=parola_incorecta");
                    die();
                }
            }
        } else {
            header("Location: ../settings.php?info=parola_verificare_diferita");
            die();
        }
    }
    header("Location: ../settings.php?info=Modificate_doar_setarile");

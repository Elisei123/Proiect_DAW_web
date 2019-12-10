<?php include "base.php"?>
<title>Register</title>

<?php
//Redirectionare daca suntem logati;
if(isset($_SESSION['id'])){
    header("Location: index.php");
}
?>

<style>



</style>

<div class="container">
    <div style="padding-top: 10%;" class="spatiu"></div>
    <div style="padding: 10px;" id="register" class="login cases">
        <h3>Creaza cont:</h3>
        <form action="includes/signup.inc.php" method="post">
            <input pattern=".{3,}"   required title="Numele contului trebuie sa contina minim 3 litere/cifre" type="text" name="Numele_Contului" placeholder="Nume cont"><br>
            <input required title type="text" name="Nume" placeholder="Nume"><br>
            <input required title type="text" name="Prenume" placeholder="Prenume"><br>
            <input required title type="email" name="emailaddress" placeholder="Email"><br>
            <input pattern=".{6,}"   required title="Parola trebuie sa contina minim 6 litere"required title class="password" type="password" name="Parola" placeholder="Parola"><br>
            <input class="input-submit" type="submit" value="Register">
        </form>

        <?php

        if(isset($_GET['info']) && $_GET['info'] == 'nickname-existent'){
            echo "<h4 style='color: red'>Nickname-ul este deja existent. <br>Apasa <a style='color: #766cdc' href='login.php'>aici</a> pentru a te authentifica.</h4>";
        }else if(isset($_GET['info']) && $_GET['info'] == 'creat'){
            echo "<h3 style='color: green'>Contul a fost creat cu succes.<br></h3>
                    <h4>Apasa <a style='color: #dc3f29' href='login.php'>aici</a> pentru a te authentifica.</h4>";
        }else if(isset($_GET['info']) && $_GET['info'] == 'email-existent'){
            echo "<h4 style='color: red'>Email-ul este deja existent. <br>Apasa <a style='color: #766cdc' href='login.php'>aici</a> pentru a te authentifica.</h4>";
        }
        ?>

    </div>
</div>

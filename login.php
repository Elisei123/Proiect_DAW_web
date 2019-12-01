<?php include "base.php"?>
<title>Login</title>

<?php

    if(isset($_SESSION['id'])){
        echo "Te-ai logat cu succes. Prenumele meu este " . $_SESSION['prenume'];
    }

?>

<div class="container">
    <div style="padding-top: 10%;" class="spatiu"></div>
    <div style="padding: 10px;" id="login" class="login cases">
        <h3>Conectează-te la cont:</h3>
        <form method="post" action="includes/login.inc.php">
            <input type="text" name="Nume" placeholder="Nume"><br>
            <input id="password" type="password" name="Parola" placeholder="Parola"><br>
            <span>Vezi parola </span><input type="checkbox" id="box" onclick ="VerificareBifa()"><br>
            <input class="input-submit" type="submit" value="Login">
        </form>
        <span style="margin-top: 30px;">Nu ai cont? Dai click </span><a href="register">aici.</a>

        <?php

            if(isset($_GET['info']) && $_GET['info'] == 'gresit'){
                echo "<h4 style='color: red'>Parola este gresita. <br></h4>";
            }else if(isset($_GET['info']) && $_GET['info'] == 'incomplet'){
                echo "<h4 style='color: red'>Nu ai completat casutele. <br></h4>";
            }

        ?>
    </div>
</div>

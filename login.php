<?php include "base.php"?>
<title>Login</title>
<?php
//Redirectionare daca suntem logati;
if(isset($_SESSION['id'])){
    header("Location: index.php");
}
?>


<div class="container">
    <div style="padding-top: 10%;" class="spatiu"></div>
    <div style="padding: 10px;" id="login" class="login cases">
        <?php

        if(isset($_GET['info']) && $_GET['info'] =='deconectare'){
            echo "<br><h2 style='color: red'>Te-ai deconectat de la cont.</h2>";
        }

        ?>
        <br><br><h3>Conectează-te la cont:</h3>
        <form method="post" action="includes/login.inc.php">
            <input type="text" name="Nume" placeholder="Nickname"><br>
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
            }else if(isset($_GET['info']) && $_GET['info'] == 'cont_inexistent'){
                echo "<h4 style='color: red'>Contul nu exista. <br></h4>";
            }
        ?>
    </div>
</div>

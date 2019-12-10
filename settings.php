<?php include "base.php"; ?>
<style>
    span{
        color: red;
    }
    .inputs-case{
        width: 300px;
    }
</style>

<div class="container">
    <?php

    if(isset($_GET['info']) && $_GET['info'] == 'identica'){
        echo "<h1 style='color: red;'> Parola noua este identica cu parola veche. Alege alta.</h1>";
    }else if(isset($_GET['info']) && $_GET['info'] == 'parola_schimbata'){
        echo "<h1 style='color: green;'> Parola si datele au fost schimbate cu succes.</h1>";
    }else if(isset($_GET['info']) && $_GET['info'] == 'parola_verificare_diferita'){
        echo "<h1 style='color:red;'> Parola de verificare nu este identica cu parola noua.</h1>";
    }else if(isset($_GET['info']) && $_GET['info'] == 'Modificate_doar_setarile'){
        echo "<h1 style='color: green;'> Datele au fost schimbate cu succes.</h1>";
    }else if(isset($_GET['info']) && $_GET['info'] == 'parola_incorecta'){
        echo "<h1 style='color:red;'> Parola veche nu este la fel cu cea din baza de date.</h1>";

    }

    ?>
    <div style="margin-top: 10%" class="settings">
        <h3 style="margin: 10px;">Modifica datele personale: </h3>
        <form action="includes/settings.inc.php" method="post">
            <h6>Nume cont <span>*</span></h6><input class="inputs-case" pattern=".{3,}"   required title="Numele contului trebuie sa contina minim 3 litere/cifre" type="text" name="Numele_Contului" value="<?php echo $_SESSION['username']?>"><br>
            <br><h6>Numele tau <span>*</span></h6><input class="inputs-case" required title type="text" name="Nume" value="<?php echo $_SESSION['nume']?>"><br>
            <br><h6>Prenumele tau <span>*</span></h6><input class="inputs-case" required title type="text" name="Prenume" value="<?php echo $_SESSION['prenume']?>"><br>
            <br><h6>Email <span>*</span></h6><input class="inputs-case" required title type="email" name="emailaddress" value="<?php echo $_SESSION['email']?>"><br><br>
             <input  class value="false" id = "myCheck" name="change_password" type="checkbox" onclick="myFunction() "><span>Schimbare parola</span>
            <div id="password-collapse" style="display: none">
                <br>
                <p>Parola trebuie sa contina minim 6 litere. <span>*</span></p>
                <h6>Parola veche <span>*</span></h6>
                <input class="inputs-case" pattern=".{6,}" name="parola_veche" type="password">
                <br><br><h6>Parola noua <span>*</span></h6>
                <input class="inputs-case" pattern=".{6,}" name="parola_noua1" type="password">
                <br><br><h6>Confirma parola noua <span>*</span></h6>
                <input class="inputs-case" pattern=".{6,}"  name="parola_noua2" type="password">
            </div>
            <br><input style="margin-bottom: 20%" class="input-submit" type="submit" value="Salvare">
        </form>
    </div>
</div>


<?php

// TODO: Verifica daca username si email se afla in baza de date;
// TODO: !!! Atentie, se afla o singura data !!!;

?>

<script>
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("password-collapse");
        if (checkBox.checked === true){
            var x = document.createElement("INPUT");
            x.setAttribute("type", "checkbox");
            text.style.display = "block";
            checkBox.value = "true";
        } else {
            text.style.display = "none";
            text.value = "false";
            checkBox.value = "false";
        }
    }
</script>
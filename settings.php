<?php include "base.php"; ?>

<style>
    span{
        color: red;
    }
</style>

<div class="container">
    <div style="margin-top: 10%" class="settings">
        <h3 style="margin: 10px;">Modifica datele personale: </h3>
        <form action="includes/settings.inc.php" method="post">
            <h6>Nume cont <span>*</span></h6><input pattern=".{3,}"   required title="Numele contului trebuie sa contina minim 3 litere/cifre" type="text" name="Numele_Contului" value="<?php echo $_SESSION['username']?>"><br>
            <br><h6>Numele tau <span>*</span></h6><input required title type="text" name="Nume" value="<?php echo $_SESSION['nume']?>"><br>
            <br><h6>Prenumele tau <span>*</span></h6><input required title type="text" name="Prenume" value="<?php echo $_SESSION['prenume']?>"><br>
            <br><h6>Email <span>*</span></h6><input required title type="email" name="emailaddress" value="<?php echo $_SESSION['email']?>"><br><br>
             <input id = "myCheck" name="change_password" type="checkbox" onclick="myFunction()"><span>Schimbare parola</span>
            <div id="password-collapse" style="display: none">
                <br>
                <h6>Parola veche <span>*</span></h6>
                <input name="parola_veche" type="text" v>
                <br><br><h6>Parola noua <span>*</span></h6>
                <input name="parola_noua1" type="text" >
                <br><br><h6>Confirma parola noua <span>*</span></h6>
                <input name="parola_noua2" type="text" >
            </div>

            <br><input style="margin-bottom: 20%" class="input-submit" type="submit" value="Salvare">
        </form>
    </div>
</div>


<script>
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("password-collapse");
        if (checkBox.checked === true){
            var x = document.createElement("INPUT");
            x.setAttribute("type", "checkbox");
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>
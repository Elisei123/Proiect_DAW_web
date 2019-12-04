<?php include "base.php"; ?>

<style>
    span{
        color: red;
    }
</style>

<div class="container">
    <div style="margin-top: 10%" class="settings">
        <h3 style="margin: 30px;">Modifica datele personale: </h3>
        <form action="includes/signup.inc.php" method="post">
            <h6>Nume cont <span>*</span></h6><input pattern=".{3,}"   required title="Numele contului trebuie sa contina minim 3 litere/cifre" type="text" name="Numele_Contului" value="<?php echo $_SESSION['username']?>"><br>
            <br><h6>Numele tau <span>*</span></h6><input required title type="text" name="Nume" value="<?php echo $_SESSION['nume']?>"><br>
            <br><h6>Prenumele tau <span>*</span></h6><input required title type="text" name="Prenume" value="<?php echo $_SESSION['prenume']?>"><br>
            <br><h6>Email <span>*</span></h6><input required title type="email" name="emailaddress" value="<?php echo $_SESSION['email']?>"><br>
            <input name="change-password" type="checkbox"><span>Schimbare parola</span>
            <br><input class="input-submit" type="submit" value="Salvare">
        </form>
    </div>
</div>


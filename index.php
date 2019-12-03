<?php include "base.php"?>

<?php

if(isset($_SESSION['id'])) {
    echo "<title>Salut " . ucfirst($_SESSION['prenume']) . "</title>";
}
?>

<div class="container">
    <div style="text-align: right;"> Logat cu prenumele <?php echo ucfirst($_SESSION['prenume']) ?></div>
    <h1 style="text-align: center; margin-top: 100px"> Base TO-DO list </h1>
</div>
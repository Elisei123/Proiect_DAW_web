<?php include "base.php"?>

<?php

if(isset($_SESSION['id'])) {
    echo "<title>Salut " . ucfirst($_SESSION['prenume']) . "</title>";
}
?>

<div class="container">
    <?php
    if(isset($_SESSION['id'])) {
        echo '
            <div style=" margin-top: 20px; text-align: right"> Welcome, ' . ucfirst($_SESSION['prenume']) . '</div>
        ';
    }
    ?>
    <h1 style="text-align: center; margin-top: 100px"> Base TO-DO list </h1>
</div>
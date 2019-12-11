<?php include "base.php"?>
<?php
if(isset($_SESSION['id'])) {
    echo "<title>Salut " . ucfirst($_SESSION['username']) . "</title>";
}
?>

<div class="container">
    <?php
    if(isset($_SESSION['id'])) {
        echo '
            <div style=" margin-top: 20px; text-align: right"> Welcome, ' . ucfirst($_SESSION['username']) . '</div>
        ';
    }
    ?>
    <br><h3 style="text-align: center; margin-top: 100px"> Base TO-DO list </h3>
</div>


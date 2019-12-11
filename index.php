<?php include "base.php"?>
<?php include "includes/conectare.php"?>
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
    <br><h3 style="text-align: center; margin-top: 26px"> Base TO-DO list </h3>
    <form method="post" action="index.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="task_submit" name="submit">Submit</button>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $task = $_POST['task'];
        $date = date("h:i:sa") . " " . date("d-m-Y");
        $Username = intval($_SESSION['id']);

    $sql = "INSERT INTO tasks (Task, Data_curenta, ID_USER) VALUES ('$task', '$date', '$Username')";
    $result = mysqli_query($conectare, $sql);
    header("Location: ../Proiect_DAW_web/index.php");
    }
    ?>
</div>


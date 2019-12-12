<?php include "base.php" ?>
<?php include "includes/conectare.php" ?>
<?php
if (isset($_SESSION['id'])) {
    echo "<title>Salut " . ucfirst($_SESSION['username']) . "</title>";
}
?>

<?php
//Elimina un task;
if(isset($_GET['delete_id'])){
    $id_pt_sters = intval($_GET['delete_id']);
    $id_user = $_SESSION['id'];
    $sql = "UPDATE tasks SET Efectuat = 'Da' WHERE ID = '$id_pt_sters' AND ID_USER='$id_user'";
    $result = mysqli_query($conectare, $sql);
    header('location: index.php');
}

?>


<style>
    @media (max-width: 768px) {
        table {
            width: 70%;
        }
    }

    th{
        font-size: 20px;
    }

    .buttons_done{
        color: white;
        padding: 7px;
        background-color:#5BD41E;
        border-radius: 10px;
    }

    .buttons_done:hover{
        color: white;
        background-color:#D40019;
        text-decoration: none;
        transition: 0.4s;
    }

</style>

<div class="container">
    <?php
    if (isset($_SESSION['id'])) {
        echo '
            <div style=" margin-top: 20px; text-align: right"> Welcome, ' . ucfirst($_SESSION['username']) . '</div>
        ';
    }
    ?>
    <br>
    <h3 style="text-align: center; margin-top: 26px"> Base TO-DO list </h3>
    <form method="post" action="index.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="task_submit" name="submit">Submit</button>
    </form>


    <?php
    // Adaugare task;
    if (isset($_POST['submit']) && !empty($_POST['task'])) {
        $task = $_POST['task'];
        date_default_timezone_set('Europe/Bucharest');
        $date = date("h:i:sa") . " " . date("d-m-Y");
        $Username = intval($_SESSION['id']);

        $sql = "INSERT INTO tasks (Task, Data_curenta, ID_USER, Efectuat) VALUES ('$task', '$date', '$Username', 'Nu')";
        $result = mysqli_query($conectare, $sql);
    }else{
        echo "Campul este gol";
    }
    ?>
    <div class="table-responsive-md">
        <table class="table" style="margin-top: 5%;">
            <thead class="thead-dark">
            <tr">
            <th scope="col">#</th>
            <th scope="col">Data</th>
            <th class="col-md-6" scope="col">Task</th>
            <th style="color: #5BD41E" scope="col">Done</th>
            </tr>

            </thead>
            <tbody>
            <tr>
                <?php
                //Afisare task-uri.
                $Username = intval($_SESSION['id']);
                $sql = "SELECT ID, Data_curenta, Task FROM tasks WHERE ID_USER = '$Username' AND Efectuat = 'Nu'";
                $result = mysqli_query($conectare, $sql);
                $contor = 1;
                if ($result->num_rows > 0){
                    echo "<h4>Succes in rezolvarea task-urilor! <span style='font-size:60px;'>&#129488;</span></h4>";
                    while ($row = $result->fetch_assoc()){
                        echo '
                        <th scope="row">' . $contor . '</th>
                        <th scope="row">' . $row["Data_curenta"] . '</th>
                        <td>' . $row["Task"] . '</td>
                        <td>
                            <div >
                                <a class="buttons_done" href="../Proiect_DAW_web/index.php?delete_id='. $row["ID"] .'" >Rezolvat</a>
                             </div>
                        </td>
                        
            </tr>';
                        $contor++;
                    }

                }else{
                    echo "<h4>Nu ai nici un task de facut. <span style='font-size:60px;'>&#128524;</span></h4>";
                }
                ?>
        </table>
    </div>


</div>


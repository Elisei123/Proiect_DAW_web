<?php
include 'base.php';
include 'includes/conectare.php';

$id_user_curent = $_SESSION['id'];
$sql = "SELECT Task, Data_curenta, data_task_efectuat FROM tasks WHERE ID_USER = '$id_user_curent' AND Efectuat = 'Da' ";
$result = mysqli_query($conectare, $sql);
$contor = 1;
echo "   
   <h2 style='margin-top: 5%'>Lista task-uri rezolvate.</h2>
   <div class='container'>
                <div class=\"table-responsive-md\">
        <table class=\"table\" style=\"margin-top: 5%;\">
            <thead class=\"thead-dark\">
                <tr\">
                    <th scope=\"col\">#</th>
                    <th scope=\"col\">Data initializare.</th>
                    <th class=\"col-md-6\" scope=\"col\">Task</th>
                    <th scope=\"col\">Data finalizare.</th>
                </tr>
            </thead>
            <tbody>
            <tr>";
while ($row = $result->fetch_assoc()) {
    echo '
                        <th scope="row">' . $contor . '</th>
                        <th scope="row">' . $row["Data_curenta"] . '</th>
                        <td>' . $row["Task"] . '</td>
                         <th scope="row">' . $row["data_task_efectuat"] . '</th>

                        
            </tr>';
    $contor++;
}

    echo "</div>";
    ?>
</table>
</div>
</div>


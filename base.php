<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">


    <style>

        body{
            background-color: bisque;
            text-align: center;
        }

        input {
            background: #fff;
            color: #525865;
            border-radius: 4px;
            border: 1px solid #d1d1d1;
            box-shadow: inset 0px 1px 8px rgba(0, 0, 0, 0.2);
            font-size: 1em;
            line-height: 1.45;
            outline: none;
            padding: 0.6em 1.45em 0.7em;
            text-align: center;
            margin: 3px;
        }
        .input-submit{
            cursor:pointer;
            font-size: 15px;
        }
        .input-submit:hover{
            background-color:gray;
            color:white;
            transition: all .3s;
        }

    </style>
</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
        <a class="navbar-brand" href="index.php">To DO LIST</a>
        <?php

        if(isset($_SESSION['id'])){
            echo '
                    <span>***</span>
                    <a class="navbar-brand" href="tasks_solved.php">Task-uri rezolvate.</a>
        ';
        }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul style="margin-left: 76%;" class="nav navbar-nav navbar-left" style="text-align: center">
                <?php
                    if(!isset($_SESSION['id'])){
                        echo '
                            <li class="nav-item">
                                <a class="navbar-brand" href="login.php">Login</a>
                            </li>
            
                            <li class="nav-item">
                                <a class="navbar-brand" href="register.php">Register</a>
                            </li>';
                    } else {
                        echo '
                           
                            <li >
                                <a class="navbar-brand" href="settings.php">Settings</a>
                            </li>

                        <form method="post" action="includes/logout.inc.php">
                            <li >
                                <input name="buton" class="p-2 bd-highlight" type="submit" value="Logout">
                            </li>
                        </form>
                        ';
                     }
                ?>
            </ul>
        </div>

    </nav>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
</body>
</html>

<script type="text/javascript">
    function VerificareBifa(){
        var x = document.getElementById('password');
        if(x.type === "password"){
            x.type = "text";
        }else{
            x.type = "password";
        }
    }
</script>

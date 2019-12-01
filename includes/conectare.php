<?php

$conectare = mysqli_connect('localhost', 'root', '', 'my_site');

if(!$conectare){
    die(mysqli_connect_error());
}
<?php
session_start();
session_destroy();
header("Location: ../login.php?info=deconectare");
die();



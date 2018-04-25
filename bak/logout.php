<?php
session_start();
$_SESSION['Droits'] = 0;
header('Location: index.php');
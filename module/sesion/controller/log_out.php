<?php 
$carpetaraiz = $_SESSION['CarpetaRaiz'];
session_destroy();
header('Location: /inicio');


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include "./app/login/loginView.php";



/* ANCIENNE VERSION INDEX (au-cas où)
require 'app/login/loginController.php';

if (isset($_GET['action']) && $_GET['action'] !== '') {
    //Checker cookies de connexion. Si encore valable, accès au reste du site
    //
} else {
    login();
}
*/
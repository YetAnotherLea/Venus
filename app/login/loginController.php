<?php

include_once __DIR__ . '/../../app/login/loginModel.php';

function login() {
    $loginModel = new LoginModel();
    $callGetUser = $loginModel->getUser();
    include_once __DIR__ . '/../../app/login/profileView.php';
}

login();
<?php

session_start();
$_SESSION['username'] = null;

$_SESSION['idusers'] = null;

require_once './templates/goodbye.php';

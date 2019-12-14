<?php

session_start();

echo "logged in name " . $_SESSION['username'];
echo "<br>";
echo "logged in id " . $_SESSION['idusers'];

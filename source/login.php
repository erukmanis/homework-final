<?php

session_start();
if (isset($_SESSION['username'])) {

    echo "<span class=listof>of " . $_SESSION['username'] . "</span>";
    echo "<form action='processlogout.php' method='post'>";
    echo "<button>Sign out</button>";
    echo "</form>";
} else {
    echo "<div>";
    echo "Please login or <a href='register.php'>register</a>!";
    echo "<form class='login-f' action='processLogin.php' method='post'>";
    echo "<input name='username' type='text' placeholder='enter username' required>";
    echo "<input name='password' type='password' placeholder='enter password' required>";
    echo "<button>Login</Login>";
    echo "</form>";
    echo "</div>";
}

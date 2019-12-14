<?php

require_once '../config/config.php';

require_once 'templates/header.php';


echo '<div class="front">';
require_once '../source/login.php';
echo '</div>';

echo '<div class="front">';
require_once '../source/echotodolist.php';
echo '</div>';



require_once 'templates/footer.php';

<?php

require_once '../public/templates/header.php';
?>
<div class="front">

    <form action="processregister.php" method="post">
        <input type="text" placeholder="choose username" name="username" required>
        <input type="password" name="password" placeholder="choose password" id="" required>
        <button type="submit">Register</button>


    </form>

</div>
<?php
require_once '../public/templates/footer.php';

<?php
session_start();
session_destroy();
header('Location:../Final/LOGIN.php?error="Login First"');

?>
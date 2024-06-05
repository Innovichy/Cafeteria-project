
<?php

session_start();
// session_destroy();
unset($_SESSION['NormalOwnerEmail']);

header("location:../../../");

?>
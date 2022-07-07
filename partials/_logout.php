<?php
echo "Logging you out ,....PLease wait";
session_start();
session_unset();
session_destroy();
header("Location: /project2/index.php");

?>
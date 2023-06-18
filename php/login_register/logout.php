<?php
// 'logout.php' beendet alle Sessions und logt so den Nutzer aus, man wird auf die 'index.php'weiter geleitet
session_start();
session_destroy();
header("Location: ../../pages/index.php");
exit();

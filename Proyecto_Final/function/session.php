<?php

session_start();
if (!ISSET($_SESSION['id'])) {
    echo false;
}
?>
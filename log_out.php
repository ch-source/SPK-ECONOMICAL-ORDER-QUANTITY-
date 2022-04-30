<?php
 session_start();
 unset($_SESSION['masuk']);
 header("location:./index.php");?>
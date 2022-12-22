<?php

if (empty($_SESSION['username'])) {
    header("location: return.php");
}

require "cap.php";
//require "basement.php";
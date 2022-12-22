<?php

session_start();
session_destroy();
header("location: authorization_html.php");

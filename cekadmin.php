<?php

session_start();

if(!isset($_SESSION['username'])){
    die("Anda belum login!");
}

if($_SESSION['role']!="Admin"){
    die("Anda bukan admin!");
}

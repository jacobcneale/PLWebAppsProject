<?php

spl_autoload_register(function ($classname) {
    include "$classname.php";
});

error_reporting(E_ALL);
ini_set("display_errors",1);

$db = new Database();

// $db->addUser("jacobneale","password");

echo $db->getUser("jacobneale")["username"] . "   " . $db->getUser("jacobneale")["passhash"];
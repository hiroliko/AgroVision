<?php

$baglanti = new mysqli(
    "localhost",
    "root",
    "",
    "toprak_nem_db"
);

if ($baglanti->connect_error) {
    die("Baglanti hatasi: " . $baglanti->connect_error);
}

$baglanti->set_charset("utf8");

?>
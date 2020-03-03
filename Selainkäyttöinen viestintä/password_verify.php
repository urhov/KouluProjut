<?php
$salasana = "qweerty";
$hash = '$2y$10$sFm47bNxSYdmaKUbteLZzOMHdupw3CbweufOv8zkisKvEAtogXoye';

if (password_verify($salasana,$hash)){
    echo "salasana on oikien";
} else {
    echo "salasana on väärin";
}
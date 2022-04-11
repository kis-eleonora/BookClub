<?php

require_once 'connect.php';

if (filter_input(INPUT_POST, "befizet", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $id = filter_input(INPUT_POST, "id");
    $osszeg = filter_input(INPUT_POST, "osszeg");
    $datum = new DateTime(filter_input(INPUT_POST, "datum"));
    $datum = $datum->format('Y-m-d');
    if (!empty($osszeg)) {
        $sql = "INSERT INTO `befizetes`(`id`, `datum`, `befizetes`) VALUES ('$id','$datum','$osszeg')";
    } else {
        $_SESSION['error'] = "Nem adott meg összeget!";
        include 'befizetes.php';
        exit();
    }
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Sikeres befizetés!";
        include 'befizetes.php';
        exit();
    }
}
?>



<?php
require '../models/advert.php';


//запросить модель
$filename = uploadImage($_FILES['photo']);
addAdvert($_POST['title'], $_POST['description'], $_POST['phone'], $_POST['country_id'], $_POST['email'],
    $_POST['end_date'],  $filename);
//echo '<pre>';
//var_dump($_POST['title'], $_POST['description'], $_POST['phone'], $_POST['country_id'], $_POST['email'],
//    $_POST['end_date'],  $_FILES['photo']);
//echo '</pre>';
header("Location: /");
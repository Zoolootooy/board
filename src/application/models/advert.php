<?php
function uploadImage($image){
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], "../../images/" . $filename);

    return $filename;
}

function addAdvert($title, $description, $phone, $country_id, $email, $end_date,  $filename){
    $pdo = new PDO("mysql:host=localhost;dbname=bulletinboard", "MyRoot", "");

    //запрос с метками
    $sql = "INSERT INTO advert (title, description, phone, country_id, email, end_date, photo) VALUES (:title, :description, :phone, :country_id, :email, :end_date, :photo)";

    //подготовить запрос
    $statement = $pdo->prepare($sql);



    //присвоили данные по меткам
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);
    $statement->bindParam(":phone", $phone);
    $statement->bindParam(":country_id", $country_id, PDO::PARAM_INT);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":end_date", $end_date);
    $statement->bindParam(":photo", $filename);

    //выполняем запрос
    $statement->execute();
}

function getAdverts(){
    $pdo = new PDO("mysql:host=localhost;dbname=bulletinboard", "MyRoot", "");

//запрос с метками

//подготовить запрос
    $statement = $pdo->prepare("SELECT * FROM advert");

//выполняем запрос
    $statement->execute();
    $adverts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $adverts;
}
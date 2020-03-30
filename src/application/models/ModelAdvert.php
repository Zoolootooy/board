<?php

namespace application\models;

use application\core\Model;

class ModelAdvert extends Model
{
    function uploadImage($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        if (($extension == "jpg") || ($extension == "jpeg") || ($extension == "gif") || ($extension == "png")){
            $filename = uniqid() . "." . $extension;
        }
        else {
            $filename = "";
            return $filename;
        }


        $res = move_uploaded_file($image['tmp_name'], "images/" . $filename);
        if ($res) {
            return $filename;
        }
        else {
            return "";
        }
    }

    function getEmptyAdvert(){
        $advert = [
            "id" => 0,
            "title" => NULL,
            "description" => NULL,
            "phone" => NULL,
            "email" => NULL,
            "country_id" => 0,
            "create_date" => NULL,
            "end_date" => NULL,
            "latitudes" => NULL,
            "longitudes" => NULL,
            "photo" => NULL
        ];
        return $advert;
    }

    function getAdvert($id)
    {
        $advert = $this->conn->query("SELECT * FROM advert WHERE advert.id =".$id);
        return $advert;
    }

    function getAdverts()
    {
        $adverts = $this->conn->query("SELECT * FROM advert");

        return $adverts;
    }

    function updateAdvert($advert, $filename){
        $executeQuery = $this->conn->query(
            "
            UPDATE advert SET 
                title = ?,
                description = ?, 
                phone = ?,
                country_id = ?,
                email = ?, 
                end_date = ?, 
                create_date = ?, 
                photo = ? 
                WHERE id=?",
            [
                $advert['title'], $advert['description'], $advert['phone'], $advert['country_id'], $advert['email'],
                $advert['end_date'], $advert['create_date'],  $filename, $advert['a_id']
            ]
        );


        if ($executeQuery) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    function addAdvert($advert, $filename)
    {
        $create_date = date("Y-m-d");
        $executeQuery = $this->conn->query(
            "
            INSERT INTO advert (title, description, phone, country_id, email, end_date, create_date, photo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
            [
                $advert['title'], $advert['description'], $advert['phone'], $advert['country_id'], $advert['email'],
                $advert['end_date'], $create_date,  $filename
            ]
        );


        if ($executeQuery) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }
}

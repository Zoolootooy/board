<?php

namespace application\models;


use application\core\Model;

class ModelCountry extends Model
{
    function getCountryByID($id)
    {
        $country = $this->conn->query("SELECT * FROM country WHERE country.id =".$id);
        return $country;
    }

    function getCountries()
    {
        $countries = $this->conn->query("SELECT * FROM country ORDER BY name");
        return $countries;
    }
}
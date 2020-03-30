<?php

namespace application\controllers;

use application\core\Controller;
use application\models\ModelAdvert;
use application\models\ModelCountry;

class ControllerAdvert  extends Controller
{
    /**
     * Show advert list
     */
    public function index()
    {
        $model = new ModelAdvert();
        $adverts = $model->getAdverts();

        $this->view->generate('list.php', ['adverts' => $adverts]);
    }

    public function saveAndMain()
    {
        $model = new ModelAdvert();
        $advert = $_POST;
        $todo = $_POST['todo'];

        if ($todo == "new"){
            $filename = $model->uploadImage($_FILES['photo']);
            $model->addAdvert($advert, $filename);
        }
        else {
            if ($todo == "update"){

                if ($_FILES['photo']['name'] != NULL){
                    $filename = $model->uploadImage($_FILES['photo']);
                }
                else {
                    $filename = $advert['e_photo'];
                }
                $model->updateAdvert($advert, $filename);
            }
        }

        header("Location: /");
    }

    public function showCreateForm()
    {
        $model = new ModelAdvert();
        $advert = $model->getEmptyAdvert();

        $modelCountry = new ModelCountry();
        $countries = $modelCountry->getCountries();
        $this->view->generate('edit.php', ['advert' => $advert[0], 'countries' =>  $countries,
            'todo' => 'new']);

    }

    public function showEditForm()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        $model = new ModelAdvert();
        $advert = $model->getAdvert($id);

        $modelCountry = new ModelCountry();
        $countries = $modelCountry->getCountries();

        if (isset($advert) && isset($advert[0])) {
            $this->view->generate('edit.php', ['advert' => $advert[0], 'countries' => $countries,
                'todo' => 'update', 'a_id' => $id]);
        } else {
            $controller = new Controller404();
            $controller->index();
        }
    }

    public function showAdvertForm()
    {
        $id = explode('/', $_SERVER['REQUEST_URI'])[2];
        $model = new ModelAdvert();
        $advert = $model->getAdvert($id);

        $modelCountry = new ModelCountry();
        $country = $modelCountry->getCountryByID($advert[0]['country_id']);

        if (isset($advert) && isset($advert[0])) {
            $this->view->generate('advert.php', ['advert' => $advert[0], 'country' => $country[0]]);
        } else {
            $controller = new Controller404();
            $controller->index();
        }
    }
}
<?php

$router->get('', 'ControllerAdvert@index');
$router->get('edit/{}', 'ControllerAdvert@showEditForm');
$router->get('advert/{}', 'ControllerAdvert@showAdvertForm');
$router->get('new', 'ControllerAdvert@showCreateForm');
$router->post('save', 'ControllerAdvert@saveAndMain');

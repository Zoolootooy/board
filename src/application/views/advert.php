<?php require('partials/header.php'); ?>


<div class="container">
    <?php
    $lon = $advert['longitudes'];
    $lat = $advert['latitudes'];
    ?>
    <div class="curAdvert">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="curAdvert__title"><?= $advert['title'] ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-4 offset-8">
                <div class="text-right">
                    <p class="curAdvert__create-date">Date of creation: <?php
                        $create_date = new DateTime( $advert['create_date']);
                        echo $create_date->Format('d.m.Y');
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 text-center">
                <?php if ($advert['photo'] != NULL) : ?>
                    <img  class="curAdvert__img" src="../../images/<?= $advert['photo'];?>">
                <?php else : ?>
                    <img class="curAdvert__img"  src="../../images/default.jpg"><br>
                <?php endif; ?>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <p class="curAdvert__description"><?= $advert['description'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <p>Phone:</p>
            </div>

            <div class="col-10">
                <p class="curAdvert__phone"><?= $advert['phone'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <p>Country:</p>
            </div>

            <div class="col-10">
                <p class="curAdvert__country"><?= $country['name'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <p>Email:</p>
            </div>

            <div class="col-10">
                <p class="curAdvert__email"><?= $advert['email'] ?></p>
            </div>
        </div>




        <div id="map"></div>
        <input type="hidden" id="lon" value="<?= $lon;?>">
        <input type="hidden" id="lat" value="<?= $lat;?>">
        <script src="../../js/map.js">
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk10RdU1wJJ7UZnIZj8XBuVQopBvicRPE&callback=initMap"
                async defer></script>
    </div>
</div>


<?php require('partials/footer.php'); ?>

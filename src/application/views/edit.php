<?php require('partials/header.php'); ?>

<div class="container">
    <?php
    $lon = $advert['longitudes'];
    $lat = $advert['latitudes'];
    ?>


    <div class="row">
        <div class="col-12">
            <div class="createForm text-center">
                <form id="createForm" action="/save" method="post" enctype="multipart/form-data" class="createForm">

                    <div class="row">
                        <div class="col-8 offset-2">
                            <input class="createForm__title" type="text" name="title" placeholder="Title"
                                   value="<?= $advert['title']?>"  required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <textarea class="createForm__description" name="description" placeholder="Description"  required><?= $advert['description']?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="row">
                                <div class="col-3">
                                    <div class="text-left createForm__country-text">
                                        Choose country
                                    </div>
                                </div>
                                <div class="col-9">
                                    <select class="createForm__country-list" name="country_id" required>
                                        <option></option>
                                        <?php foreach($countries as $country):?>

                                            <?php if ($country['id'] == $advert['country_id']): ?>
                                                <option selected  value = '<?= $country['id'];?>'><?= $country['name'];?> </option>
                                            <?php else: ?>
                                                <option value = '<?= $country['id'];?>'><?= $country['name'];?> </option>
                                            <?php endif; ?>

                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="row">
                                <div class="col-3 text-left">
                                    Enter your phone
                                </div>
                                <div class="col-9">
                                    <input class="createForm__phone" type="tel" name="phone" placeholder="Phone number" value="<?= $advert['phone']?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="row">
                                <div class="col-3 text-left">
                                    Enter your email
                                </div>

                                <div class="col-9">
                                    <input class="createForm__email" type="email" name="email" placeholder="Email" value="<?= $advert['email']?>"  required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="row">
                                <div class="col-3 text-left createForm__end-date-text">
                                    Enter end date
                                </div>

                                <div class="col-9">
                                    <input class="createForm__end-date" type="date" name="end_date" placeholder="End Date"
                                           value="<?= $advert['end_date']?>"  required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 offset-2">
                            <div class="createForm__imgCont">
                                <div class="row">
                                    <div class="col-3 text-left createForm__img-text">
                                        Choose your image
                                    </div>

                                    <div class="col-9 text-left">
                                        <input class="createForm__img-select" type="file" name="photo" value="<?= $advert['photo']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <?php if($advert['photo'] != ""):?>
                                <div class="col-3 text-right">
                                    (is present)
                                </div>

                                <div class="col-6">
                                    <img class="createForm__img" src="/images/<?= $advert['photo'];?>">
                                </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>




                    <input id="lat" type="hidden" name="latitudes" value="<?= $lat;?>">
                    <input id="lon" type="hidden" name="longitudes" value="<?= $lon;?>">
                    <input type="hidden" name="todo" value="<?= $todo;?>">
                    <input type="hidden" name="create_date" value="<?= $advert['create_date'] ?>">
                    <input type="hidden" name="a_id" value="<?= $a_id; ?>">
                    <input type="hidden" name="e_photo" value="<?= $advert['photo'];?>">
                </form>
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="text-center" id="map"></div>
                    </div>
                    <div class="col-3 text-left">
                        <input onclick="deleteMarkers();" type=button value="Delete Marker">
                    </div>
                </div>


                <div class="row">
                    <div class="col-2 offset-8">
                        <div class="text-rigth">
                            <button form="createForm" class="createForm__Submit" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/map.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk10RdU1wJJ7UZnIZj8XBuVQopBvicRPE&callback=initMap"
            async defer></script>
</div>
<?php require('partials/footer.php'); ?>
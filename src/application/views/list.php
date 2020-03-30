<?php require('partials/header.php'); ?>


<div class="container">
    <?php foreach ($adverts as $advert): ?>
        <div class="mAdvert">
            <div class="row">
                <div class="col-4">
                    <?php if ($advert['photo'] != NULL) : ?>
                        <img class="mAdvert__img" src="/images/<?= $advert['photo']; ?>"><br>
                    <?php else : ?>
                        <img class="mAdvert__img" src="/images/default.jpg"><br>
                    <?php endif; ?>
                </div>

                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mAdvert__title">
                                <a href="/advert/<?= $advert['id'] ?>">
                                    <?= $advert['title']; ?>
                                </a>
                            </h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <?php if (strlen($advert['description']) < 256) : ?>
                                <p class="mAdvert__description"><?= $advert['description'] ?></p>
                            <?php else: ?>
                                <p class="mAdvert__description">
                                    <?php

                                    $str = substr($advert['description'], 0, 255);
                                    $str = $str . "...";
                                    echo $str;
                                    ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-3 offset-9">
                    <div class="mAdvert__creation-date text-right">Date of creation: <?php
                        $create_date = new DateTime( $advert['create_date']);
                        echo $create_date->Format('d.m.Y');
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2 offset-10">
                    <div class="mAdvert__edit text-right">
                        <a href="/edit/<?= $advert['id'] ?>">Edit adwert</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php require('partials/footer.php'); ?>

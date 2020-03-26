<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>

    <div class="createFormContainer">
        <form action="../controllers/controller_edit.php" method="post" enctype="multipart/form-data" class="createForm">
            <input class="createForm__title" type="text" name="title" placeholder="Title"  required> <br>
            <textarea class="createForm__description" name="description"  required></textarea> <br>


            <?php
            require '../models/country.php';
            $countries = getCountries();
            ?>

            Choose country
            <select name = '' required>
                <option></option>
                <?php foreach($countries as $country):?>

                    <option value = '<?= $country['id'];?>'><?= $country['name'];?> </option>

                <?php endforeach;?>
            </select><br>
            <input class="createForm__phone" type="tel" name="phone" placeholder="Phone number" required> <br>
<!--            <input class="createForm__country" type="number" name="country_id" placeholder="Country"> <br>-->

            <input class="createForm__email" type="email" name="email" placeholder="Email"  required> <br>
            <input class="createForm__end-date" type="date" name="end_date" placeholder="End Date"  required> <br>
            <input class="createForm__img" type="file" name="photo"> <br>
            <button class="createForm__Submit" type="submit">Save</button>
        </form>
    </div>

</body>
</html>
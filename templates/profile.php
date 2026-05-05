<?php include_once 'header.php' ?>
<main class="container w-100 m-auto">
    <div class="row">
        <div class="col">
            <img class="mb-4" src="./images/bootstrap-logo.svg" alt="" width="72"
                 height="57">
            <h1 class="h3 mb-3 fw-normal">Profile</h1>
        </div>

    </div>
<!--    <div class="row mb-3">-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=add" class="btn btn-success">Add article</a>-->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=articles" class="btn btn-success">articles</a>-->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=profile" class="btn btn-primary">Profile</a>-->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=logout" class="btn btn-secondary">Logout</a>-->
<!--        </div>-->
<!--    </div>-->
    <?php include_once 'menu.php' ?>
    <form action="" method="post">
        <input type="hidden" name="act" value="profile"/>

        <div class="form-floating">
            <input type="text" name="about" class="form-control" id="floatingInput"
                   placeholder="name@example.com" value="<?= $user['about']?>">
            <label for="floatingInput">About</label>
        </div>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" id="floatingName" placeholder="Name" value="<?= $user['name']?>">
            <label for="floatingName">Name</label>
        </div>
        <div class="form-floating">
            <input type="text" name="surname" class="form-control" id="floatingSurname" placeholder="Sername" value="<?= $user['surname']?>">
            <label for="floatingSurname">Surname</label>
        </div>
        <div class="form-floating">
            <input type="text" name="phone" class="form-control" id="floatingPhone" placeholder="phone" value="<?= $user['phone']?>">
            <label for="floatingPhone">Phone</label>
        </div>



        <button class="btn btn-primary w-100 py-2" type="submit">send</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
    </form>
</main>
<?php include_once 'footer.php' ?>
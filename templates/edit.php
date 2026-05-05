<?php include_once 'header.php'?>
<main class="container w-100 m-auto">
    <div class="row">
        <div class="col"><h1 class="h3 mb-3 fw-normal">Edit article</h1></div>
    </div>
    <div class="row mb-3">
        <div class="col"><img class="mb-4" src="./images/bootstrap-logo.svg" alt="" width="72"
                              height="57"></div>

    </div>
    <?php include_once 'menu.php' ?>
<!--    <div class="row mb-3">-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=add" class="btn btn-success">Add article</a>-->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=profile" class="btn btn-primary">Profile</a>-->
<!--        </div>-->
<!--        <div class="col-2">-->
<!--            <a href="/?act=logout" class="btn btn-secondary">Logout</a>-->
<!--        </div>-->
<!--    </div>-->

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="act" value="edit"/>
        <div class="form-floating">
            <input type="text" name="title" class="form-control" id="floatingInput"
                   placeholder="name@example.com" value="<?= $article['title']?>">
            <label for="floatingInput">Title</label>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $article['content']?></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">content</label>
            <input type="file" name="file" class="form-control" id="file"
                   placeholder="Enter you're file" value="">
            <?php if (isset($error) && $error):?><p><?= $error?></p><?php endif;?>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Edit</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
    </form>
</main>
<?php include_once 'footer.php'?>
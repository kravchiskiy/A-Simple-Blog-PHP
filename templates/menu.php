<div class="d-flex gap-2 justify-content-center py-5 row mb-3">
    <?php if(empty($_SESSION['userId'])):?>
        <div class="col-2 text-center">
            <a href="/?act=login" class="btn btn-primary rounded-pill px-3">Login</a>
        </div>
        <div class="col-2 text-center"><a href="/?act=register" class="btn btn-secondary rounded-pill px-3">Register</a>
        </div>
    <?php endif;?>


    <?php if(!empty($_SESSION['userId'])):?>
        <div class="col-2 text-center">
            <a href="/?act=articles" class="btn btn-success">articles</a>
        </div>
        <div class="col-2 text-center">
            <a href="/?act=add" class="btn btn-success">Add article</a>
        </div>

        <div class="col-2 text-center">
            <a href="/?act=profile" class="btn btn-primary">Profile</a>
        </div>

        <div class="col-2 text-center">
            <a href="/?act=logout" class="btn btn-secondary">Logout</a>
        </div>
    <?php endif;?>
</div>
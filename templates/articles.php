<?php include_once 'header.php'?>
<main class="container w-100 m-auto">
    <div class="row">
        <div class="col"><h1 class="h3 mb-3 fw-normal">Articles</h1></div>
    </div>
    <div class="row mb-3">
        <div class="col"><img class="mb-4" src="./images/bootstrap-logo.svg" alt="" width="72"
                              height="57"></div>

    </div>
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
    <?php include_once 'menu.php' ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">img</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">CreatedAt</th>
            <th scope="col">actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $articles->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?= $row['id'] ?></th>


                <th scope="row"> <?php if(isset($row['img'])):?>
                    <img src="/images/<?= $row['img'] ?>" alt=""> <?php endif; ?>
                </th>
                <td><?= $row['title'] ?></td>
                <td><?= $row['content'] ?></td>
                <td><?= $row['createdAt'] ?></td>
                <td>
                    <a href="/?act=edit&id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="/?act=delete&id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
    <!--    <form action="" method="post">-->
    <!--        <input type="hidden" name="act" value="add"/>-->
    <!---->
    <!---->
    <!--        <div class="form-floating">-->
    <!--            <input type="text" name="title" class="form-control" id="floatingInput"-->
    <!--                   placeholder="name@example.com" value="">-->
    <!--            <label for="floatingInput">Title</label>-->
    <!--        </div>-->
    <!--        <div class="mb-3">-->
    <!--            <label for="exampleFormControlTextarea1" class="form-label">content</label>-->
    <!--            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>-->
    <!--        </div>-->
    <!--        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>-->
    <!--        <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>-->
    <!--    </form>-->
</main>
<?php include_once 'footer.php'?>
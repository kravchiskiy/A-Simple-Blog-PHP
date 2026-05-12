<?php include_once 'header.php'?>
<main class="container w-100 m-auto">
    <div class="row">
        <div class="col"><h1 class="h3 mb-3 fw-normal">Articles</h1></div>
    </div>
    <div class="row mb-3">
        <div class="col"><img class="mb-4" src="./images/bootstrap-logo.svg" alt="" width="72"
                              height="57"></div>

    </div>
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
        <?php while ($row = $articles->fetch()): ?>
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
</main>
<?php include_once 'footer.php'?>
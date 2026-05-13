<?php include_once 'header.php' ?>

    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto"><h1 class="fw-light">Album example</h1>
                    <p class="lead text-body-secondary">Something short and leading about the collection below—its
                        contents,
                        the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it
                        entirely.</p>
                    <p><a href="https://getbootstrap.com/docs/5.3/examples/album/#" class="btn btn-primary my-2">Main
                            call
                            to action</a> <a href="https://getbootstrap.com/docs/5.3/examples/album/#"
                                             class="btn btn-secondary my-2">Secondary action</a></p></div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="conatiner">
                <?php include_once 'menu.php' ?>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php while ($row = $articles->fetch()): ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img style="object-fit: contain" height="255" src="/images/<?= $row['img']?>" alt="">
                                <div class="card-body">

                                    <p class="card-text"><?= $row['title'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/?act=view&id=<?= $row['id'] ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                            <?php if ($user && $row['userId'] == $user['id']): ?>
                                                <a href="/?act=edit&id=<?= $row['id'] ?>" type="button"
                                                   class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <?php endif; ?>

                                        </div>
                                        <small class="text-body-secondary">9 mins</small></div>
                                </div>
                            </div>
                        </div>
                    <? endwhile; ?>
                </div>
            </div>
        </div>
    </main>
<?php include_once 'header.php' ?>
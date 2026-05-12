<?php include_once 'header.php' ?>
<main>
    <div class="container">
        <div class="mb-5">
            <!--            <a href="https://getbootstrap.com/docs/5.2/examples/" class="btn btn-primary btn-lg px-4">Download examples</a>-->
            <!--            <div class="conatiner">-->
            <!--            --><?php //include_once 'menu.php' ?>
            <!--            </div>-->
        </div>
        <h1><?= $article['title'] ?></h1>
        <img src="/images/<?= $article['img'] ?>" alt="<?= $article['img'] ?>">
        <p class="fs-5 col-md-8"><?= $article['content'] ?></p>


        <hr class="col-3 col-md-2 mb-5">
        <form class="col-6" action="" method="post">
            <input type="hidden" name="act" value="view">
            <div class="form-floating">
                <!--                <label for="comment">Comment text</label>-->
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100 py-2" type="submit">Add comment</button>
            </div>
        </form>
        <?php while ($comment = $articleComment->fetch()): ?>
            <?php if ($comment['userId']): ?>
                <?= $comment['email'] ?>
            <?php endif; ?>
            <p><?= $comment['content'] ?></p>
        <?php endwhile; ?>
        <!--        <div class="row g-5">-->
        <!--            <div class="col-md-6">-->
        <!--                <h2>Starter projects</h2>-->
        <!--                <p>Ready to beyond the starter template? Check out these open source projects that you can quickly-->
        <!--                    duplicate to a new GitHub repository.</p>-->
        <!--                <ul class="icon-list ps-0">-->
        <!--                    <li class="d-flex align-items-start mb-1"><a href="https://github.com/twbs/bootstrap-npm-starter"-->
        <!--                                                                 rel="noopener" target="_blank">Bootstrap npm-->
        <!--                            starter</a></li>-->
        <!--                    <li class="text-muted d-flex align-items-start mb-1">Bootstrap Parcel starter (coming soon!)</li>-->
        <!--                </ul>-->
        <!--            </div>-->
        <!---->
        <!--            <div class="col-md-6">-->
        <!--                <h2>Guides</h2>-->
        <!--                <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>-->
        <!--                <ul class="icon-list ps-0">-->
        <!--                    <li class="d-flex align-items-start mb-1"><a-->
        <!--                                href="https://getbootstrap.com/docs/5.2/getting-started/introduction/">Bootstrap quick-->
        <!--                            start guide</a></li>-->
        <!--                    <li class="d-flex align-items-start mb-1"><a-->
        <!--                                href="https://getbootstrap.com/docs/5.2/getting-started/webpack/">Bootstrap Webpack-->
        <!--                            guide</a></li>-->
        <!--                    <li class="d-flex align-items-start mb-1"><a-->
        <!--                                href="https://getbootstrap.com/docs/5.2/getting-started/parcel/">Bootstrap Parcel-->
        <!--                            guide</a></li>-->
        <!--                    <li class="d-flex align-items-start mb-1"><a-->
        <!--                                href="https://getbootstrap.com/docs/5.2/getting-started/vite/">Bootstrap Vite guide</a>-->
        <!--                    </li>-->
        <!--                    <li class="d-flex align-items-start mb-1"><a-->
        <!--                                href="https://getbootstrap.com/docs/5.2/getting-started/contribute/">Contributing to-->
        <!--                            Bootstrap</a></li>-->
        <!--                </ul>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>

</main>
<?php include_once 'footer.php' ?>

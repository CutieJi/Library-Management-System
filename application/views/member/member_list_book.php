
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Recently Added</h4>
        </div>
        <div class="card-body">
            <div id="carouselRecentlyAddedBooks" class="carousel slide p-5" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    // Memecah array $books menjadi potongan-potongan dengan 6 buku per potongan
                    $chunks = array_chunk($recently_added_books, 5);

                    // Iterasi melalui setiap potongan buku untuk membuat carousel item
                    foreach ($chunks as $key => $chunk) :
                    ?>
                        <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>">
                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                <?php
                                // Iterasi melalui buku-buku dalam potongan saat ini
                                foreach ($chunk as $book) :
                                ?>
                                    <div class="col">
                                        <a href="<?= base_url(); ?>member/book/<?= $book['id']; ?>">
                                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $book['cover_image'] ?>" class="cover-image hover-scale" alt="Cover Image">
                                        </a>
                                        <h5 class="mt-3 mb-3">Available: <?= $book['quantity_available']; ?></h5>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselRecentlyAddedBooks" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselRecentlyAddedBooks" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <?php foreach ($categories as $category) : ?>
        <div class="card">
            <div class="card-header">
                <h4><?= ucfirst($category); ?></h4>
            </div>
            <div class="card-body">
                <div id="carousel<?= ucfirst($category) ?>Books" class="carousel slide p-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Memecah array $books menjadi potongan-potongan dengan 6 buku per potongan
                        $chunks = array_chunk($books[$category], 5);

                        // Iterasi melalui setiap potongan buku untuk membuat carousel item
                        foreach ($chunks as $key => $chunk) :
                        ?>
                            <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>">
                                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    <?php
                                    // Iterasi melalui buku-buku dalam potongan saat ini
                                    foreach ($chunk as $book) :
                                    ?>
                                        <div class="col">
                                            <a href="<?= base_url(); ?>member/book/<?= $book['id']; ?>">
                                                <img src="<?= base_url(); ?>assets/img/cover_image/<?= $book['cover_image'] ?>" class="cover-image hover-scale" alt="Cover Image">
                                            </a>
                                            <h5 class="mt-3 mb-3">Available: <?= $book['quantity_available']; ?></h5>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel<?= ucfirst($category) ?>Books" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel<?= ucfirst($category) ?>Books" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- <div class="card">
        <div class="card-header">
            <h4>Education</h4>
        </div>
        <div class="card-body">
            <div id="carouselEducationBooks" class="carousel slide p-5" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    // Memecah array $books menjadi potongan-potongan dengan 6 buku per potongan
                    $chunks = array_chunk($education_books, 5);

                    // Iterasi melalui setiap potongan buku untuk membuat carousel item
                    foreach ($chunks as $key => $chunk) :
                    ?>
                        <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>">
                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                <?php
                                // Iterasi melalui buku-buku dalam potongan saat ini
                                foreach ($chunk as $book) :
                                ?>
                                    <div class="col">
                                        <a href="<?= base_url(); ?>member/book/<?= $book['id']; ?>">
                                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $book['cover_image'] ?>" class="cover-image hover-scale" alt="Cover Image">
                                        </a>
                                        <h5 class="mt-3 mb-3">Available: <?= $book['quantity_available']; ?></h5>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselEducationBooks" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselEducationBooks" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Motivation</h4>
        </div>
        <div class="card-body">
            <div id="carouselMotivationBooks" class="carousel slide p-5" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    // Memecah array $books menjadi potongan-potongan dengan 6 buku per potongan
                    $chunks = array_chunk($motivation_books, 5);

                    // Iterasi melalui setiap potongan buku untuk membuat carousel item
                    foreach ($chunks as $key => $chunk) :
                    ?>
                        <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>">
                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                <?php
                                // Iterasi melalui buku-buku dalam potongan saat ini
                                foreach ($chunk as $book) :
                                ?>
                                    <div class="col">
                                        <a href="<?= base_url(); ?>member/book/<?= $book['id']; ?>">
                                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $book['cover_image'] ?>" class="cover-image hover-scale" alt="Cover Image">
                                        </a>
                                        <h5 class="mt-3 mb-3">Available: <?= $book['quantity_available']; ?></h5>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselMotivationBooks" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselMotivationBooks" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Fiction</h4>
        </div>
        <div class="card-body">
            <div id="carouselFictionBooks" class="carousel slide p-5" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    // Memecah array $books menjadi potongan-potongan dengan 6 buku per potongan
                    $chunks = array_chunk($fiction_books, 5);

                    // Iterasi melalui setiap potongan buku untuk membuat carousel item
                    foreach ($chunks as $key => $chunk) :
                    ?>
                        <div class="carousel-item<?= $key === 0 ? ' active' : '' ?>">
                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                <?php
                                // Iterasi melalui buku-buku dalam potongan saat ini
                                foreach ($chunk as $book) :
                                ?>
                                    <div class="col">
                                        <a href="<?= base_url(); ?>member/book/<?= $book['id']; ?>">
                                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $book['cover_image'] ?>" class="cover-image hover-scale" alt="Cover Image">
                                        </a>
                                        <h5 class="mt-3 mb-3">Available: <?= $book['quantity_available']; ?></h5>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <a class="carousel-control-prev" href="#carouselFictionBooks" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselFictionBooks" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div> -->
</section>
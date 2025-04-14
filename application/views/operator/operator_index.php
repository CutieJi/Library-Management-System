
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-person-vcard d-flex justify-content-center pb-4"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Publisher</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_publisher; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="fas fa-fw fa-user pb-1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Author</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_author; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-tag d-flex justify-content-center pb-4"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Category</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_category; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-book d-flex justify-content-center pb-4"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Book</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_book; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Book Registration</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-book-registration"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user_log_action as $user_log) : ?>
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="<?= base_url(); ?>assets/img/avatar_image/<?= $user_log['avatar_image'] ?>">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0"><?= $user_log['first_name']; ?> <?= $user_log['last_name']; ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="font-bold mb-0">@<?= $user_log['username']; ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="font-bold mb-0"><?= $user_log['role']; ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $user_log['action']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url(); ?>/assets/img/avatar_image/<?= $user['avatar_image']; ?>" alt="Avatar Image">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $user['username']; ?></h5>
                            <h6 class="text-muted mb-0"><?= $user['email']; ?></h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Recent Books</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach ($recent_books as $recent_book) : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="">
                                <img src="<?= base_url(); ?>assets/img/cover_image/<?= $recent_book['cover_image']; ?>" class="cover-image2">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $recent_book['title']; ?></h5>
                                <h6 class="mb-0">Author: <span class="text-muted"><?= $recent_book['author']; ?></span></h6>
                                <h6 class="mt-2 mb-0">Publisher: <span class="text-muted"><?= $recent_book['publisher']; ?></span></h6>
                                <h6 class="mt-2 mb-0">Category: <span class="text-muted"><?= $recent_book['category']; ?></span></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Need: Apexcharts -->
<script src="<?= base_url(); ?>template/mazer/dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url(); ?>template/mazer/dist/assets/static/js/pages/dashboard.js"></script>

<script>
    const getBookRegistration = <?= $book_registration ?>;

    const optionsBookRegistration = {
        annotations: {
            position: "back",
        },
        datalabels: {
            enabled: false,
        },
        chart: {
            type: "bar",
            height: 300,
        },
        fill: {
            opacity: 1,
        },
        plotOptions: {},
        series: [{
            name: "Book Registration",
            data: getBookRegistration.map((item) => {
                return Number(item.total)
            }),
        }, ],
        colors: "#5DDAB4",
        xaxis: {
            categories: getBookRegistration.map((item) => item.month),
        },
    };

    const chartBookRegistration = new ApexCharts(
        document.querySelector("#chart-book-registration"),
        optionsBookRegistration
    );

    chartBookRegistration.render();
</script>
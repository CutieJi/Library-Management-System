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
                                        <i class="fas fa-fw fa-download pb-1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Book Borrowed</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_book_borrowed; ?></h6>
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
                                        <i class="fas fa-fw fa-upload pb-1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Book Returned</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_book_returned; ?></h6>
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
                                    <h6 class="text-muted font-semibold">Total Quantity Borrowed</h6>
                                    <h6 class="font-extrabold mb-0"><?= $total_quantity_borrowed; ?></h6>
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
                                        <i class="fas fa-fw fa-money-bill"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Fine Amount</h6>
                                    <h6 class="font-extrabold mb-0">₱<?= $total_fine_amount != null ? $total_fine_amount : 0; ?></h6>
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
                            <h4>Monthly Book Borrowed</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-monthly-book-borrowed"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Monthly Book Returned</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-monthly-book-returned"></div>
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

                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Borrowed Status</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Cover Image</th>
                                            <th>Title</th>
                                            <th>Quantity</th>
                                            <th>Borrow Date</th>
                                            <th>Return Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($latest_borrowed_status as $latest_borrowed) : ?>
                                            <tr>
                                                <td class="col-auto">
                                                    <img src="<?= base_url(); ?>assets/img/cover_image/<?= $latest_borrowed['cover_image'] ?>" alt="Cover Image" class="" width="150px" height="200px">
                                                </td>
                                                <td class="col-auto">
                                                    <p class="font-bold mb-0"><?= $latest_borrowed['title']; ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="font-bold mb-0"><?= $latest_borrowed['quantity']; ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $latest_borrowed['borrow_date']; ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0"><?= $latest_borrowed['return_date']; ?></p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">
                                                        <?php if ($latest_borrowed['status'] == "Pending") : ?>
                                                            <span class="badge bg-warning rounded-5"><span>&#x2022;</span> <?= $latest_borrowed['status']; ?></span>
                                                        <?php elseif ($latest_borrowed['status'] == "Rejected") : ?>
                                                            <span class="badge bg-danger rounded-5"><span>&#x2022;</span> <?= $latest_borrowed['status']; ?></span>
                                                        <?php elseif ($latest_borrowed['status'] == "Accepted") : ?>
                                                            <span class="badge bg-success rounded-5"><span>&#x2022;</span> <?= $latest_borrowed['status']; ?></span>
                                                        <?php endif; ?>
                                                    </p>
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
                    <h4>Recently Book Borrowed</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach ($recently_book_borrowed as $recent_borrow) : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="hover-scale">
                                <a href="<?= base_url(); ?>member/book/<?= $recent_borrow['id']; ?>">
                                    <img src="<?= base_url(); ?>assets/img/cover_image/<?= $recent_borrow['cover_image']; ?>" class="cover-image2">
                                </a>
                            </div>
                            <div class="name ms-4">
                                <a href="<?= base_url(); ?>member/book/<?= $recent_borrow['id']; ?>">
                                    <h5 class="mb-1"><?= $recent_borrow['title']; ?></h5>
                                </a>
                                <h6 class="mb-0">Author: <span class="text-muted"><?= $recent_borrow['author']; ?></span></h6>
                                <h6 class="mt-2 mb-0">Publisher: <span class="text-muted"><?= $recent_borrow['publisher']; ?></span></h6>
                                <h6 class="mt-2 mb-0">Category: <span class="text-muted"><?= $recent_borrow['category']; ?></span></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>Recently Book Returned</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach ($recently_book_returned as $recent_return) : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="hover-scale">
                                <a href="<?= base_url(); ?>member/book/<?= $recent_return['id']; ?>">
                                    <img src="<?= base_url(); ?>assets/img/cover_image/<?= $recent_return['cover_image']; ?>" class="cover-image2">
                                </a>
                            </div>
                            <div class="name ms-4">
                                <a href="<?= base_url(); ?>member/book/<?= $recent_return['id']; ?>">
                                    <h5 class="mb-1"><?= $recent_return['title']; ?></h5>
                                </a>
                                <h6 class="mb-0">Author: <span class="text-muted"><?= $recent_return['author']; ?></span></h6>
                                <h6 class="mt-2 mb-0">Publisher: <span class="text-muted"><?= $recent_return['publisher']; ?></span></h6>
                                <h6 class="mt-2 mb-0">Category: <span class="text-muted"><?= $recent_return['category']; ?></span></h6>
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
    const getMonthlyBookBorrowed = <?= $monthly_book_borrowed ?>;

    const optionsMonthlyBookBorrowed = {
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
            name: "Book Borrowed",
            data: getMonthlyBookBorrowed.map((item) => {
                return Number(item.total)
            }),
        }, ],
        colors: "#435ebe",
        xaxis: {
            categories: getMonthlyBookBorrowed.map((item) => item.month),
        },
    };

    const chartMonthlyBookBorrowed = new ApexCharts(
        document.querySelector("#chart-monthly-book-borrowed"),
        optionsMonthlyBookBorrowed
    );

    chartMonthlyBookBorrowed.render();

    const getMonthlyBookReturned = <?= $monthly_book_returned ?>;

    const optionsMonthlyBookReturned = {
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
            name: "Book Returned",
            data: getMonthlyBookReturned.map((item) => {
                return Number(item.total)
            }),
        }, ],
        colors: "#5DDAB4",
        xaxis: {
            categories: getMonthlyBookReturned.map((item) => item.month),
        },
    };

    const chartMonthlyBookReturned = new ApexCharts(
        document.querySelector("#chart-monthly-book-returned"),
        optionsMonthlyBookReturned
    );

    chartMonthlyBookReturned.render();
</script>
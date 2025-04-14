
<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Borrow</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($list_borrow as $lb) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $lb['cover_image'] ?>" alt="Cover Image" class="" width="150px" height="200px">
                                        </div>
                                    </div>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $lb['title']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $lb['quantity']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $lb['borrow_date']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $lb['return_date']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <?php if ($lb['status'] == "Pending") : ?>
                                        <span class="badge bg-warning rounded-5"><span>&#x2022;</span> <?= $lb['status']; ?></span>
                                    <?php elseif ($lb['status'] == "Rejected") : ?>
                                        <span class="badge bg-danger rounded-5"><span>&#x2022;</span> <?= $lb['status']; ?></span>
                                    <?php elseif ($lb['status'] == "Accepted") : ?>
                                        <span class="badge bg-success rounded-5"><span>&#x2022;</span> <?= $lb['status']; ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
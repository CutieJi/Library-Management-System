
<?= $this->session->flashdata('message') ?>
<?= form_error('return_date', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('quantity', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Request Return</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User</th>
                            <th scope="col">Cover Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Request Return Date</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Fine Amount</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($list_return as $lr) : ?>
                            <?php if ($lr['status'] == "Request Return" || $lr['status'] == "Returned") : ?>
                                <tr>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $i; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?= base_url(); ?>assets/img/avatar_image/<?= $lr['avatar_image'] ?>">
                                            </div>
                                            <p class="font-bold ms-3 mb-0"><?= $lr['first_name']; ?> <?= $lr['last_name']; ?></p>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <img src="<?= base_url(); ?>assets/img/cover_image/<?= $lr['cover_image'] ?>" alt="Cover Image" class="" width="150px" height="200px">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $lr['title']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $lr['quantity']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $lr['borrow_date']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $lr['request_return_date']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $lr['return_date']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <?php if ($lr['status'] == "Request Return") : ?>
                                            <span class="badge bg-warning rounded-5"><span>&#x2022;</span> <?= $lr['status']; ?></span>
                                        <?php elseif ($lr['status'] == "Returned") : ?>
                                            <span class="badge bg-success rounded-5"><span>&#x2022;</span> <?= $lr['status']; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0">₱<?= $lr['fine_amount']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <p class="font-bold mb-0"><?= $lr['message']; ?></p>
                                    </td>
                                    <td class="col-auto">
                                        <?php if ($lr['status'] == "Request Return") : ?>
                                            <span class="badge bg-primary cursor-pointer" onclick="verifyReturn('<?= $lr['id'] ?>', '<?= $lr['book_id'] ?>')">Verify</span>
                                        <?php else : ?>
                                            <span class="badge bg-primary opacity-50">Verify</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalVerifyReturn" tabindex="-1" role="dialog" aria-labelledby="modalVerifyReturnTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVerifyReturnTitle">Verify Return</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('request/return'); ?>" method="POST">
                <div class="modal-body">

                    <input type="hidden" class="form-control" id="id" name="id">
                    <input type="hidden" class="form-control" id="book_id" name="book_id">

                    <!-- Publish Date Field -->
                    <div class="form-group">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" name="return_date" id="return_date" class="form-control mb-3 flatpickr-no-clock flatpickr-monthSelect-theme-dark" placeholder="Select Date" value="">
                    </div>

                    <!-- Quantity Field -->
                    <div class="form-group">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="<?= set_value('quantity'); ?>">
                    </div>

                    <!-- Fine Amount Field -->
                    <div class="form-group">
                        <label for="fine_amount" class="form-label">Fine amount</label>
                        <input type="number" name="fine_amount" id="fine_amount" class="form-control" value="<?= set_value('fine_amount'); ?>">
                    </div>

                    <!-- Message Field -->
                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" style="height: 200px !important;"><?= set_value('message'); ?></textarea>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <span class="d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <span class="d-sm-block">Add</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url(); ?>`

    const verifyReturn = (returnId, book_id) => {
        $('#id').val(returnId);
        $('#book_id').val(book_id);
        $('#modalVerifyReturn').modal('show');
    }
</script>
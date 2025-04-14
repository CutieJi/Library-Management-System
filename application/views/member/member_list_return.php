<?= $this->session->flashdata('message') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Return</h5>
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
                            <th scope="col">Fine Amount</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($list_return as $lr) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
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
                                    <p class="font-bold mb-0"><?= $lr['return_date']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <?php if ($lr['status'] == "Borrowed") : ?>
                                        <span class="badge bg-primary rounded-5"><span>&#x2022;</span> <?= $lr['status']; ?></span>
                                    <?php elseif ($lr['status'] == "Request Return") : ?>
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
                                    <?php if ($lr['status'] == "Borrowed") : ?>
                                        <span class="badge bg-primary cursor-pointer" onclick="requestReturn(this)" data-id="<?= $lr['id']; ?>">Request Return</span>
                                    <?php else : ?>
                                        <span class="badge bg-primary opacity-50">Request Return</span>
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

<script>
    const baseUrl = `<?= base_url(); ?>`

    const requestReturn = (data) => {
        const id = $(data).data('id');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to request return for this book?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}member/change_return_status_by_id/${id}`
            }
        })
    }
</script>
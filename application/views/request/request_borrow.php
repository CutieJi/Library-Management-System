
<?= $this->session->flashdata('message') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Request Borrow</h5>
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
                            <th scope="col">Return Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($list_borrow as $lb) : ?>
                            <tr>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $i; ?></p>
                                </td>
                                <td class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?= base_url(); ?>assets/img/avatar_image/<?= $lb['avatar_image'] ?>">
                                        </div>
                                        <p class="font-bold ms-3 mb-0"><?= $lb['first_name']; ?> <?= $lb['last_name']; ?></p>
                                    </div>
                                </td>
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
                                <td class="col-auto">
                                    <?php if ($lb['status'] == "Pending") : ?>
                                        <span class="badge bg-success cursor-pointer" onclick="acceptedOrRejectedBorrow(this)" data-id="<?= $lb['id']; ?>" data-status="Accepted">Accept</span>
                                        <span class="badge bg-danger cursor-pointer" onclick="acceptedOrRejectedBorrow(this)" data-id="<?= $lb['id']; ?>" data-status="Rejected">Reject</span>
                                    <?php else : ?>
                                        <span class="badge bg-success opacity-50">Accept</span>
                                        <span class="badge bg-danger opacity-50">Reject</span>
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

    const acceptedOrRejectedBorrow = (data) => {
        const id = $(data).data('id');
        const status = $(data).data('status');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to ${status} this request?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}request/change_request_${status.toLowerCase()}/${id}`
            }
        })
    }
</script>
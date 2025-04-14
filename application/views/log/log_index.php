
<?= $this->session->flashdata('message') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Log Action</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Log Action</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($user_log_action as $user_log) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
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
                                    <p class="font-bold mb-0"><?= $user_log['action']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($user_log['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($user_log['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a class="cursor-pointer delete-menu" onclick="deleteLog(this)" data-id="<?= $user_log['id']; ?>">
                                        <span class="badge bg-danger">Delete</span>
                                    </a>
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

    const deleteLog = (data) => {
        const id = $(data).data('id');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this log?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}log/delete_log_by_id/${id}`
            }
        })
    }
</script>
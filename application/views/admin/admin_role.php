
<?= $this->session->flashdata('message') ?>
<?= form_error('role', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Role</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modallAddNewRole">Add New Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $r['role']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($r['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($r['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a href="<?= base_url('admin/role_access/' . $r['role']); ?>" class="cursor-pointer">
                                        <span class="badge bg-success">Change Access</span>
                                    </a>
                                    <a onclick="changeRole('<?= $r['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-menu" onclick="deleteRole(this)" data-id="<?= $r['id']; ?>" data-role="<?= $r['role']; ?>">
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

<!-- Modal Add New Role -->
<div class="modal fade" id="modallAddNewRole" tabindex="-1" role="dialog" aria-labelledby="modallAddNewRoleTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modallAddNewRoleTitle">Add New Role</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <label for="role">Role Name</label>
                    <div class="form-group">
                        <input type="text" id="role" name="role" class="form-control">
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

<!-- Modal Change Menu -->
<div class="modal fade" id="modalChangeRole" tabindex="-1" role="dialog" aria-labelledby="modalChangeRoleTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeRoleTitle">Change Role</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('admin/change_role_by_id'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="changeId" name="id" class="form-control">

                    <label for="changeRole">Role Name</label>
                    <div class="form-group">
                        <input type="text" id="changeRole" name="role" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <span class="d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <span class="d-sm-block">Change</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url(); ?>`

    const changeRole = (roleId) => {
        $.get(`${baseUrl}admin/get_role_by_id/${roleId}`, (data) => {
            const role = $.parseJSON(data);

            $('#changeId').val(role.id);
            $('#changeRole').val(role.role);
            $('#modalChangeRole').modal('show');
        })
    }

    const deleteRole = (data) => {
        const id = $(data).data('id');
        const role = $(data).data('role');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this role "<b>${role}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}admin/delete_role_by_id/${id}`
            }
        })
    }
</script>
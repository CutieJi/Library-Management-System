
<?= $this->session->flashdata('message') ?>
<?= form_error('role', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Granted Access</h5>
            <a class="btn btn-primary" style="cursor: default;">Role selected: <b><?= $role['role']; ?></b></a>
        </div>
        <div class="card-body">
            <!-- <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?= check_access($role['role'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" onclick="changeRoleAccess(this)">
                                </div>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table> -->

            <div class="table-responsive">
                <table class="table table-hover table-lg">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menu</th>
                            <th>Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $m['menu']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?= check_access($role['role'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" onclick="changeRoleAccess(this)">
                                    </div>
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
    const changeRoleAccess = (data) => {
        const roleId = $(data).data('role');
        const menuId = $(data).data('menu');

        $.ajax({
            url: "<?= base_url('admin/change_role_access'); ?>",
            type: "POST",
            data: {
                roleId,
                menuId
            },
            success: function(response) {
                document.location.href = `<?= base_url('admin/role_access') ?>/<?= $role['role'] ?>`
            }
        })
    }
</script>
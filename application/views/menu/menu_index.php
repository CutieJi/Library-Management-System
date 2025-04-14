
<?= $this->session->flashdata('message') ?>
<?= form_error('menu', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Menu</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewMenu">Add New Menu</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
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
                                    <p class="font-bold mb-0"><?= (new DateTime($m['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($m['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changeMenu('<?= $m['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-menu" onclick="deleteMenu(this)" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>">
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

<!-- Modal Add New Menu -->
<div class="modal fade" id="modalAddNewMenu" tabindex="-1" role="dialog" aria-labelledby="modalAddNewMenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewMenuTitle">Add New Menu</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <label for="menu">Menu Name</label>
                    <div class="form-group">
                        <input type="text" id="menu" name="menu" class="form-control">
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
<div class="modal fade" id="modalChangeMenu" tabindex="-1" role="dialog" aria-labelledby="modalChangeMenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeMenuTitle">Change Menu</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('menu/change_menu_by_id'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="changeId" name="id" class="form-control">

                    <label for="changeMenu">Menu Name</label>
                    <div class="form-group">
                        <input type="text" id="changeMenu" name="menu" class="form-control">
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

    const changeMenu = (menuId) => {
        $.get(`${baseUrl}menu/get_menu_by_id/${menuId}`, (data) => {
            const menu = $.parseJSON(data);

            $('#changeId').val(menu.id);
            $('#changeMenu').val(menu.menu);
            $('#modalChangeMenu').modal('show');
        })
    }

    const deleteMenu = (data) => {
        const id = $(data).data('id');
        const menu = $(data).data('menu');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this menu "<b>${menu}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}menu/delete_menu_by_id/${id}`
            }
        })
    }
</script>

<?= $this->session->flashdata('message') ?>
<?= form_error('title', '<div class="alert alert-danger mb-4">', '</div>') ?>
<?= form_error('menu_id', '<div class="alert alert-danger mb-4">', '</div>') ?>
<?= form_error('url', '<div class="alert alert-danger mb-4">', '</div>') ?>
<?= form_error('icon', '<div class="alert alert-danger mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Submenu</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewSubmenu">Add New Submenu</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Submenu / Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Url</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($submenu as $sm) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $sm['title']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $sm['menu']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $sm['url']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $sm['icon']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($sm['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($sm['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changeMenu('<?= $sm['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-menu" onclick="deleteSubmenu(this)" data-id="<?= $sm['id']; ?>" data-submenu="<?= $sm['title']; ?>">
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

<!-- Modal Add New Submenu -->
<div class="modal fade" id="modalAddNewSubmenu" tabindex="-1" role="dialog" aria-labelledby="modalAddNewSubmenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewSubmenuTitle">Add New Submenu</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('submenu'); ?>" method="POST">
                <div class="modal-body">

                    <!-- Submenu / Title Field -->
                    <div class="form-group">
                        <label for="title">Submenu / Title Name</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?= set_value('title'); ?>">
                    </div>

                    <!-- Menu Field -->
                    <div class="form-group">
                        <label for="menu_id">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-select form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Url Field -->
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" id="url" name="url" class="form-control" value="<?= set_value('url'); ?>">
                    </div>

                    <!-- Icon Field -->
                    <div class="form-group">
                        <label for="icon">Icon Class</label>
                        <input type="text" id="icon" name="icon" class="form-control" value="<?= set_value('icon'); ?>">
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

<!-- Modal Change Submenu -->
<div class="modal fade" id="modalChangeSubmenu" tabindex="-1" role="dialog" aria-labelledby="modalChangeSubmenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeSubmenuTitle">Change Submenu</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('submenu/change_submenu_by_id'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="changeId" name="id" class="form-control">

                    <!-- Submenu / Title Field -->
                    <div class="form-group">
                        <label for="titleChange">Submenu / Title Name</label>
                        <input type="text" id="titleChange" name="title" class="form-control">
                    </div>

                    <!-- Menu Field -->
                    <div class="form-group">
                        <label for="menu_idChange">Menu</label>
                        <select name="menu_id" id="menu_idChange" class="form-select form-control">
                            <option value="" id="selectMenu"></option>
                        </select>
                    </div>

                    <!-- Url Field -->
                    <div class="form-group">
                        <label for="urlChange">Url</label>
                        <input type="text" id="urlChange" name="url" class="form-control">
                    </div>

                    <!-- Icon Field -->
                    <div class="form-group">
                        <label for="iconChange">Icon Class</label>
                        <input type="text" id="iconChange" name="icon" class="form-control">
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

    const changeMenu = (submenuId) => {
        $.get(`${baseUrl}submenu/get_submenu_by_id/${submenuId}`, (data) => {
            const submenu = $.parseJSON(data);

            $('#changeId').val(submenu.id);
            $('#titleChange').val(submenu.title);
            $('#selectMenu').val(submenu.menu_id);
            $('#selectMenu').text(submenu.menu);
            $('#urlChange').val(submenu.url);
            $('#iconChange').val(submenu.icon);

            const menu_idChange = document.querySelector('#menu_idChange');

            const options = Array.from(menu_idChange.options);
            options.forEach((option) => {
                if (option.id !== 'selectMenu') {
                    menu_idChange.removeChild(option);
                }
            })

            submenu.menus.map((m) => {
                if (submenu.menu_id !== m.id) {
                    const option = document.createElement('option');
                    option.value = m.id
                    option.innerHTML = m.menu
                    menu_idChange.appendChild(option);
                }
            })

            $('#modalChangeSubmenu').modal('show');
        })
    }

    const deleteSubmenu = (data) => {
        const id = $(data).data('id');
        const submenu = $(data).data('submenu');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this submenu "<b>${submenu}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}submenu/delete_submenu_by_id/${id}`
            }
        })
    }
</script>
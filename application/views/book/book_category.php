
<?= $this->session->flashdata('message') ?>
<?= form_error('category', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Book Category</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewCategory">Add New Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($book_category as $bc) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bc['category']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($bc['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($bc['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changeCategory('<?= $bc['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-category" onclick="deleteCategory(this)" data-id="<?= $bc['id']; ?>" data-category="<?= $bc['category']; ?>">
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

<!-- Modal Add New Category -->
<div class="modal fade" id="modalAddNewCategory" tabindex="-1" role="dialog" aria-labelledby="modalAddNewCategoryTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewCategoryTitle">Add New Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('book/book_category'); ?>" method="POST">
                <div class="modal-body">
                    <label for="category">Category Name</label>
                    <div class="form-group">
                        <input type="text" id="category" name="category" class="form-control">
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

<!-- Modal Change Category -->
<div class="modal fade" id="modalChangeCategory" tabindex="-1" role="dialog" aria-labelledby="modalChangeCategoryTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeCategoryTitle">Change Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('book/change_category_by_id'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="changeId" name="id" class="form-control">

                    <label for="changeCategory">Category Name</label>
                    <div class="form-group">
                        <input type="text" id="changeCategory" name="category" class="form-control">
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

    const changeCategory = (categoryId) => {
        $.get(`${baseUrl}book/get_category_by_id/${categoryId}`, (data) => {
            const category = $.parseJSON(data);

            $('#changeId').val(category.id);
            $('#changeCategory').val(category.category);
            $('#modalChangeCategory').modal('show');
        })
    }

    const deleteCategory = (data) => {
        const id = $(data).data('id');
        const category = $(data).data('category');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this category "<b>${category}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}book/delete_category_by_id/${id}`
            }
        })
    }
</script>
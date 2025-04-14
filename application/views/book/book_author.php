
<?= $this->session->flashdata('message') ?>
<?= form_error('author', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Book Author</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewAuthor">Add New Author</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($book_author as $ba) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $ba['author']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($ba['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($ba['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changeAuthor('<?= $ba['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-publisher" onclick="deleteAuthor(this)" data-id="<?= $ba['id']; ?>" data-author="<?= $ba['author']; ?>">
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

<!-- Modal Add New Author -->
<div class="modal fade" id="modalAddNewAuthor" tabindex="-1" role="dialog" aria-labelledby="modalAddNewAuthorTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewAuthorTitle">Add New Author</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('book/book_author'); ?>" method="POST">
                <div class="modal-body">
                    <label for="author">Author Name</label>
                    <div class="form-group">
                        <input type="text" id="author" name="author" class="form-control">
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

<!-- Modal Change Author -->
<div class="modal fade" id="modalChangeAuthor" tabindex="-1" role="dialog" aria-labelledby="modalChangeAuthorTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeAuthorTitle">Change Author</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('book/change_author_by_id'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="changeId" name="id" class="form-control">

                    <label for="changeAuthor">Author Name</label>
                    <div class="form-group">
                        <input type="text" id="changeAuthor" name="author" class="form-control">
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

    const changeAuthor = (authorId) => {
        $.get(`${baseUrl}book/get_author_by_id/${authorId}`, (data) => {
            const author = $.parseJSON(data);

            $('#changeId').val(author.id);
            $('#changeAuthor').val(author.author);
            $('#modalChangeAuthor').modal('show');
        })
    }

    const deleteAuthor = (data) => {
        const id = $(data).data('id');
        const author = $(data).data('author');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this author "<b>${author}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}book/delete_author_by_id/${id}`
            }
        })
    }
</script>
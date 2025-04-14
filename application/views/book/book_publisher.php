
<?= $this->session->flashdata('message') ?>
<?= form_error('publisher', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Book Publisher</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewPublisher">Add New Publisher</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($book_publisher as $bp) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bp['publisher']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($bp['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($bp['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changePublisher('<?= $bp['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-publisher" onclick="deletePublisher(this)" data-id="<?= $bp['id']; ?>" data-publisher="<?= $bp['publisher']; ?>">
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

<!-- Modal Add New Publisher -->
<div class="modal fade" id="modalAddNewPublisher" tabindex="-1" role="dialog" aria-labelledby="modalAddNewPublisherTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewPublisherTitle">Add New Publisher</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('book'); ?>" method="POST">
                <div class="modal-body">
                    <label for="publisher">Publisher Name</label>
                    <div class="form-group">
                        <input type="text" id="publisher" name="publisher" class="form-control">
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

<!-- Modal Change Publisher -->
<div class="modal fade" id="modalChangePublisher" tabindex="-1" role="dialog" aria-labelledby="modalChangePublisherTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangePublisherTitle">Change Publisher</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('book/change_publisher_by_id'); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="changeId" name="id" class="form-control">

                    <label for="changePublisher">Publisher Name</label>
                    <div class="form-group">
                        <input type="text" id="changePublisher" name="publisher" class="form-control">
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

    const changePublisher = (publisherId) => {
        $.get(`${baseUrl}book/get_publisher_by_id/${publisherId}`, (data) => {
            const publisher = $.parseJSON(data);

            $('#changeId').val(publisher.id);
            $('#changePublisher').val(publisher.publisher);
            $('#modalChangePublisher').modal('show');
        })
    }

    const deletePublisher = (data) => {
        const id = $(data).data('id');
        const publisher = $(data).data('publisher');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this publisher "<b>${publisher}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}book/delete_publisher_by_id/${id}`
            }
        })
    }
</script>
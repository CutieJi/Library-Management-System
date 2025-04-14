
<?= $this->session->flashdata('message') ?>
<?= form_error('borrow_date', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('return_date', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('quantity', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-12 col-lg-3 p-3">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div>
                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $book['cover_image']; ?>" alt="Cover Image" class="img-preview cover-image">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 p-3">
                    <h3><?= $book['title']; ?></h3>
                    <p class="text-bold">By: <span class="text-muted"><?= $book['author']; ?></span></p>
                    <p class="text-bold">Synopsis: <span class="text-muted"><?= $book['synopsis']; ?></span></p>

                    <div class="container text-center">
                        <div class="row g-2">
                            <div class="col-lg-3 col-sm-6 border">
                                <div class="p-3">
                                    <p class="text-bold">
                                        Publish Date: <span class="text-muted"><?= $book['publish_date']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 border">
                                <div class="p-3">
                                    <p class="text-bold">
                                        Publisher: <span class="text-muted"><?= $book['publisher']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 border">
                                <div class="p-3">
                                    <p class="text-bold">
                                        Category: <span class="text-muted"><?= $book['category']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 border">
                                <div class="p-3">
                                    <p class="text-bold">
                                        Language: <span class="text-muted"><?= $book['language']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 border">
                                <div class="p-3">
                                    <p class="text-bold">
                                        Total Page: <span class="text-muted"><?= $book['total_page']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 border">
                                <div class="p-3">
                                    <p class="text-bold">
                                        Available: <span class="text-muted"><?= $book['quantity_available']; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-end mt-3">
                        <!-- <button class="btn btn-primary"><i class="fas fa-fw fa-cart-arrow-down me-1"></i> Add to Cart</button> -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modallAddBorrowBook">Borrow Book</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Modal Borrow Book -->
<div class="modal fade" id="modallAddBorrowBook" tabindex="-1" role="dialog" aria-labelledby="modallAddBorrowBookTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modallAddBorrowBookTitle">Borrow Book</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url(''); ?>member/book/<?= $book['id']; ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="borrow_date" class="form-label">Borrow Date</label>
                        <input type="date" name="borrow_date" id="borrow_date" class="form-control mb-3 flatpickr-no-clock flatpickr-monthSelect-theme-dark" placeholder="Select Date" value="<?= set_value('borrow_date'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="return_date" class="form-label">Return Date</label>
                        <input type="date" name="return_date" id="return_date" class="form-control mb-3 flatpickr-no-clock flatpickr-monthSelect-theme-dark" placeholder="Select Date" value="<?= set_value('borrow_date'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="quantity" class="form-label">Quantity <span class="text-muted">max: <?= $book['quantity_available']; ?></span></label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="<?= set_value('quantity'); ?>">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <span class="d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <span class="d-sm-block">Borrow</span>
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

<?= $this->session->flashdata('message') ?>
<?= form_error('title', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('synopsis', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('language', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('publish_date', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('total_page', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('quantity_available', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('publisher', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
<?= form_error('author', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List Book Data</h5>
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewBook">Add New Book</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col">Language</th>
                            <th scope="col">Publish Date</th>
                            <th scope="col">Total Page</th>
                            <th scope="col">Quantity Available</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($book_data as $bd) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <img src="<?= base_url(); ?>assets/img/cover_image/<?= $bd['cover_image'] ?>" alt="Cover Image" class="" width="150px" height="200px">
                                        </div>
                                    </div>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['title']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <?php
                                    $synopsis = $bd['synopsis'];
                                    $maxLength = 100; // Tentukan panjang maksimal yang diinginkan
                                    $displaySynopsis = (strlen($synopsis) > $maxLength) ? substr($synopsis, 0, $maxLength) . '...' : $synopsis;
                                    ?>
                                    <p class="font-bold mb-0"><?= $displaySynopsis; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['language']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['publish_date']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['total_page']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['quantity_available']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['publisher']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['author']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $bd['category']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($bd['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($bd['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changeBook('<?= $bd['id']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>
                                    <a class="cursor-pointer delete-publisher" onclick="deleteBook(this)" data-id="<?= $bd['id']; ?>" data-title="<?= $bd['title']; ?>">
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

<!-- Modal Add New Book -->
<div class="modal fade" id="modalAddNewBook" tabindex="-1" role="dialog" aria-labelledby="modalAddNewBookTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddNewBookTitle">Add New Book</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <?= form_open_multipart('book/book_data'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-4 p-3">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="" onclick="chooseFile()">
                                <img src="<?= base_url('assets/img/cover_image/default_cover.jpg'); ?>" alt="Cover Image" class="cursor-pointer hover-scale img-preview cover-image">
                                <!-- Cover Image Field -->
                                <input type="file" id="cover_image" style="display:none;" name="cover_image" onchange="previewImage()" class="image-preview">
                            </div>
                            <h3 class="mt-3 username"></h3>
                            <p class="text-small role-date"></p>
                            <ul class="text-small text-muted mt-3">
                                <li>Max upload file: <b>2MB</b></li>
                                <li>Allowed extension: <b>JPG, JPEG, PNG and WEBP</b></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 p-3">

                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?= set_value('title'); ?>">
                        </div>

                        <!-- Synopsis Field -->
                        <div class="form-group">
                            <label for="synopsis" class="form-label">Synopsis</label>
                            <textarea id="synopsis" name="synopsis" class="form-control" style="height: 200px !important;"><?= set_value('synopsis'); ?></textarea>
                        </div>

                        <!-- Language Field -->
                        <div class="form-group">
                            <label for="language" class="form-label">Language</label>
                            <input type="text" name="language" id="language" class="form-control" value="<?= set_value('language'); ?>">
                        </div>

                        <!-- Publish Date Field -->
                        <div class="form-group">
                            <label for="publish_date" class="form-label">Publish Date</label>
                            <input type="date" name="publish_date" id="publish_date" class="form-control mb-3 flatpickr-no-clock flatpickr-monthSelect-theme-dark" placeholder="Select Date" value="<?= set_value('publish_date'); ?>">
                        </div>

                        <!-- Total Page Field -->
                        <div class="form-group">
                            <label for="total_page" class="form-label">Total Page</label>
                            <input type="number" name="total_page" id="total_page" class="form-control" value="<?= set_value('total_page'); ?>">
                        </div>

                        <!-- Quantity Available Field -->
                        <div class="form-group">
                            <label for="quantity_available" class="form-label">Quantity Available</label>
                            <input type="number" name="quantity_available" id="quantity_available" class="form-control" value="<?= set_value('quantity_available'); ?>">
                        </div>

                        <!-- Publisher Field -->
                        <div class="form-group">
                            <label for="publisher_id">Publisher</label>
                            <select name="publisher_id" id="publisher_id" class="form-select form-control">
                                <option value="">Select Publisher</option>
                                <?php foreach ($publisher as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= $p['publisher']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Author Field -->
                        <div class="form-group">
                            <label for="author_id">Author</label>
                            <select name="author_id" id="author_id" class="form-select form-control">
                                <option value="">Select Author</option>
                                <?php foreach ($author as $a) : ?>
                                    <option value="<?= $a['id']; ?>"><?= $a['author']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Category Field -->
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-select form-control">
                                <option value="">Select Category</option>
                                <?php foreach ($category as $c) : ?>
                                    <option value="<?= $c['id']; ?>"><?= $c['category']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class=" form-group float-end mt-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Change Book -->
<div class="modal fade" id="modalChangeBook" tabindex="-1" role="dialog" aria-labelledby="modalChangeBookTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeBookTitle">Add New Book</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <?= form_open_multipart('book/change_book_data_by_id'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-4 p-3">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="" onclick="chooseFile2()">
                                <img src="" alt="Cover Image" class="cursor-pointer hover-scale img-preview2 cover-image">
                                <!-- Cover Image Field -->
                                <input type="file" id="cover_imageChange" style="display:none;" name="cover_image" onchange="previewImage2()" class="image-preview2">
                            </div>
                            <h3 class="mt-3 username"></h3>
                            <p class="text-small role-date"></p>
                            <ul class="text-small text-muted mt-3">
                                <li>Max upload file: <b>2MB</b></li>
                                <li>Allowed extension: <b>JPG, JPEG, PNG and WEBP</b></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 p-3">
                        <input type="hidden" class="form-control" id="idChange" name="id">

                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="titleChange" class="form-label">Title</label>
                            <input type="text" name="title" id="titleChange" class="form-control" value="">
                        </div>

                        <!-- Synopsis Field -->
                        <div class="form-group">
                            <label for="synopsisChange" class="form-label">Synopsis</label>
                            <textarea id="synopsisChange" name="synopsis" class="form-control" style="height: 200px !important;"></textarea>
                        </div>

                        <!-- Language Field -->
                        <div class="form-group">
                            <label for="languageChange" class="form-label">Language</label>
                            <input type="text" name="language" id="languageChange" class="form-control" value="">
                        </div>

                        <!-- Publish Date Field -->
                        <div class="form-group">
                            <label for="publish_dateChange" class="form-label">Publish Date</label>
                            <input type="date" name="publish_date" id="publish_dateChange" class="form-control mb-3 flatpickr-no-clock flatpickr-monthSelect-theme-dark" placeholder="Select Date" value="">
                        </div>

                        <!-- Total Page Field -->
                        <div class="form-group">
                            <label for="total_pageChange" class="form-label">Total Page</label>
                            <input type="number" name="total_page" id="total_pageChange" class="form-control" value="">
                        </div>

                        <!-- Quantity Available Field -->
                        <div class="form-group">
                            <label for="quantity_availableChange" class="form-label">Quantity Available</label>
                            <input type="number" name="quantity_available" id="quantity_availableChange" class="form-control" value="">
                        </div>

                        <!-- Publisher Field -->
                        <div class="form-group">
                            <label for="change_publisher">Publisher</label>
                            <select name="publisher_id" id="change_publisher" class="form-select form-control">
                                <option value="" id="select_publisher"></option>
                            </select>
                        </div>

                        <!-- Author Field -->
                        <div class="form-group">
                            <label for="change_author">Author</label>
                            <select name="author_id" id="change_author" class="form-select form-control">
                                <option value="" id="select_author"></option>
                            </select>
                        </div>

                        <!-- Category Field -->
                        <div class="form-group">
                            <label for="change_category">Category</label>
                            <select name="category_id" id="change_category" class="form-select form-control">
                                <option value="" id="select_category"></option>
                            </select>
                        </div>

                        <div class=" form-group float-end mt-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url(); ?>`

    const chooseFile = () => {
        document.getElementById("cover_image").click();
    }

    const chooseFile2 = () => {
        document.getElementById("cover_imageChange").click();
    }

    // Preview the image uploaded
    function previewImage2() {
        const image = document.querySelector(".image-preview2");
        const imgPreview = document.querySelector(".img-preview2");

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }

    const changeBook = (bookId) => {
        $.get(`${baseUrl}book/get_book_by_id/${bookId}`, (data) => {
            const book = $.parseJSON(data);

            // Cover Image Field
            $('.img-preview2').attr('src', `${baseUrl}assets/img/cover_image/${book.cover_image}`)

            $('#idChange').val(book.id);
            $('#titleChange').val(book.title);
            $('#synopsisChange').val(book.synopsis);
            $('#languageChange').val(book.language);
            $('#publish_dateChange').val(book.publish_date);
            flatpickr('#publish_dateChange').close();
            $('#total_pageChange').val(book.total_page);
            $('#quantity_availableChange').val(book.quantity_available);

            // Publisher Field
            $('#select_publisher').val(book.publisher_id);
            $('#select_publisher').text(book.publisher);

            const changePublisher = document.querySelector('#change_publisher');
            const options = Array.from(changePublisher.options);
            options.forEach((option) => {
                if (option.id !== 'select_publisher') {
                    changePublisher.removeChild(option);
                }
            })

            book.publishers.map((publisher) => {
                if (book.publisher !== publisher.publisher) {
                    const opt = document.createElement('option')
                    opt.value = publisher.id
                    opt.innerHTML = publisher.publisher
                    changePublisher.appendChild(opt);
                }
            })

            // Author Field
            $('#select_author').val(book.author_id);
            $('#select_author').text(book.author);

            const changeAuthor = document.querySelector('#change_author');
            const options2 = Array.from(changeAuthor.options);
            options2.forEach((option) => {
                if (option.id !== 'select_author') {
                    changeAuthor.removeChild(option);
                }
            })

            book.authors.map((author) => {
                if (book.author !== author.author) {
                    const opt = document.createElement('option')
                    opt.value = author.id
                    opt.innerHTML = author.author
                    changeAuthor.appendChild(opt);
                }
            })

            // Category Field
            $('#select_category').val(book.category_id);
            $('#select_category').text(book.category);

            const changeCategory = document.querySelector('#change_category');
            const options3 = Array.from(changeCategory.options);
            options3.forEach((option) => {
                if (option.id !== 'select_category') {
                    changeCategory.removeChild(option);
                }
            })

            book.categorys.map((category) => {
                if (book.category !== category.category) {
                    const opt = document.createElement('option')
                    opt.value = category.id
                    opt.innerHTML = category.category
                    changeCategory.appendChild(opt);
                }
            })

            $('#changeBook').val(book.publisher);
            $('#modalChangeBook').modal('show');
        })
    }

    const deleteBook = (data) => {
        const id = $(data).data('id');
        const title = $(data).data('title');

        Swal.fire({
            icon: 'warning',
            html: `Are you sure want to delete this book "<b>${title}</b>"?`,
            showCancelButton: true,
            confirmButtonColor: '#d9534f',
            cancelButtonColor: '#5cb85c',
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = `${baseUrl}book/delete_book_by_id/${id}`
            }
        })
    }
</script>
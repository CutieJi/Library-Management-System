
<?= $this->session->flashdata('message') ?>
<div class="flex">
    <div class="float-end">
        <label class="form-label">Last edited: <?= (new DateTime($user['updated_at']))->format('l, j F Y H:m:s'); ?></label>
    </div>
</div>

<section class="section">
    <?= form_open_multipart('user'); ?>
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="avatar avatar-2xl" onclick="chooseFile()">
                            <img src="<?= base_url(); ?>assets/img/avatar_image/<?= $user['avatar_image'] ?>" alt="Avatar Image" class="cursor-pointer hover-scale img-preview">
                            <!-- Avatar Image Field -->
                            <input type="file" id="avatar_image" style="display:none;" name="avatar_image" onchange="previewImage()" class="image-preview">
                        </div>
                        <h3 class="mt-3"><?= $user['username']; ?></h3>
                        <p class="text-small"><?= $role_name; ?> - Since <?= (new DateTime($user['created_at']))->format('d F Y'); ?></p>
                        <ul class="text-small text-muted mt-3">
                            <li>Max upload file: <b>2MB</b></li>
                            <li>Allowed extension: <b>JPG and PNG</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <!-- First Name Field -->
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name']; ?>">
                        <?= form_error('first_name', '<label for="first_name" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Last Name Field -->
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name']; ?>">
                        <?= form_error('last_name', '<label for="last_name" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Username Field -->
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>" disabled>
                        <?= form_error('username', '<label for="username" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Gender Field -->
                    <fieldset class="form-group">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-select form-control" id="basicSelect">
                            <option value="Male" <?= isset($user['gender']) && $user['gender'] == "Male" ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?= isset($user['gender']) && $user['gender'] == "Female" ? 'selected' : ''; ?>>Female</option>
                        </select>
                        <?= form_error('gender', '<label for="gender" class="form-label text-danger mt-2">', '</label>'); ?>
                    </fieldset>

                    <!-- Address Field -->
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" style="height: 100px !important;"><?= $user['address']; ?></textarea>
                        <?= form_error('address', '<label for="address" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" name="phone_number" id="phone_number" class="form-control" value="<?= $user['phone_number']; ?>">
                        <?= form_error('phone_number', '<label for="phone_number" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" disabled>
                        <?= form_error('email', '<label for="email" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <div class="form-group float-start mt-2">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                    <div class="form-group float-end mt-2">
                        <a href="#" id="delete_account" class="btn btn-danger">Delete Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>

<script>
    const chooseFile = () => {
        document.getElementById("avatar_image").click();
    }

    document.getElementById("delete_account").addEventListener("click", async (e) => {
        const {
            value: confirm
        } = await Swal2.fire({
            icon: "warning",
            title: "Confirm Delete Account!",
            input: "text",
            inputLabel: "Type 'Yes, I am sure'",
            inputPlaceholder: "Yes, I am sure",
            html: "Deleted account cannot be restored!",
            showCancelButton: true,
            confirmButtonText: `Yes`,
            cancelButtonText: `No`,
            inputValidator: (value) => {
                return new Promise((resolve) => {
                    if (value === "Yes, I am sure") {
                        resolve();
                    } else {
                        resolve("You must type 'Yes, I am sure'");
                    }
                });
            },
        });

        if (confirm) {
            window.location.href = "<?= base_url('user/delete_account'); ?>";
        }
    });
</script>
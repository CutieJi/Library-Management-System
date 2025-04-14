
<?= $this->session->flashdata('message') ?>
<?= form_error('first_name', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('last_name', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('username', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('email', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('gender', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('address', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('phone_number', '<div class="alert alert-danger mb-4">', '</div>'); ?>
<?= form_error('role_id', '<div class="alert alert-danger mb-4">', '</div>') ?>


<section class="section">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">List User</h5>
            <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewUser">Add New User</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-lg" id="table1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Avatar Image</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th class="col-auto">
                                    <?= $i; ?>
                                </th>
                                <td class="col-auto">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="<?= base_url(); ?>assets/img/avatar_image/<?= $user['avatar_image'] ?>" alt="Avatar Image">
                                        </div>
                                    </div>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['first_name']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['last_name']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['username']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['email']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['gender']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['address']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['phone_number']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= $user['role']; ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($user['created_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <p class="font-bold mb-0"><?= (new DateTime($user['updated_at']))->format('l, j F Y H:m:s'); ?></p>
                                </td>
                                <td class="col-auto">
                                    <a onclick="changeUser('<?= $user['username']; ?>')" class="cursor-pointer">
                                        <span class="badge bg-warning">Edit</span>
                                    </a>

                                    <a onclick="deleteUser('<?= $user['username']; ?>')" class="cursor-pointer">
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

<!-- Modal Change User Data -->
<div class="modal fade" id="modalChangeUserData" tabindex="-1" role="dialog" aria-labelledby="modalChangeUserDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChangeUserDataTitle">Change User Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <!-- <form action="<?= base_url('admin/user_data'); ?>" method="POST"> -->
            <?= form_open_multipart('admin/user_data'); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-4 p-3">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="avatar avatar-2xl" onclick="chooseFile()">
                                <img src="" alt="Avatar Image" class="cursor-pointer hover-scale img-preview">
                                <!-- Avatar Image Field -->
                                <input type="file" id="avatar_image" style="display:none;" name="avatar_image" onchange="previewImage()" class="image-preview">
                            </div>
                            <h3 class="mt-3 username"></h3>
                            <p class="text-small role-date"></p>
                            <ul class="text-small text-muted mt-3">
                                <li>Max upload file: <b>2MB</b></li>
                                <li>Allowed extension: <b>JPG and PNG</b></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-8 p-3">
                        <input type="hidden" class="form-control" id="id" name="id">

                        <!-- First Name Field -->
                        <div class="form-group">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="">
                        </div>

                        <!-- Last Name Field -->
                        <div class="form-group">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name']; ?>">
                        </div>

                        <!-- Username Field -->
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>" disabled>
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" disabled>
                        </div>

                        <!-- Gender Field -->
                        <fieldset class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-select form-control" id="basicSelect">
                                <option value="Male" <?= isset($user['gender']) && $user['gender'] == "Male" ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?= isset($user['gender']) && $user['gender'] == "Female" ? 'selected' : ''; ?>>Female</option>
                            </select>
                        </fieldset>

                        <!-- Address Field -->
                        <div class="form-group">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" name="address" class="form-control" style="height: 100px !important;"><?= $user['address']; ?></textarea>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="number" name="phone_number" id="phone_number" class="form-control" value="<?= $user['phone_number']; ?>">
                        </div>

                        <!-- Role Field -->
                        <div class="form-group">
                            <label for="change_role" class="form-label">Role</label>
                            <select name="role_id" id="change_role" class="form-select form-control">
                                <option id="select_role" value=""></option>
                            </select>
                        </div>

                        <!-- Change Password Field -->
                        <div class="form-group">
                            <label for="password" class="form-label">Change Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="">
                        </div>

                        <div class=" form-group float-end mt-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>

                        <!-- <div class="form-group float-end mt-2">
                            <a id="delete_account" class="btn btn-danger">Delete Account</a>
                        </div> -->
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
        document.getElementById("avatar_image").click();
    }

    const changeUser = (username) => {
        $.get(`${baseUrl}admin/get_user_by_username/${username}`, (data) => {
            const user = $.parseJSON(data);

            // Avatar Image Field
            $('.img-preview').attr('src', `${baseUrl}assets/img/avatar_image/${user.avatar_image}`)
            // Username
            $('.username').text(user.username)

            // Role and Registration Date
            const formattedDate = new Date(user.created_at);
            const optionsDate = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            const formattedDateString = formattedDate.toLocaleDateString('en-US', optionsDate);

            const [month, day, year] = formattedDateString.replace(',', '').split(' ');

            const roleDateText = `${user.role} - Since ${day} ${month} ${year}`;
            $('.role-date').text(roleDateText);

            $('#id').val(user.id);
            // First Name Field
            $('#first_name').val(user.first_name);
            // Last Name Field
            $('#last_name').val(user.last_name);
            // Username Field
            $('#username').val(user.username);
            // Email Field
            $('#email').val(user.email);
            // Gender Field
            $('#gender').val(user.gender);
            // Address Field
            $('#address').val(user.address);
            // Phone Number Field
            $('#phone_number').val(user.phone_number);

            // Role Field
            $('#select_role').val(user.role_id);
            $('#select_role').text(user.role);

            const changeRole = document.querySelector('#change_role');
            const options = Array.from(changeRole.options);
            options.forEach((option) => {
                if (option.id !== 'select_role') {
                    changeRole.removeChild(option);
                }
            })

            user.roles.map((role) => {
                if (user.role !== role.role) {
                    const opt = document.createElement('option')
                    opt.value = role.id
                    opt.innerHTML = role.role
                    changeRole.appendChild(opt);
                }
            })

            $('#delete_account').attr('data-username', user.username);

            $('#modalChangeUserData').modal('show');
        })
    }

    const deleteUser = async (username) => {
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
            window.location.href = `${baseUrl}/admin/delete_user_by_username/${username}`;
        }
    }
</script>
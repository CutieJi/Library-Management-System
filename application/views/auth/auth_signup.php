
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div class="logo">
                        <a href="#">
                            <h1 class="mt-3"><?= getenv('APP_NAME'); ?></h1>
                        </a>
                    </div>

                    <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="auth-title">Sign Up.</h1>
                <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                <form method="POST" action="<?= base_url('auth/signup'); ?>">

                    <!-- First Name Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" id="first_name" name="first_name" value="<?= set_value('first_name'); ?>" class="form-control form-control-xl" placeholder="First Name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <?= form_error('first_name', '<label for="first_name" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Last Name Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" id="last_name" name="last_name" value="<?= set_value('last_name'); ?>" class="form-control form-control-xl" placeholder="Last Name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <?= form_error('last_name', '<label for="last_name" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Username Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" id="username" name="username" value="<?= set_value('username'); ?>" class="form-control form-control-xl" placeholder="Username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <label for="username" class="form-label text-muted mt-2">Only lowercase letters and numbers, no symbols. Example: <strong>foobar</strong></label><br />
                        <?= form_error('username', '<label for="username" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Gender Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <fieldset class="form-group">
                            <select name="gender" id="gender" class="form-select form-control form-control-xl" id="basicSelect">
                                <option value="" <?= isset($selected_gender) && $selected_gender == "" ? 'selected' : ''; ?>>Select Gender</option>
                                <option value="Male" <?= isset($selected_gender) && $selected_gender == "Male" ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?= isset($selected_gender) && $selected_gender == "Female" ? 'selected' : ''; ?>>Female</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-gender-ambiguous"></i>
                            </div>
                            <?= form_error('gender', '<label for="gender" class="form-label text-danger mt-2">', '</label>'); ?>
                        </fieldset>
                    </div>

                    <!-- Address Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <textarea id="address" name="address" class="form-control form-control-xl" style="height: 100px !important;" placeholder="Address"><?= set_value('address'); ?></textarea>
                        <div class="form-control-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <?= form_error('address', '<label for="address" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="number" id="phone_number" name="phone_number" value="<?= set_value('phone_number'); ?>" class="form-control form-control-xl" placeholder="Phone Number">
                        <div class="form-control-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <?= form_error('phone_number', '<label for="phone_number" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" id="email" name="email" value="<?= set_value('email'); ?>" class="form-control form-control-xl" placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <?= form_error('email', '<label for="email" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Password Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-xl" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <label for="password" class="form-label text-muted mt-2">Minimun 8 character</label><br />
                        <?= form_error('password', '<label for="password" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-xl" placeholder="Confirm Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <?= form_error('confirm_password', '<label for="confirm_password" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>

                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Already have an account? <a href="<?= base_url(); ?>" class="font-bold">Log In.</a></p>
                </div>
            </div>
            
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right" class="d-flex align-items-center justify-content-center h-100">
                <img src="<?= base_url(); ?>assets/img/vector/OpenDoodles/svg/SitReadingDoodle.svg" alt="Sit Reading Doodle" class="w-75">
            </div>
        </div>
    </div>

</div>
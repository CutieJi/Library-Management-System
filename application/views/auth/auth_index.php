
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
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-3">
                    Log in with your data that you entered during registration.
                </p>

                <?= $this->session->flashdata('message') ?>

                <form method="POST" action="<?= base_url('auth'); ?>">

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" id="identity" name="identity" value="<?= set_value('identity'); ?>" class="form-control form-control-xl" placeholder="Username or Email" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <?= form_error('identity', '<label for="identity" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-xl" placeholder="Password" />
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <?= form_error('password', '<label for="password" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Log in
                    </button>

                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Don't have an account?
                        <a href="<?= base_url("auth/signup"); ?>" class="font-bold">Sign up.</a>
                    </p>
                    <!-- <p>
                        <a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.
                    </p> -->
                </div>
            </div>
           
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right" class="d-flex align-items-center justify-content-center h-100">
                <img src="<?= base_url(); ?>assets/img/vector/OpenDoodles/png/icp.png" alt="Reading Doodle" class="w-75">
            </div>
        </div>
    </div>
</div>
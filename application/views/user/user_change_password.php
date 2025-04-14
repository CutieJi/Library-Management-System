
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <?= $this->session->flashdata('message') ?>

        <div class="card card-primary">

            <div class="card-body">
                <form action="<?= base_url('user/change_password'); ?>" method="POST">
                    <!-- Current Password Field -->
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input id="current_password" type="password" class="form-control" name="current_password">
                        <?= form_error('current_password', '<label for="current_password" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- New Password Field -->
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input id="new_password" type="password" class="form-control" name="new_password">
                        <label for="password" class="form-label text-muted mt-2">Minimun 8 character</label><br />
                        <?= form_error('new_password', '<label for="new_password" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <!-- Confirm New Password Field -->
                    <div class="form-group">
                        <label for="confirm_new_password">Confirm New Password</label>
                        <input id="confirm_new_password" type="password" class="form-control" name="confirm_new_password">
                        <?= form_error('confirm_new_password', '<label for="confirm_new_password" class="form-label text-danger mt-2">', '</label>'); ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-md btn-block neu-brutalism">
                            Change Password
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>
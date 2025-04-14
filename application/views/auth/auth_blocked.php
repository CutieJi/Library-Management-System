
<div id="error">
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <img class="img-error" src="<?= base_url(); ?>template/mazer/dist/assets/compiled/svg/error-403.svg" alt="Forbidden">
                <h1 class="error-title"><?= $error_message; ?></h1>
                <p class="fs-5 text-gray-600">You are unauthorized to see this page.</p>
                <a href="<?= base_url(); ?>" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
            </div>
        </div>
    </div>
</div>
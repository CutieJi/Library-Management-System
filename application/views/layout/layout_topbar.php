
<div id="main" class="layout-navbar navbar-fixed">
    <!-- layout-navbar navbar-fixed or min-vh-100 -->
    <header>
        <nav class="navbar navbar-expand navbar-light navbar-top">
            <div class="container-fluid">
                <a class="burger-btn d-block cursor-pointer">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                    </ul>
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600"><?= $user['username']; ?></h6>
                                    <p class="mb-0 text-sm text-gray-600"><?= get_role_name($user['role_id']); ?></p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="<?= base_url(); ?>assets/img/avatar_image/<?= $user['avatar_image'] ?>" />
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
                            <li>
                                <h6 class="dropdown-header">Hello, <?= $user['username']; ?>!</h6>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('user'); ?>">
                                    <i class="icon-mid bi bi-person me-2"></i>
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= base_url('user/change_password'); ?>">
                                    <i class="icon-mid bi bi-key me-2"></i>
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-url="<?= base_url('auth/logout'); ?>" id="logout"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3><?= $title; ?></h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <?php
                                $segments = $this->uri->segment_array();

                                echo "<li class='breadcrumb-item'><a href='" . base_url() . "'><i class='fas fa-home'></i></a></li>";

                                $url = '';

                                foreach ($segments as $key => $segment) :
                                ?>
                                    <?php
                                    $url .= '/' . $segment;
                                    $text = ucwords(str_replace('_', ' ', $segment));

                                    if ($url == "/admin/role_access") {
                                        $url = '/admin/role';
                                        $text = 'Role';
                                    }

                                    if ($url == "/member/book") {
                                        $url = '/member/list_book';
                                        $text = 'List Book';
                                    }

                                    if ($key === array_key_last($segments)) :
                                    ?>
                                        <li class="breadcrumb-item ative" aria-current="page"><?= $text; ?></li>
                                    <?php else : ?>
                                        <li class="breadcrumb-item"><a href="<?= base_url($url); ?>"><?= $text; ?></a></li>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
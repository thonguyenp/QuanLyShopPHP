<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                        data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo e(asset('storage/' . $userAdmin->avatar)); ?>" alt=""><?php echo e($userAdmin->name); ?>

                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('admin.profile.index')); ?>"> Tài khoản</a>
                        <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"><i
                                class="fa fa-sign-out pull-right"></i> Đăng xuất</a>
                    </div>
                </li>

                <li class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green"><?php echo e($messages->count()); ?></span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <?php for($i = 0; $i < min (3, $messages->count()); $i++): ?>
                            <li class="nav-item">
                                <a class="dropdown-item">
                                    <span class="image"><img src="<?php echo e(asset('assets/admin/images/user.png')); ?>"
                                            alt="Profile Image" /></span>
                                    <span>
                                        <span><?php echo e($messages[$i]->fullname); ?></span>
                                        <span class="time"><?php echo e($messages[$i]->created_at->diffForHumans()); ?></span>
                                    </span>
                                    <span class="message custom-message-top">
                                        <?php echo e($messages[$i]->message); ?>

                                    </span>
                                </a>
                            </li>

                            <?php endfor; ?>
                            <li class="nav-item">
                                <div class="text-center">
                                    <a class="dropdown-item" href="<?php echo e(route('admin.contact.index')); ?>">
                                        <strong>Xem tất cả liên hệ</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                    </ul>
                </li>
                <li class="nav-item dropdown open" style="margin-right">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-green">12</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item" href="<?php echo e(route('admin.contact.index')); ?>">
                                    <strong>Xem tất cả thông báo</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation --><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/partials/top-navigation.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block; width:100%;">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng số người dùng</span>
                <div class="count"><?php echo e($users->count()); ?></div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-bar-chart"></i> Tổng số lượng sản phẩm</span>
                <div class="count"><?php echo e($products->count()); ?></div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-shopping-cart"></i> Tổng số lượng đơn hàng</span>
                <div class="count green"><?php echo e($orders->count()); ?></div>
            </div>
            <div class="col-md-6 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-money"></i> Tổng số lượng doanh thu</span>
                <div class="count"><?php echo e(number_format($orders->sum('total_price'), 0,0)); ?> VND</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
              <div class="col-md-4 col-sm-4  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Doanh thu</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="revenueBarChart"
                    data-labels='<?php echo json_encode($monthlyRevenue->pluck('month')->toArray(), 15, 512) ?>'
                    data-values='<?php echo json_encode($monthlyRevenue->pluck('revenue')->toArray(), 15, 512) ?>'
                    ></canvas>
                  </div>
                </div>
              </div>

        <div class="col-md-4 col-sm-4 ">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>Danh mục</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Top 5</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 ">
                                    <p class="">Danh mục</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 ">
                                    <p class="">Sản phẩm</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas class="canvasDoughnutCategory" height="140" width="140"
                                    data-labels='<?php echo json_encode($categories->pluck(' name'), 15, 512) ?>'
                                    data-counts='<?php echo json_encode($categories->map(fn($category) => $category->products->count()), 15, 512) ?>'
                                    style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square"
                                                    style="color: <?php echo e(['#BDC3C7', '#9B59B6', '#E74C3C', '#26B99A', '#3498DB'][$index % 5]); ?>"></i><?php echo e($category->name); ?> </p>
                                        </td>
                                        <td><?php echo e($category->products->count()); ?></td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sản phẩm bán chạy nhất <small>Danh sách</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng đã bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $topSellingProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($item->id); ?></th>
                                <td>
                                    <img src="<?php echo e(asset('storage/' . $item->image_url)); ?>" alt="">
                                </td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e(number_format($item->price, 0, ',', '.')); ?> vnd</td>
                                <td><?php echo e($item->total_sold); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Người dùng mới <small>Danh sách</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i = 0; $i < min(3, $users->count()); $i++): ?>
                            <tr>
                                <td scope="row"><?php echo e($users[$i]->id); ?></td>
                                <td><?php echo e($users[$i]->name); ?></td>
                                <td><?php echo e($users[$i]->phone_number); ?></td>
                                <td>
                                    <?php if($users[$i]->status == 'banned'): ?>
                                        <span class="custom-badge badge badge-warning">Bị chặn</span>
                                    <?php elseif($users[$i]->status == 'deleted'): ?>
                                        <span class="custom-badge badge badge-danger">Đã xóa</span>
                                    <?php elseif($users[$i]->status == 'pending'): ?>
                                        <span class="custom-badge badge badge-primary">Đợi kích hoạt</span>
                                    <?php else: ?>
                                        <span class="custom-badge badge badge-success">Đã kích hoạt</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Đơn hàng mới <small>Danh sách</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt hàng</th>
                                <th>Xem chi tiết</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i = 0; $i < min(3, $orders->count()); $i++): ?>
                            <tr>
                                <td scope="row"><?php echo e($orders[$i]->id); ?></td>
                                <td><?php echo e($orders[$i]->shippingAddress->full_name); ?></td>
                                <td><?php echo e(number_format($orders[$i]->total_price, 0,0)); ?></td>
                                <td>
                                    <?php if($orders[$i]->status == 'pending'): ?>
                                        <span class="custom-badge badge badge-warning">Đợi xác nhận</span>
                                    <?php elseif($orders[$i]->status == 'canceled'): ?>
                                        <span class="custom-badge badge badge-danger">Đã hủy</span>
                                    <?php elseif($orders[$i]->status == 'processing'): ?>
                                        <span class="custom-badge badge badge-primary">Đang giao</span>
                                    <?php else: ?>
                                        <span class="custom-badge badge badge-success">Hoàn thành</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($orders[$i]->created_at->format('d-m-Y H:i:s')); ?></td>
                                <td>
                                <a href="<?php echo e(route('admin.order-detail', ['id' => $orders[$i]->id])); ?>" class="btn btn-primary" target="_blank">
                                    Xem chi tiết
                                </a>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
</div>
<!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\QuanlyShopphp\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>
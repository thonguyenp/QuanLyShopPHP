

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block; width:100%;">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng số người dùng</span>
                <div class="count">2500</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-bar-chart"></i> Tổng số lượng sản phẩm</span>
                <div class="count">123.50</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-shopping-cart"></i> Tổng số lượng đơn hàng</span>
                <div class="count green">2,500</div>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-money"></i> Tổng số lượng doanh thu</span>
                <div class="count">4,567</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
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
                                <canvas class="canvasDoughnut" height="140" width="140"
                                    style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Android </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Others </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>
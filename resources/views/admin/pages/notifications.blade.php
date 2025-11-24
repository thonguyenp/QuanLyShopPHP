@extends('layouts.admin')

@section('title', 'Quản lý thông báo')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Thông báo</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Xử lý thông báo hoặc đơn hàng của khách hàng gửi tới</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">

                                <div id="graph_bar" style="width:100%;"></div>

                                <div role="tabpanel" class="" data-example-id="togglable-tabs">
                                    <div class="tab-content">

                                        {{-- TAB 1 --}}
                                        <div role="tabpanel" class="tab-pane active">
                                            <ul class="messages">
                                                @foreach ($notifications as $notification)
                                                <li>
                                                    <div class="message_date">
                                                        <p class="month">{{$notification->created_at->format('h:i A d-m-Y')}}</p>
                                                    </div>
                                                    <div class="message_wrapper">
                                                        <span><i class="fa fa-bell" style="font-size: 20px"></i></span>
                                                        <a href={{url('admin'.$notification->link) }}>{{$notification->title}}</h4></a>
                                                        <blockquote class="message">{{$notification->message}}
                                                        </blockquote>
                                                        <br />
                                                    </div>
                                                </li>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /page content -->
@endsection
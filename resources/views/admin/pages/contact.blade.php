@extends('layouts.admin')

@section('title', 'Quản lý liên hệ')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>Liên hệ</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Xử lý tin nhắn của khách hàng gửi tới</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-3 mail_list_column" style="overflow-y: scroll; max-height:500px; ">
                                <label class="badge bg-orange"
                                    style="width:100%; line-height:2; font-size:10px; ">Liên hệ khách hàng</label>
                                @foreach ($contacts as $contact)
                                <a href="javascript:void(0)" class="contact-item"
                                data-name="{{ $contact->fullname }}" 
                                data-email="{{ $contact->email }}" 
                                data-message="{{ $contact->message }}" 
                                data-id="{{ $contact->id }}"
                                data-is_replied="{{ $contact->is_replied }}">
                                    <div class="mail_list">
                                        <div class="left">
                                            <i class="fa fa-circle-o" style="color: {{ $contact->is_replied ? 'green' : 'red' }}"></i>
                                        </div>
                                        <div class="right">
                                            <h3>{{ $contact->fullname }} <small>{{$contact->created_at->format('h:i A d/m/Y')}}</small></h3>
                                            <p>{{Str::limit($contact->message, 50)}}</p>
                                        </div>
                                    </div>
                                </a>


                                @endforeach
                            </div>
                            <!-- /MAIL LIST -->

                            <!-- CONTENT MAIL -->
                            <div class="col-sm-9 mail_view" style="display:none;">
                                <div class="inbox-body">
                                    <div class="sender-info" style="1px solid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Jon Doe</strong>
                                                <span>(jon.doe@gmail.com)</span> to
                                                <b>me</b>
                                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-mail">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                    <div class="btn-group">
                                        <button id="compose" class="btn btn-sm btn-primary" type="button"><i
                                                class="fa fa-reply"></i>
                                            Trả lời</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /CONTENT MAIL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- compose -->
<div class="compose col-md-6  ">
    <div class="compose-header">
        Phản hổi liên hệ
        <button type="button" class="close compose-close">
            <span>×</span>
        </button>
    </div>

    <div class="compose-body">
        <div id="editor-contact" class="editor-wrapper">
        </div>
    </div>

    <div class="compose-footer">
        <button class="send-reply-contact btn btn-sm btn-success" type="button">Send</button>
    </div>
</div>
<!-- /compose -->
<!-- /page content -->

@endsection
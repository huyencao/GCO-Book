@extends('backend.index')
@section('controller','Cấu hình chung')
@section('action','Cập nhật')
@section('content')

    @include('backend.block.error')


<?php //dd($site_info) ?>

    <form action="" method='POST' enctype="multipart/form-data" name="frmEditProduct">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="activity">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Logo</label><br>

                                <img src="{!! image_url($site_info->site_logo) !!}" id="show-img" class="showImg">

                                <div class="file-loading">
                                    <input id="inpImg" name="fLogo" type="file" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Favicon</label><br>

                                <img src="{!! image_url($site_info->site_favicon) !!}" id="show-img" class="showImg">

                                <div class="file-loading">
                                    <input id="inpImg3" name="fFavicon" type="file" value="">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tên Website</label>
                                <input type="text" class="form-control" name="site_title" id="site_title"
                                       value="{!! old('site_title', isset($site_info->site_title) ? $site_info->site_title : null) !!}" required>
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <textarea  class="form-control"
                                           name="site_description"
                                           id="site_description"
                                           rows="6"
                                >{!! old('site_description', isset($site_info->site_description) ? $site_info->site_description : null) !!}</textarea>

                            </div>

                            <div class="form-group">
                                <label>Meta keyword</label>
                                <input type="text" class="form-control" name="site_keyword" id="site_keyword"
                                       value="{!! old('site_keyword', isset($site_info->site_keyword) ? $site_info->site_keyword : null) !!}">
                            </div>

                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="site_address" id="site_address"
                                       value="{!! old('site_address', isset($site_info->site_address) ? $site_info->site_address : null) !!}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="site_email" id="site_email"
                                       value="{!! old('site_email', isset($site_info->site_email) ? $site_info->site_email : null) !!}">
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="tel" class="form-control" name="site_phone" id="site_phone"
                                       value="{!! old('site_phone', isset($site_info->site_phone) ? $site_info->site_phone : null) !!}">
                            </div>

                            <div class="form-group">
                                <label>Hotline</label>
                                <input type="tel" class="form-control" name="site_hotline" id="site_hotline"
                                       value="{!! old('site_hotline', isset($site_info->site_hotline) ? $site_info->site_hotline : null) !!}">
                            </div>







                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Google Analytics</label>

                                <textarea  class="form-control"
                                           name="site_google_analytics"
                                           id="site_google_analytics"
                                           rows="6"
                                >{!! old('site_google_analytics', isset($site_info->site_google_analytics) ? $site_info->site_google_analytics : null) !!}</textarea>

                            </div>

                            <div class="form-group">
                                <label>Google map</label>
                                <textarea  class="form-control"
                                           name="site_map_iframe"
                                           id="site_map_iframe"
                                           rows="6"
                                >{!! old('site_map_iframe', isset($site_info->site_map_iframe) ? $site_info->site_map_iframe : null) !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="site_robot" value="1" id="active" {!! isset($site_info->site_robot) && $site_info->site_robot ? 'checked' : null !!} >

                                    <span>  Cho phép google tìm thấy website</span>

                                </label>
                            </div>
                        </div>


                    </div> {{--./row--}}


                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>

        <button type="submit" class="btn btn-primary">OK</button>
    </form>

@endsection
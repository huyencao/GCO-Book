@extends('backend.index')
@section('controller','Tin tức')
@section('controller_route',route('backend.blog'))
@section('action','Cập nhật')
@section('content')

    @include('backend.block.error')

    <form action="" method='POST' enctype="multipart/form-data" name="frmEditProduct">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
                <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Cấu hình SEO</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="activity">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Hình ảnh</label><br>

                                <?php $image = isset($data->image) ? image_url($data->image->url) : image_url(''); ?>

                                <img src="{!! $image !!}" id="show-img" class="showImg">
                                <div class="file-loading">
                                    <input id="inpImg" name="fImage" type="file" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="{!! old('name', isset($data) ? $data['name'] : null) !!}" required>
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn tĩnh</label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                       value="{!! old('slug', isset($data) ? $data['slug'] : null) !!}" required>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label> <br>

                                <input type="checkbox" name="status" value="1" id="active" {!! $data['status'] === 1 ? 'checked' : null !!} >
                                <label for="active" class="lbl">Hiển thị</label>

                            </div>

                        </div>


                    </div> {{--./row--}}

                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea id="desc"
                                  name="content_short">{!! old('desc', isset($data) ? $data['content_short'] : null) !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea id="content"
                                  name="content_main">{!! old('content_main', isset($data) ? $data['content_main'] : null) !!}</textarea>
                    </div>


                </div>



                <div class="tab-pane" id="settings">
                    <div class="form-group">
                        <label>Title SEO</label>
                        <input type="text" class="form-control" name="meta_title"
                               value="{!! old('meta_title', isset($data) ? $data['meta_title'] : null) !!}">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_description"
                                  id="meta_description"
                                  class="form-control"
                                   rows="2">{!! old('meta_description', isset($data) ? $data['meta_description'] : null) !!}</textarea>

                    </div>

                    <div class="form-group">
                        <label>Meta Keyword</label>
                        <input type="text" class="form-control" name="meta_keyword"
                               value="{!! old('meta_keyword', isset($data) ? $data['meta_keyword'] : null) !!}">
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>

        <button type="submit" class="btn btn-primary">OK</button>
    </form>

@endsection
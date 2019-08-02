@extends('backend.index')
@section('controller','Giới thiệu')
@section('action','Cập nhật')
@section('content')

    @include('backend.block.error')


        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="{!! session('about_value') ? null : 'active'!!}"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
                <li class="{!! session('about_value') ? 'active' : null !!}"><a href="#value" data-toggle="tab" aria-expanded="true">Giá trị cốt lõi</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane {!! session('about_value') ? null : 'active'!!}" id="activity">
                    <form action="" method='POST' enctype="multipart/form-data" name="frmEditProduct">
                        <input type="hidden" name="_token" value="{!! csrf_token(); !!}">
                        <input type="hidden" name="id" value="{!! isset($about) ? $about->id : null !!}">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{!! old('name', isset($about) ? $about['name'] : null) !!}" required>
                                </div>

                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                           value="{!! old('meta_title', isset($about) ? $about['meta_title'] : null) !!}">
                                </div>

                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea
                                            class="form-control"
                                            name="meta_description"
                                    >{!! old('meta_description', isset($about) ? $about['meta_description'] : null) !!}</textarea>

                                </div>

                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                           value="{!! old('meta_keyword', isset($about) ? $about['meta_keyword'] : null) !!}">
                                </div>


                            </div>

                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Banner</label><br>
                                    <?php $image = image_url(isset($about->image) ? $about->image->url : ''); ?>
                                    <img src="{!! $image !!}" id="show-img" class="showImg showImg1">
                                    <div class="file-loading">
                                        <input id="inpImg" name="fImage" type="file" value="">
                                    </div>
                                </div>
                            </div>


                        </div> {{--./row--}}

                        <div class="form-group">
                            <label>Mô tả ngắn</label>
                            <textarea id="desc"
                                      name="content_short">{!! old('desc', isset($about) ? $about['content_short'] : null) !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Mô tả chi tiết</label>
                            <textarea id="content"
                                      name="content_main">{!! old('content_main', isset($about) ? $about['content_main'] : null) !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </form>
                </div>

                <div class="tab-pane {!! session('about_value') ? 'active' : null !!}" id="value">

                    <form action="{!! route('backend.about.postMultiDel') !!}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="btnAdd">
                            <a href="{!! route('backend.about.getAdd') !!}">
                                <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</fa>
                            </a>
                            <button type="submit" class="btn bg-olive"><i class="fa fa-trash-o"></i> Xóa</button>
                        </div>

                        <?php $i=0; ?>
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($value as $item)
                                <?php $i++; ?>
                                <tr>
                                    <td><input type="checkbox" name="chkItem[]" value="{!! $item['id'] !!}"></td>
                                    <td>{!! $i !!}</td>

                                    <td>
                                        <a class="text-default" href="{!! route('backend.about.getEdit',$item['id']) !!}" title="{!! $item['name'] !!}">  {!! $item['name'] !!} </a>
                                    </td>


                                    <td>
                                        <a class="text-default" href="{!! route('backend.about.getEdit',$item['id']) !!}" title="{!! $item->content_main !!}"> {!! str_limit($item->content_main,100) !!} </a>
                                    </td>

                                    <td>
                                        <a class="text-default" href="{!! route('backend.about.getEdit',$item['id']) !!}" title="{!! $item->content_main !!}"> {!! $item->status === 1 ? 'Hiển thị' : 'Ẩn' !!} </a>
                                    </td>

                                    <td>
                                        <div>
                                            <a href="{!! route('backend.about.getEdit',$item['id']) !!}" title="Sửa"> <i class="fa fa-pencil fa-fw"></i> Sửa</a> &nbsp; &nbsp; &nbsp;
                                            <a class="text-danger" href="{!! route('backend.about.getDelete',$item['id']) !!}" onclick="return confirm('Bạn có chắc chắn xóa không ?')" title="Xóa"> <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                                        </div>

                                    </td>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </form>


                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>




@endsection
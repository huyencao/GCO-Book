@extends('backend.index')
@section('controller','Quản trị viên')
@section('action','Danh sách')
@section('content')

    @if(Auth::user())
        @if(Auth::user()->id == 1)
        <div class="btnAdd">
          <a href="{!! route('backend.user.getAdd') !!}">
              <fa class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</fa>
          </a>
        </div>
        @endif
    @endif

    <?php $i=0; ?>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
          <th>STT</th>
          <th>Tài khoản</th>
          <th>Email</th>
          <th>Hình ảnh</th>
          <th>Sửa</th>

          @if(Auth::user())
              @if(Auth::user()->id == 1)
              <th>Xóa</th>
              @endif
          @endif
      </tr>
      </thead>
      <tbody>
      @if(isset($user))
      @foreach($user as $item)
      <?php $i++; ?>
          <tr>
            <td>{!! $i !!}</td>
            <td>{!! $item['name'] !!}</td>
            <td>{!! $item['email'] !!}</td>
            <td>
                <img src="{!! asset($item['image']) !!}" class="img-responsive imglist" />
            </td>
           
            <td>
                <i class="fa fa-pencil fa-fw"></i>
                <a href="{!! route('backend.user.getEdit',$item['id']) !!}">Sửa</a>
            </td>

            @if(Auth::user())
                @if(Auth::user()->id == 1)
                <td>
                    <i class="fa fa-trash-o fa-fw"></i>
                    <a href="{!! route('backend.user.getDelete',$item['id']) !!}" onclick="return confirm('Bạn có chắc chắn xóa không ?')">Xóa</a>
                </td>
                @endif
            @endif

          </tr>
      @endforeach
      @endif
      </tbody>
    </table>

@endsection
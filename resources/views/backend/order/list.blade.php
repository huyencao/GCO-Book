@extends('backend.index')
@section('controller','Đơn hàng')
@section('controller_route',route('backend.order'))
@section('action','Danh sách')
@section('content')

    <form action="{!! route('backend.order.postMultiDel') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        <div class="btnAdd">
          <button type="submit" class="btn bg-olive"><i class="fa fa-trash-o"></i> Xóa</button>
        </div>

        <?php $i=0; ?>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                <th><input type="checkbox" name="chkAll" id="chkAll"></th>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
                <th>Xóa</th>
              </tr>
          </thead>
          <tbody>
          @foreach($data as $item)
          <?php $i++; ?>
              <tr>
                <td><input type="checkbox" name="chkItem[]" value="{!! $item['id'] !!}"></td>
                <td>{!! $i !!}</td>
                <td>
                    <a href="{!! route('backend.order.getEdit',$item['id']) !!}" title="{!! __ID_ORDER_PREFIX.$item['id'] !!}">{!! __ID_ORDER_PREFIX.$item['id'] !!}</a>

                </td>
                <td>
                    <a href="{!! route('backend.order.getEdit',$item['id']) !!}" title="{!! isset($item->customer) ? $item->customer->name : null !!}">{!! isset($item->customer) ? $item->customer->name : null !!}</a>

                </td>
                  <td> <a href="{!! route('backend.order.getEdit',$item['id']) !!}" title="Xem"> {!! number_format($item['price_total'],0,',','.') !!} VND</a>

                </td>
                <td>
                    <a href="{!! route('backend.order.getEdit',$item['id']) !!}" title=" {!! date_format(date_create($item['created_at']),"d.m.Y - H:i:s") !!}">
                        {!! date_format(date_create($item['created_at']),"d.m.Y - H:i:s") !!}
                    </a>

                </td>
                <td>
                    @if($item['status'] == 1)
                        <span class="badge label-warning"> Mới đặt</span>
                    @elseif($item['status'] == 2)
                        <span class="badge label-primary"> Xác nhận</span>
                    @elseif($item['status'] == 3)
                        <span class="badge label-info"> Đang giao hàng</span>
                    @elseif($item['status'] == 4)
                        <span class="badge label-success"> Hoàn thành</span>
                    @elseif($item['status'] == 5)
                        <span class="badge label-danger">Hủy</span>

                    @endif
                </td>
               
                <td>
                    <i class="fa fa-eye"></i>
                    <a href="{!! URL::route('backend.order.getEdit',$item['id']) !!}">Xem</a>
                </td>
                <td>
                    <i class="fa fa-trash-o fa-fw"></i>
                    <a href="{!! URL::route('backend.order.getDelete',$item['id']) !!}" onclick="return confirm('Bạn có chắc chắn xóa không ?')">Xóa</a>
                </td>
              </tr>
          @endforeach
          </tbody>
        </table>
    </form>

@endsection
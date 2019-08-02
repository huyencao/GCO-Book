@extends('backend.index')
@section('controller','Đơn hàng')
@section('controller_route',route('backend.order'))
@section('action','Chi tiết')
@section('content')

    @include('backend.block.error')
    <div class="row">
    
      <div class="col-md-2"></div>

      <div class="col-md-8">
          <form action="" method="POST">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">

              <div class="row">
                <div class="col-md-3"><label>Mã đơn hàng</label></div>
                <div class="col-md-5">{!! __ID_ORDER_PREFIX.$data['id'] !!}</div>
              </div>

              <div class="row">
                <div class="col-md-3"><label>Khách hàng</label></div>
                <div class="col-md-5">{!! isset($customer) ? $customer['name'] : null !!}</div>
              </div>

              <div class="row">
                <div class="col-md-3"><label>Email</label></div>
                <div class="col-md-5">{!! isset($customer) ? $customer['email'] : null !!}</div>
              </div>

              <div class="row">
                <div class="col-md-3"><label>Số điện thoại</label></div>
                <div class="col-md-5">{!! isset($customer) ? $customer['phone'] : null  !!}</div>
              </div>

              <div class="row">
                <div class="col-md-3"><label>Địa chỉ</label></div>
                <div class="col-md-5">{!! $data['address']  !!}</div>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-3"><label>Tổng tiền</label></div>
                <div class="col-md-5">{!! number_format($data['price_total'],0,',','.' ) !!} VND</div>
              </div>


              <div class="row">
                <div class="col-md-3"><label>Ghi chú</label></div>
                <div class="col-md-5">{!! $data['content'] !!}</div>
              </div>

              <div class="row">
                <div class="col-md-3"><label>Ngày đặt</label></div>
                <div class="col-md-5">
                    {!! Carbon\Carbon::parse($data['created_at'])->format('d-m-Y H:i:s') !!}
                </div>
              </div>

              <hr>

              <div class="row">
                  <div class="col-md-3"><label>Hình thức thanh toán</label></div>
                  <div class="col-md-9">
                      @if($data['payment_method'] === 1) Thanh toán khi nhận hàng @endif
                      @if($data['payment_method'] === 2)
                          <?php
                              $bank = $data->bank;

                              ?>
                              Chuyển khoản vào tài khoản <br>
                          <table>
                              <tr>
                                  <td>Tên ngân hàng:&nbsp;&nbsp;</td>
                                  <th>{!! $bank->name !!}</th>
                              </tr>
                              <tr>
                                  <td>Tên chủ khoản:&nbsp;&nbsp;</td>
                                  <th>{!! $bank->account_name !!}</th>
                              </tr>

                              <tr>
                                  <td>Số tài khoản:&nbsp;&nbsp;</td>
                                  <th>{!! $bank->account_number !!}</th>
                              </tr>
                              <tr>
                                  <td>Chi nhánh:&nbsp;&nbsp;</td>
                                  <th>{!! $bank->account_branch !!}</th>
                              </tr>
                          </table>



                      @endif
                  </div>
              </div>


              <br>


              <div class="row">
                <div class="col-md-3"><label>Trạng thái</label></div>
                <div class="col-md-5">
                    <select class="form-control" name="status">
                        <option value="1" @if($data['status'] == 1) selected @endif>Mới đặt</option>
                        <option value="2" @if($data['status'] == 2) selected @endif>Xác nhận</option>
                        <option value="3" @if($data['status'] == 3) selected @endif>Đang giao hàng</option>
                        <option value="4" @if($data['status'] == 4) selected @endif>Hoàn thành</option>
                        <option value="5" @if($data['status'] == 5) selected @endif>Hủy</option>
                    </select>

                    <br><button type="submit" class="btn btn-primary">Cập nhật</button><br><br>
                </div>
              </div>

              <hr>




              <h3 class='text-center'>CHI TIẾT ĐƠN HÀNG</h3>
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i=0; ?>
                  @foreach($order_detail as $item)
                    <?php $i++; ?>
                    <tr>
                        <td>{!! $i !!}</td>
                        <td>
                          <?php
                              $product = $item->product;
                              if(isset($product)){
                                  echo $product->name;
                                  // echo "<br>Mã sản phẩm: <b><i>".$product->code.'</b></i>';
                              }
                          ?>
                          {{-- <br>Màu : {!! $item['color'] !!}
                          <br>Size : {!! $item['size'] !!} --}}
                        </td>

                        <td>
                          {{--<img src="{!! isset($product->image_thumbnail) ? image_url($product->image_thumbnail->url) : image_url('') !!}" class="img-responsive imglist" />--}}
                        </td>

                        <td>{!! $item['product_quantity'] !!}</td>
                        <td>{!! number_format($product->price_promotion,0,',','.') !!}</td>
                        <td>
                          {!! number_format( $item['price_total'],0,',','.') !!} đ
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

          </form>

      </div>

    </div>
@endsection
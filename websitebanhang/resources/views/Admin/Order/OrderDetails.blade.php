@extends('Admin.MasterLayout')
@section('AdminContent')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
            <a href="{{ route('AdminShowOrders') }}" class="btn btn-primary" style="color: white;">Trở Về</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Khách Hàng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Mã Khách Hàng</th>
                      <th>Tên</th>
                      <th>Số Điện Thoại</th>
                      <th>Email</th>
                      <th>Địa Chỉ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <th scope="row">{{ $data['Order']->id }}</th>
                      <td>{{ $data['Order']->name_user }}</td>
                      <td>{{ $data['Order']->phone }}</td>
                      <td>{{ $data['Order']->email }}</td>
                      <td>{{ $data['Order']->address }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông Tin Đơn Hàng</h3>
              </div>
              <!-- /.card-header -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Mã Sản Phẩm</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Đơn Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['OrderDetails'] as $key=>$values)
                        <tr>
                        <th scope="row">{{ $values->id_product }}</th>
                        <td>{{ $values->name_product }}</td>
                        <td>{{ $values->quantity }}</td>
                        <td>{{ number_format ($values->unit_price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-12" style="padding: 10px;">
            <h3>Tổng Tiền: {{ number_format ($data['Order']->total_money , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VNĐ</h3>
            @if($data['Order']->order_status == 0)
            <a href="{{ route('AdminOrderProcessing',['id'=>$data['Order']->id]) }}" style="color: white;" class="btn btn-primary">Xử Lý Đơn Hàng</a>
            <a href="{{ route('AdminCancelOrder',['id'=>$data['Order']->id]) }}" style="color: white;" class="btn btn-danger">Từ Chối Đơn Hàng</a>
            @else
            <h3 style="color: green;">Đơn Hàng Đã Được Xử Lý</h3>
            @endif
        </div>
    </div>
</section>
@endsection
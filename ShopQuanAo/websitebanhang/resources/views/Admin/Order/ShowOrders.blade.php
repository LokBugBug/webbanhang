@extends('Admin.MasterLayout')
@section('AdminContent')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
            <h4 style="color: green;">{{ Session('messger') ? Session::get('messger') : ''   }} </h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Mã Đơn Hàng</th>
                  <th>Tên Khách Hàng</th>
                  <th>Số Điện Thoại</th>
                  <th>Ngày Đặt Hàng</th>
                  <th>Tổng Tiền</th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
              @foreach($data["Orders"] as $key => $values)
                <tr>
                  <td>{{ $values->id }}</td>
                  <td>{{ $values->name_user }}</td>
                  <td>{{ $values->phone }}</td>
                  <td>{{ $values->create_date }}</td>
                  <td>{{ number_format ($values->total_money , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}</td>
                  @if($values->order_status == 0)
                  <td><span class="badge badge-danger">Chờ Xử Lí</span></td>
                  @elseif($values->order_status == 1)
                  <td><span class="badge badge-success">Đã Xử Lý</span></td>
                  @elseif($values->order_status == 2)
                  <td><span class="badge badge-info">Đã Nhận Hàng</span></td>
                  @else
                  <td><span class="badge badge-warning">Từ Chối</span></td>
                  @endif
                  <td>
                      <a href="{{ route('AdminOrderDetails',['id'=>$values->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Chi Tiết</a>
                      <a href="{{ route('AdminDeleteOrder',['id'=>$values->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                  </td>
                </tr>
              @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </div>
</section>
@endsection
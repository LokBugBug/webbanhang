@extends('Admin.MasterLayout')
@section('AdminContent')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
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
                  <th>Mã Khách Hàng</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Số Điện Thoại</th>
                  <th>Ngày Tạo Tài Khoản</th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
              @foreach($data["Users"] as $key => $values)
                <tr>
                  <td>{{ $values->id }}</td>
                  <td>{{ $values->full_name }}</td>
                  <td>{{ $values->email }}</td>
                  <td>{{ $values->phone }}</td>
                  <td>{{ $values->create_date }}</td>
                  @if($values->banned == 0)
                  <td><span class="badge badge-success">Hoạt Động</span></td>
                  @else
                  <td><span class="badge badge-danger">Banned</span></td>
                  @endif
                  <td><a style="width: 100px;" href="{{ route('AdminEditUsers',['id'=>$values->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Chi Tiết</a></td>
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
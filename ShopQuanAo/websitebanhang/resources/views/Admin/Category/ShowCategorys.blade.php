@extends('Admin.MasterLayout')
@section('AdminContent')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
            <a href="{{ route('AdminAddCategory') }}" style="margin-top: 10px; color:white;" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm Mới</a>
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
                  <th>Mã Danh Mục</th>
                  <th>Tên Danh Mục</th>
                  <th>Ngày Tạo</th>
                  <th>Trạng Thái</th>
                  <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
              @foreach($data["Categorys"] as $key => $values)
                <tr>
                  <td>{{ $values->id }}</td>
                  <td>{{ $values->category_name }}</td>
                  <td>{{ $values->create_date }}</td>
                  @if($values->display_status == "0")
                  <td><span class="badge badge-danger">Ẩn</span></td>
                  @else
                  <td><span class="badge badge-success">Hiển Thị</span></td>
                  @endif
                  <td>
                      <a href="{{ route('AdminEditCategory',['id'=>$values->id]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Sửa</a>
                      <a href="{{ route('AdminDeleteCategory',['id'=>$values->id,'category'=>$values->category_name]) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
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
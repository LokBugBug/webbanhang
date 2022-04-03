@extends('Admin.MasterLayout')
@section('AdminContent')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
            <a href="{{ route('AdminAddProduct') }}" style="margin-top: 10px; color:white;" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm Mới</a>
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
                  <th>Mã Sản Phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Hình Ảnh</th>
                  <th>Giá Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Ngày Tạo</th>
                  <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
              @foreach($data["Products"] as $key => $values)
                <tr>
                  <td>{{ $values->id_product }}</td>
                  <td>{{ $values->name_product }}</td>
                  <td><img style="max-width: 100px; max-height: 120px; object-fit: cover;min-width: 100px; min-height: 120px;" src="public/images/products/{{ $values->img_product }}" alt=""></td>
                  <td>{{ number_format ($values->price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}</td>
                  <td>{{ $values->quantity }}</td>
                  <td>{{ $values->create_date }}</td>
                  <td>
                      <a href="{{ route('AdminEditProduct',['id'=>$values->id_product]) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Sửa</a>
                      <a href="{{ route('AdminDeleteProduct',['id'=>$values->id_product,'product'=>$values->name_product]) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Xóa</a>
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
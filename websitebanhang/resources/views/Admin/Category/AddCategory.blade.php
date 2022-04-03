@extends("Admin.MasterLayout")
@section("AdminContent")
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$data['title']}}</h1>
            <h3 style="color: green;">{{$data['notifi']}}</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$data['title']}}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form  method="POST">
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tên Danh Mục</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="category_name" placeholder="Tên danh mục không được trùng nhau">
                                </div>
                            </div>
                        </div>
                        <button type="submit" value="1" name="btnSaveUser" class="btn btn-primary btn-block waves-effect">
                            <span>Thêm Mới</span>
                        </button>
                        <a type="button" href="{{ route('AdminShowCategorys') }}" class="btn btn-danger btn-block waves-effect">
                            <span>TRỞ LẠI</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
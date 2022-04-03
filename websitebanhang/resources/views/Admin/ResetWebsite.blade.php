@extends("Admin.MasterLayout")
@section("AdminContent")
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
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form  method="POST">
                    {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập Mật Khẩu</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" placeholder="Mật Khẩu">
                                </div>
                            </div>
                        </div>
                        <button type="submit" value="1" name="btnReset" class="btn btn-primary btn-block waves-effect">
                            <span>Reset</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <h3 class="card-title">Reset Website toàn bộ dữ liệu sẽ được xóa không thể khôi phục. Sau khi reset tài khoản admin là:</h3>
        <h3 style="display: block; width: 100%;" class="card-title">Tài khoản: admin</h3>
        <h3 style="display: block; width: 100%;" class="card-title">Mật khẩu : admin</h3>
        </div>
    </div>
</section>
@endsection
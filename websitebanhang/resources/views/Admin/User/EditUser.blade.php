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
                    <h3 class="card-title">CHỈNH SỬA THÀNH VIÊN</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form  method="POST">
                    {{ csrf_field() }}
                        <!-- <input type="text" name="info[id]" value="{{ $data['User'][0]->id }}" hidden> -->
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="inputEmail3" value="{{ $data['User'][0]->user_name }}" disabled="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="info[pass_word]" value="{{ $data['User'][0]->pass_word }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Họ Tên</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="info[full_name]" value="{{ $data['User'][0]->full_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="info[email]" value="{{ $data['User'][0]->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Số Điện Thoại</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="info[phone]" value="{{ $data['User'][0]->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Địa Chỉ</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="info[address]" value="{{ $data['User'][0]->address }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="info[level_user]" value="{{ $data['User'][0]->level_user }}" placeholder="Nếu muốn là admin thì điền vào chữ: admin">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="inputEmail3" value="admin6" name="username" required="">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="info[banned]">
                                    <option value="{{ $data['User'][0]->banned }}">
                                        {{ $data['User'][0]->banned ? 'Banned' : 'Hoạt Động'   }}                             
                                    </option>
                                    <option value="0">Hoạt động</option>
                                    <option value="1">Banned</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Lý do banned</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <textarea class="form-control" name="info[reason_banned]">{{ $data['User'][0]->reason_banned }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày đăng ký</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" id="inputEmail3" value="{{ $data['User'][0]->create_date }}" disabled="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" value="1" name="btnSaveUser" class="btn btn-primary btn-block waves-effect">
                            <span>LƯU</span>
                        </button>
                        <a type="button" href="{{ route('AdminShowUsers') }}" class="btn btn-danger btn-block waves-effect">
                            <span>TRỞ LẠI</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
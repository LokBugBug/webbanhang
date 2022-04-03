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
                            <label for="inputEmail3" class="col-sm-2 col-lg-2 col-form-label">Tên Sản Phẩm</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="product[name_product]" placeholder="Áo Thun Nam" value="{{ $data['Product']->name_product }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-lg-2 col-form-label">Danh Mục Sản Phẩm</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <select class="form-control" name="product[id_category]">
                                        <option value="{{ $data['Product']->id_category }}">{{ $data['Product']->category_name }}</option>
                                      @foreach($data['Categorys'] as $key=>$values)
                                        <option value="{{$values->id}}">{{$values->category_name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Hình Ảnh</label>
                            <div class="col-sm-4">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="product[img_product]">
                                    <img style="max-width: 120px; max-height: 120px; object-fit: cover;" src="public/admin/images/products/{{ $data['Product']->img_product }}" alt="">
                                </div>
                            </div>
                            <label for="inputEmail3" class="col-sm-2  col-form-label text-right">Số Lượng</label>
                            <div class="col-sm-4">
                                <div class="form-line">
                                    <input type="number" min="1" class="form-control" name="product[quantity]" placeholder="999999" value="{{ $data['Product']->quantity }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Giá</label>
                            <div class="col-sm-4">
                                <div class="form-line">
                                    <input type="number" min="0" class="form-control" name="product[price]" placeholder="999999" value="{{ $data['Product']->price }}" required>
                                </div>
                            </div>
                            <label for="inputEmail3" class="col-sm-2  col-form-label text-right">Giảm Giá</label>
                            <div class="col-sm-4">
                                <div class="form-line">
                                    <input type="number" min="1" class="form-control" name="product[sale]" placeholder="%" value="{{ $data['Product']->sale }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-lg-2 col-form-label">Nhà Sản Xuất</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="product[company]" placeholder="Công Ty TNHH " value="{{ $data['Product']->company }}"required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-lg-2 col-form-label">Mô Tả Sản Phẩm</label>
                            <div class="col-sm-10">
                                <div class="form-line">
                                    <textarea style="height: 200px;" type="text" class="form-control" name="product[descrip]"required>{{ $data['Product']->descrip }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" value="1" name="btnUpdateProduct" class="btn btn-primary btn-block waves-effect">
                            <span>Cập Nhật</span>
                        </button>
                        <a type="button" href="{{ route('AdminShowProducts') }}" class="btn btn-danger btn-block waves-effect">
                            <span>TRỞ LẠI</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
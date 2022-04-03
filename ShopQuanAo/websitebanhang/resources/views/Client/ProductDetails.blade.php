@extends('Client.Masterlayout')
@section('ClientContent')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img style="max-height: 400px; object-fit: cover; width: 100%;" src="public/client/img/slider/1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- product category -->
<section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container">
                            <a data-lens-image="public/images/products/{{ $data['Product']->img_product }}" class="simpleLens-lens-image">
                            <img class="size-product-img" src="public/images/products/{{ $data['Product']->img_product }}" class="simpleLens-big-image"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{ $data['Product']->name_product }}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><span style="font-weight: bold;">Giá:</span> {{number_format ($data['Product']->price - $data['Product']->price * ($data['Product']->sale / 100), $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND</span>
                      <span style="display: block;" class="aa-product-avilability"><span style="font-weight: bold;">Số lượng bán:</span> {{ $data['QuantityBuy'] }}</span>
                      <span style="display: block;" class="aa-product-avilability"><span style="font-weight: bold;">Nhà sản xuất:</span> {{ $data['Product']->company }}</span>
                    </div>
                    <span style="display: block;" class="aa-product-avilability"><span style="font-weight: bold;">Mô tả sản phẩm:</span></span>
                    <p>{{$data['Product']->descrip}}</p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="{{ route('AddCart',['id' => $data['Product']->id_product]) }}">Add To Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
@endsection
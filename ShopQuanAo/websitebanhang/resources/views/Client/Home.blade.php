@extends('Client.Masterlayout')
@section('ClientContent')
<!-- Start slider -->
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/client/img/slider/1.jpg" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Men Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="{{ route('Products',['id'=>0]) }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/client/img/slider/2.jpg" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40% Off</span>                
                <h2 data-seq>Wristwatch Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="{{ route('Products',['id'=>0]) }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="public/client/img/slider/3.jpg" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Jeans Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="{{ route('Products',['id'=>0]) }}" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>          
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <h2 style="text-align: center;">Giảm Giá Cực Sốc</h2>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                        <!-- start single product item -->
                        @foreach($data['Products'] as $key=>$values)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ route('ProductDetails',['id' => $values->id_product]) }}"><img class="size-product-img" src="public/images/products/{{ $values->img_product }}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="{{ route('AddCart',['id' => $values->id_product]) }}"><span class="fa fa-shopping-cart"></span>Thêm Vào Giỏ Hàng</a>
                              <figcaption>
                              <h4 class="aa-product-title"><a href="{{ route('ProductDetails',['id' => $values->id_product]) }}">{{ $values->name_product }}</a></h4>
                              <span class="aa-product-price">{{number_format ($values->price - $values->price * ($values->sale / 100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</span>
                              <span class="aa-product-price"><del>{{number_format ($values->price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )}}đ</del></span>
                            </figcaption>
                          </figure>                        
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="{{ route('ProductDetails',['id' => $values->id_product]) }}" ><span class="fa fa-search"></span></a>                          
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">-{{$values->sale}}%</span>
                        </li>    
                        @endforeach                 
                      </ul>
                      <a class="aa-browse-btn" href="{{ route('Products',['id'=>0]) }}">Xem Tất Cả Sản Phẩm <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->
                  </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Mới Nhất</a></li>
                <li><a href="#featured" data-toggle="tab">Phổ Biến Nhất</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    @foreach($data['ProductNew'] as $key=>$values)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ route('ProductDetails',['id' => $values->id_product]) }}"><img class="size-product-img" src="public/images/products/{{ $values->img_product }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="{{ route('AddCart',['id' => $values->id_product]) }}"><span class="fa fa-shopping-cart"></span>Thêm Vào Giỏ Hàng</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="{{ route('ProductDetails',['id' => $values->id_product]) }}">{{$values->name_product}}</a></h4>
                          <span class="aa-product-price">{{number_format ($values->price - $values->price * ($values->sale / 100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</span>
                          <span class="aa-product-price"><del>{{number_format ($values->price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="{{ route('ProductDetails',['id' => $values->id_product]) }}" ><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sold-out" href="#">Mới nhất</span>
                    </li>   
                    @endforeach                                                                       
                  </ul>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    @foreach($data['ProductHot'] as $key=>$values)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ route('ProductDetails',['id' => $values->id_product]) }}"><img class="size-product-img" src="public/images/products/{{ $values->img_product }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="{{ route('AddCart',['id' => $values->id_product]) }}"><span class="fa fa-shopping-cart"></span>Thêm Vào Giỏ Hàng</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="{{ route('ProductDetails',['id' => $values->id_product]) }}">{{$values->name_product}}</a></h4>
                          <span class="aa-product-price">{{number_format ($values->price - $values->price * ($values->sale / 100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</span>
                          <span class="aa-product-price"><del>{{number_format ($values->price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="{{ route('ProductDetails',['id' => $values->id_product]) }}"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT</span>
                    </li>    
                    @endforeach                                                                          
                  </ul>
                </div>
                <!-- / featured product category -->          
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <!-- / Testimonial -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <li><a href="#"><img src="public/client/img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-wordpress.png" alt="wordPress img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-joomla.png" alt="joomla img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-java.png" alt="java img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-jquery.png" alt="jquery img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-html5.png" alt="html5 img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-css3.png" alt="css3 img"></a></li>
              <li><a href="#"><img src="public/client/img/client-brand-wordpress.png" alt="wordPress img"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->
  @endsection
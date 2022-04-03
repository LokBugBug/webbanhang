@extends('Client.Masterlayout')
@section('ClientContent')
<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
            <div class="aa-product-catg-content">
            <div class="aa-product-catg-head" style="display: flex;">
                <div class="aa-product-catg-head-left" style="flex-grow: 1;">
                <h3 class="text-center" style="font-weight: 700; color: #ff6666;">Kết quả tìm kiếm: {{ $data['content'] }}</h3 >
                </div>
                <div class="aa-product-catg-head-right" style="display: flex; align-items: center;">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                </div>
            </div>
            <div class="aa-product-catg-body">
                <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach($data['Products'] as $key=>$values)
                <li>
                    <figure>
                    <a class="aa-product-img" href="{{ route('ProductDetails',['id' => $values->id_product]) }}"><img class="size-product-img" src="public/images/products/{{ $values->img_product }}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="{{ route('AddCart',['id' => $values->id_product]) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="{{ route('ProductDetails',['id' => $values->id_product]) }}">{{ $values->name_product }}</a></h4>
                            <span class="aa-product-price">{{number_format ($values->price - $values->price * ($values->sale / 100) , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</span>
                            <span class="aa-product-price"><del>{{number_format ($values->price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</del>
                        </span>
                        <p class="aa-product-descrip">{{ $values->descrip }}</p>
                    </figcaption>
                    </figure>                         
                    <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="{{ route('ProductDetails',['id' => $values->id_product]) }}" ><span class="fa fa-search"></span></a>                            
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>                              
                @endforeach
                </ul>

            </div>
            <div class="aa-product-catg-pagination">
                <nav>
                {!! $data['Products']->Links() !!}
                </nav>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
            <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Category</h3>
                <ul class="aa-catg-nav">
                    <li><a href="{{ route('Products',['id'=>0]) }}">Tất Cả Sản Phẩm</a></li>
                    @foreach($data['Category'] as $key=>$values)
                        <li><a href="{{ route('Products',['id'=>$values->id]) }}">{{ $values->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- single sidebar -->
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                <h3>Sản Phẩm Bán Chạy</h3>
                <div class="aa-recently-views">
                <ul>
                    @foreach($data['ProductHot'] as $key=>$values)
                        <li>
                            <a href="#" class="aa-cartbox-img"><img style="max-width: 150px; max-height: 150px; object-fit: cover;" alt="img" src="public/images/products/{{ $values->img_product }}"></a>
                            <div class="aa-cartbox-info">
                            <h4><a href="{{ route('ProductDetails',['id' => $values->id_product]) }}">{{ $values->name_product }}</a></h4>
                            <p><del>{{number_format ($values->price , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ </del></p>
                            <p>{{number_format ($values->price - $values->price * ($values->sale / 100), $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }}đ</p>
                            </div>                    
                        </li>   
                    @endforeach                                
                </ul>
                </div>                            
            </div>
            </aside>
        </div>
        
        </div>
    </div>
</section>
@endsection
<!-- / product category -->
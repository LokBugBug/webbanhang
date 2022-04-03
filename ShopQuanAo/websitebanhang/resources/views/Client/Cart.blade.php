@extends('Client.Masterlayout')
@section('ClientContent')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img style="max-height: 400px; width: 100%; object-fit: cover;" src="public/client/img/slider/1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>GIỎ HÀNG</h2>
      </div>
     </div>
   </div>
</section>
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Tiền</th>
                        <th>Thao Tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($_SESSION['Cart']))
                      @foreach($_SESSION['Cart'] as $key=>$values)
                      <form method="POST">
                      {{ csrf_field() }}
                      <input type="text" value="{{$values['id']}}" hidden name="id">
                      <tr>
                        <td><a href="#"><img src="public/images/products/{{ $values['img'] }}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="javascrip:void(0)">{{ $values['name'] }}</a></td>
                        <td>{{ number_format ($values['price'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND</td>
                        <td><input class="aa-cart-quantity" type="number" min="1" value="{{ $values['quantity'] }}" name="quantity"></td>
                        <td>{{ number_format ($values['totalmoney'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND</td>
                        <td>
                          <input type="submit" class="btn btn-primary" value="Cập Nhật" name="Update">
                          <a class="remove" href="{{ route('DeleteCart',[ 'id'=>$values['id'] ] ) }}"><fa class="fa fa-close"></fa></a>
                        </td>
                      </tr>
                      </form>
                      @endforeach
                      @endif
                      </tbody>
                  </table>
                </div>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Tổng Thanh Toán</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng tiền sản phẩm</th>
                     <td>{{ number_format ($data['TotalAll'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND </td>
                   </tr>
                   <tr>
                     <th>Phí Vận Chuyển</th>
                     <td>Miễn Phí</td>
                   </tr>
                   <tr>
                     <th>Tổng Thanh Toán</th>
                     <td>{{ number_format ($data['TotalAll'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND </td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{route('CheckOut')}}" class="aa-cart-view-btn">Thanh Toán</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
  @endsection
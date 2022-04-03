@extends('Client.Masterlayout')
@section('ClientContent')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img style="max-height: 400px; width: 100%; object-fit: cover;" src="public/client/img/slider/1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Thanh Toán Đơn Hàng</h2>
      </div>
     </div>
   </div>
</section>
<!-- Cart view section -->
<section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Thông tin cá nhân
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <input value="{{ $data['InfoUser']->full_name }}" type="text" placeholder="Họ và tên" class="aa-coupon-code" name="data[name_user]">
                            <input value="{{ $data['InfoUser']->phone }}" type="tel" placeholder="Số điện thoại" class="aa-coupon-code" name="data[phone]">
                            <input value="{{ $data['InfoUser']->email }}" type="email" placeholder="Email" class="aa-coupon-code" name="data[email]">
                            <input value="{{ $data['InfoUser']->address }}" type="text" placeholder="Địa chỉ" class="aa-coupon-code" name="data[address]">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Thông tin đơn hàng</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Sản phẩm</th>
                          <th>Giá Tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(isset($_SESSION['Cart']))
                        @foreach($_SESSION['Cart'] as $key=>$values)
                        <tr>
                          <td>{{$values['name']}} <strong> x  {{$values['quantity']}}</strong></td>
                          <td>{{ number_format ($values['totalmoney'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND</td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Tổng tiền</th>
                          <td>{{ number_format ($data['TotalAll'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND</td>
                      </tfoot>
                    </table>
                    <input type="submit" value="Đặt Hàng" class="aa-browse-btn" name="Order">
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 @endsection
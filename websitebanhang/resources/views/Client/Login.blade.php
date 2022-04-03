@extends('Client.Masterlayout')
@section('ClientContent')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img style="max-height: 400px; width: 100%; object-fit: cover;" src="public/client/img/slider/1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Đăng kí | Đăng Nhập </h2>
      </div>
     </div>
   </div>
</section>
<!-- Cart view section -->
<section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Đăng Nhập</h4>
                <h5 style="color: red; height: 16px;">{{ $data['notifiLogin'] }} {{ Session('mess') ? Session::get('mess') : "" }}</h5>
                 <form method="POST" class="aa-login-form">
                 {{ csrf_field() }}
                  <label for="">Tài khoản<span>*</span></label>
                   <input type="text" placeholder="Nhập tài khoản" name="user">
                   <label for="">Mật khẩu<span>*</span></label>
                    <input type="password" placeholder="Nhập mật khẩu" name="password">
                    <button type="submit" class="aa-browse-btn" name="login" value="1">Đăng Nhập</button>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Đăng Kí</h4>
                 <h5 style="height: 16px;"><?=$data['notifiSigin']?></h5>
                 <form method="POST" class="aa-login-form">
                     {{ csrf_field() }}
                     <label for="">Họ Và Tên<span>*</span></label>
                    <input type="text" placeholder="Nhập Họ Và Tên" name="data[full_name]">
                    <label for="">Tài khoản<span>*</span></label>
                    <input type="text" placeholder="Nhập tài khoản" name="data[user_name]">
                    <label for="">Mật khẩu<span>*</span></label>
                    <input type="password" placeholder="Nhập mật khẩu" name="data[pass_word]">
                    <label for="">Xác nhận mật khẩu<span>*</span></label>
                    <input type="password" placeholder="Xác nhận mật khẩu" name="data[pass_confrim]">
                    <label for="">Email<span>*</span></label>
                    <input type="text" placeholder="Nhập Email" name="data[email]">
                    <label for="">Số điện thoại<span>*</span></label>
                    <input type="text" placeholder="Nhập số điện thoại" name="data[phone]">
                    <label for="">Địa chỉ<span>*</span></label>
                    <input type="text" placeholder="Nhập địa chỉ" name="data[address]">
                    <button type="submit" class="aa-browse-btn" value="2" name="sigin">Đăng Kí</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 @endsection
@extends('Client.Masterlayout')
@section('ClientContent')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
   <img style="max-height: 400px; width: 100%; object-fit: cover;" src="public/client/img/slider/1.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Liên Hệ</h2>
      </div>
     </div>
   </div>
</section>
  <!-- / catg header banner section -->'
<section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>Thông Tin Liên Hệ</h2>
             <p>Chúng tôi sẽ hỗ trợ tất cả những vấn đề của bạn</p>
           </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Họ và tên" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Số điện thoại" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Địa chỉ" class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" rows="3" placeholder="Lời nhắn"></textarea>
                    </div>
                    <button class="aa-secondary-btn">Gửi</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>DailyShop</h4>
                     <p>Bạn có thể liên hệ cho chúng tôi qua những thông tin dưới đây</p>
                     <p><span class="fa fa-home"></span>Hồ Chí Minh...</p>
                     <p><span class="fa fa-phone"></span>0845151117</p>
                     <p><span class="fa fa-envelope"></span>support@dailyshop.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 @endsection
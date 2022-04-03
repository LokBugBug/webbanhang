//Dùng ajax để kiểm tra xem tên danh mục có trùng không rồi báo lại cho người dùng biết
$(document).ready(function(){
    $("#name-category").change(function(){
        var NameCategory = $(this).val();
        $.post("ajax/AddCategory",{name:NameCategory},function(data){
             $(".showcheck").html(data);
        });
    });
    $("#name-category").focus(function(){
        var NameCategory = $(this).val();
        $.post("ajax/AddCategory",{name:NameCategory},function(data){
             $(".showcheck").html(data);
        });
    });
    $("#name-category").keyup(function(){
      var NameCategory = $(this).val();
      $.post("ajax/AddCategory",{name:NameCategory},function(data){
           $(".showcheck").html(data);
      });
  });
});
//Nếu người dùng bấm nút Thêm thì tiến hành gửi dữ liệu đến controller ajax acction AddCategory xử lý
$(document).on('click','.btnAdd',function(){
    var NameCategory = $('#name-category').val();
    $.post("ajax/AddCategory",{name_category:NameCategory,btnAdd:0},function(data){
            $(".showcheck").html(data);
    });
});
$(document).on('click','.',function(){
  var NameCategory = $('#name-category').val();
  $.post("ajax/AddCategory",{name_category:NameCategory,btnAdd:0},function(data){
          $(".showcheck").html(data);
  });
});
//Hàm Xóa 1 đối tượng nào đó như danh mục sản phẩm hoặc sản phẩm
function DeleteAll(url,oject){
    Swal.fire({
      title: 'Bạn có chắc muốn xóa tất cả '+oject,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Có'
    }).then((result) => {
      if (result.isConfirmed) {
        $.post("Admin/ShowCategory",{btnDeleteAllCategory:0},function(data){
          $(".wrapper").html(data);
  });
      }
    });
}
function DeleteOne(url,oject,id){
  Swal.fire({
    title: 'Bạn có chắc muốn xóa tất cả '+oject,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Có'
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(url,{btnDeleteOne:1,id:id},function(data){
        $(".wrapper").html(data)
   });
    }
  });
}
//người dùng bấm vào các chức năng của admin sẽ dùng ajax trả giữ dữ liệu về đồng thời truyền controller và acction lên url
 function controllers(base,url){
    $.post(url,{},function(data){
         $(".wrapper").html(data);
    });
    // câu lệnh này dùng để truyền địa chỉ lên url
    window.history.pushState("data","Title",base+url);
}
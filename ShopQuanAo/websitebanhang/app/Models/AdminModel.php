<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    //----------------------------------Bộ Điều Khiển--------------------------------------------
    //Lấy đơn hàng gần đây
    function GetOrderDesc(){
        return DB::table('orders')->orderByDesc('id')->get();
    }
    //Đếm số lượng bảng ghi trong 1 table
    function CountData($Table){
        return DB::table($Table)->count();
    }
    //Đếm tổng số lượng đơn hàng đã giao
    function CountOrderSuccess(){
        return DB::table('orders')->where('order_status','1')->count();
    }
    //Đếm tổng tiền doanh thu
    function SumMoney(){
        return DB::table('orders')->where('order_status','1')->sum('total_money');
    }
    //------------------------------------END----------------------------------------------------
    //----------------------------------THÀNH VIÊN------------------------------------------------
    //Lấy tất cả danh sách thành viên
    function GetUsers(){
        $ListUsers = DB::table('users')->get();
        return $ListUsers;
    }
    //Lấy thông tin tin thành viên theo id
    function GetUserById($Id){
        $User = DB::table('users')->where('id',$Id)->get();
        return $User;
    }
    //Chỉnh sửa thành viên
    function UpdateUser($Id,$Data){
        DB::table('users')->where('id',$Id)->update($Data);
    }
    //------------------------------------END-----------------------------------------------------

    //----------------------------------DANH MỤC SẢN PHẨM-----------------------------------------
    //Lấy toàn bộ danh mục 
    function GetCategorys(){
        $ListCategory = DB::table('category')->where('delete_status','0')->get();
        return $ListCategory;
    }
    //Lấy thông tin danh mục theo id
    function GetCategoryById($id){
        $Category = DB::table('category')->where('id',$id)->get();
        return $Category;
    }
    //Thêm mới 1 danh mục
    function AddCategory($NameCategory){
        DB::table('category')->insert($NameCategory);
    }
    //Chỉnh sửa danh mục
    function UpdateCategory($Id,$Data){
        DB::table('category')->where('id',$Id)->update($Data);
    }
    //Xóa danh mục
    function DeleteCategory($id){
        DB::table('category')
        ->where('id',$id)
        ->update(['delete_status'=>'1']);
    }
    //---------------------------------------END---------------------------------------------------

    //--------------------------------------SẢN PHẨM-----------------------------------------------
    //Lấy danh sách sản phẩm
    function GetProducts(){
        $ListProducts = DB::table('product')->where('delete_status','0')->get();
        return $ListProducts;
    }
    //Lấy thông tin sản phẩm theo id
    function GetProductById($id){
        $Category = DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->select('product.*','category.category_name')
        ->where('id_product',$id)->first();
        return $Category;
    }
    //Thêm mới sản phẩm
    function AddProduct($Product){
            DB::table('product')->insert($Product);
    }
    //Chỉnh sửa sản phẩm
    function EditProduct($Id,$Product){
        DB::table('product')->where('id_product',$Id)->update($Product);
    }
    //Xóa sản phẩm
    function DeleteProduct($id){
        DB::table('product')->where('id_product',$id)->update(['delete_status'=>'1']);
    }
    //--------------------------------------END----------------------------------------------------

    //--------------------------------------ĐƠN HÀNG-----------------------------------------------
    //Lấy danh sách tất cả các đơn hàng
    function GetOrders(){
        $Orders = DB::table('orders')->where('status_delete','0')->get();
        return $Orders;
    }
    //Lấy thông tin của 1 đông hàng
    function GetOrderById($Id){
        $Order = DB::table('orders')->where('status_delete','0')->where('id',$Id)->first();
        return $Order;
    }
    //Lấy chi tiết của 1 đơn hàng
    function OrderDetail($Id){
        return DB::table('product')
        ->join('order_details','product.id_product','=','order_details.id_product')
        ->select('order_details.*','product.name_product')
        ->where('id_order',$Id)
        ->get();
    }
    //Xử lí hóa đơn
    function Processing($Id){
        DB::table('orders')->where('id',$Id)->update(["order_status"=>"1"]);
    }
    //Từ chối hóa đơn
    function CancelOrder($Id){
        DB::table('orders')->where('id',$Id)->update(["order_status"=>"3"]);
    }
    //Xóa hóa đơn
    function DeleteOrder($Id){
        DB::table('orders')->where('id',$Id)->update(["status_delete"=>"1"]);
    }
    //---------------------------------------END--------------------------------------------------
    
    //---------------------------------------RESET WEBSITE----------------------------------------
     //Reset Website
     function ResetWebsite(){
         //xóa toàn bộ dự liệu trong bảng
        DB::table('category')->delete();
        DB::table('product')->delete();
        DB::table('users')->delete();
        DB::table('orders')->delete();
        DB::table('order_details')->delete();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        //sau khi xóa xong tiến hành tạo 1 tài khoản admin
        DB::table('users')->insert(["user_name"=>"admin","pass_word"=>"21232f297a57a5a743894a0e4a801fc3",
        "full_name"=>"Viên Băng Nghiên","email"=>"bangnghien@gmail.com","phone"=>"0845151117","address"=>"Thượng Hải",
        "level_user"=>"admin","create_date"=>$date,"banned"=>"0","reason_banned"=>""
    ]);
    }
    function AuthReset($Id,$Password){
        return DB::table('users')->where('id',$Id)->where('pass_word',$Password)->count();
    }
    //---------------------------------------END--------------------------------------------------
    //Dùng để đếm 1 bảng ghi của 1 bảng nào đó mục đích để kiểm tra xem 1 cái thông tin gì đó có tồn tại hay không
    function CheckIsset($Table,$Colum,$Id){
        $Count = DB::table($Table)->where($Colum,$Id)->count();
        return $Count;
    }
    //Đăng Nhập Admin
    function LoginAdmin($User, $Password){
        $User = DB::table('users')
        ->where('user_name',$User)
        ->where('pass_word',$Password)
        ->where('level_user','admin')
        ->first();
        return $User;
    }
    //Kiểm tra xem tài khoản đó có bị khóa không
    function CheckBanned($UserName){
        $User = DB::table('users')
        ->where('user_name',$UserName)
        ->where('banned','1')
        ->first();
        return $User;
    }

}

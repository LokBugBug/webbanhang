<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ClientModel extends Model
{
    //SẢN PHẨM SALE
    function GetProductSale($limit){
        return DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->where('product.delete_status','0')
        ->where('category.delete_status','0')
        ->where('category.display_status','1')
        ->orderByDesc('sale')
        ->limit($limit)
        ->get();
    }
    //SẢN PHẨM MỚI
    function GetProductNew($limit){
        return DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->where('product.delete_status','0')
        ->where('category.delete_status','0')
        ->where('category.display_status','1')
        ->orderByDesc('product.id_product')
        ->limit($limit)
        ->get();
    }
    //SẢN PHẨM HOT
    function GetProductHot($limit){
        return DB::table('order_details')
        ->join('product','order_details.id_product','=','product.id_product')
        ->join('category','category.id','=','product.id_category')
        ->where('product.delete_status','0')
        ->where('category.delete_status','0')
        ->where('category.display_status','1')
        ->select('product.id_product','product.name_product','product.price','product.sale','product.img_product',
                 DB::raw('SUM(order_details.quantity) AS sum'))
        ->groupBy('id_product','name_product','product.price','product.sale','product.img_product')
        ->orderByDesc('sum')
        ->limit($limit)
        ->get();
    }
    //TẤT CẢ SẢN PHẨM
    function GetProductAll(){
        return DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->where('product.delete_status','0')
        ->where('category.display_status','1')
        ->where('category.delete_status','0');
    }
    //PHÂN TRANG SẢN PHẨM
    function GetProductPage($limit){
        return DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->where('product.delete_status','0')
        ->where('category.display_status','1')
        ->where('category.delete_status','0')
        ->Paginate($limit);
    }
    //PHÂN TRANG SẢN PHẨM THEO DANH MỤC
    function GetProductByCategory($id,$limit){
        return DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->where('product.delete_status','0')
        ->where('product.id_category',$id)
        ->where('category.display_status','1')
        ->where('category.delete_status','0')
        ->paginate($limit);
    }
    //LẤY DANH MỤC SẢN PHẨM
    function GetCategory(){
        return DB::table('category')
        ->where('display_status','1')
        ->where('delete_status','0')->get();
    }
    //LẤY DANH MỤC SẢN PHẨM THEO ID
    function GetCategoryById($id){
        return DB::table('category')
        ->where('display_status','1')
        ->where('delete_status','0')
        ->where('id',$id)->first();
    }
    //LẤY SẢN PHẨM THEO ID
    function GetProductById($id){
        return DB::table('product')
        ->where('delete_status','0')
        ->where('id_product',$id)
        ->first();
    }
    //LẤY SỐ LƯỢNG BÁN CỦA 1 SẢN PHẨM
    function GetQuantityBuy($id){
        return DB::table('order_details')
        ->where('id_product',$id)
        ->select('id_product',DB::raw('SUM(quantity) as QuantityBuy'))
        ->groupBy('id_product')
        ->first();
    }
    //ĐĂNG NHẬP KHÁCH HÀNG
    function LoginCustomer($User, $Password){
        return DB::table('users')
        ->where('user_name',$User)
        ->where('pass_word',$Password)
        ->first();
        
    }

    //Kiểm tra xem user có bị khóa không
    function CheckBanned($UserName){
        return DB::table('users')
        ->where('user_name',$UserName)
        ->where('banned','1')
        ->first();
    }
    //Kiểm tra xem tài khoản đã tồn tại hay chưa
    function CheckUser($username){
        return DB::table('users')
        ->where('user_name',$username)
        ->count();
    }
    //ĐĂNG KÍ THÀNH VIÊN
    function Sigin($data){
        DB::table('users')->insert($data);
    }
    //LẤY THÔNG TIN KHÁCH HÀNG THEO ID
    function GetUserById($id){
        return DB::table('users')
        ->where('id',$id)
        ->where('banned','0')
        ->first();
    }
    //THÊM ĐƠN HÀNG 
    function AddOrder($data){
        DB::table('orders')->insert($data);
        return DB::getPdo()->lastInsertId();
    }
    //THÊM SẢN PHẨM VÀO BẢN CHI TIẾT HÓA ĐƠN
    function AddOrderDetails($data){
        DB::table('order_details')->insert($data);
    }
    //TÌM KIẾM SẢN PHẨM
    function SearchProduct($content,$limit){
        return DB::table('product')
        ->join('category','product.id_category','=','category.id')
        ->where('product.delete_status','0')
        ->where('category.display_status','1')
        ->where('category.delete_status','0')
        ->where('name_product','LIKE','%'.$content.'%')
        ->paginate($limit);
    }

}

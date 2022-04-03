<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;
use Illuminate\Support\Facades\Session;
use App\core\notification;
class HomeController extends Controller
{
    private $ClientModel;
    private $notification;
    function __construct()
    {
        $this->ClientModel = new ClientModel();
        $this->notification = new notification();
    }
    function index(){
        //SẢN PHẨM Giảm Giá
        $ProductSale = $this->ClientModel->GetProductSale(8);
        //SẢN PHẨM MỚI
        $ProductNew = $this->ClientModel->GetProductNew(8);
        //SẢN PHẨM PHỔ BIẾN
        $ProductHot = $this->ClientModel->GetProductHot(8);
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        $data = [
            "Products"      => $ProductSale,
            "ProductNew"    => $ProductNew,
            "ProductHot"    => $ProductHot,
            'QuantityProduct' => $QuantityProduct,
            'TotalAll'        => $TotalAll
        ];
        return view('Client.Home')->with('data',$data);
    }
    //Sản Phẩm
    function Products($id){
        //DANH MỤC SẢN PHẨM
        $CategoryAll = $this->ClientModel->GetCategory();
        $ProductHot = $this->ClientModel->GetProductHot(9);
        if($id == 0){
            //TẤT CẢ SẢN PHẨM
            $Product = $this->ClientModel->GetProductPage(12);
            $NameCategory = "Tất Cả Sản Phẩm";
        }else{
            //SẢN PHẨM THEO DANH MỤC
            $Product = $this->ClientModel->GetProductByCategory($id,12);
            //DANH MỤC SẢN PHẨM THEO ID
            $Category = $this->ClientModel->GetCategoryById($id);
            $NameCategory  = $Category->category_name;
        }
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        $data = [
            "Products"      => $Product,
            "Category"      => $CategoryAll,
            "NameCategory"  => $NameCategory,
            "ProductHot"    => $ProductHot,
            'QuantityProduct' => $QuantityProduct,
            'TotalAll'        => $TotalAll
        ];
        
        return view('Client.Products')->with('data',$data);
    }
    //TÌM KIẾM SẢN PHẨM
    function SearchProduct(Request $request){
        $content = $request->content;
        $ProductSearch = $this->ClientModel->SearchProduct($content,12);
        $CategoryAll = $this->ClientModel->GetCategory();
        $ProductHot = $this->ClientModel->GetProductHot(9);
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        $data = [
            'QuantityProduct' => $QuantityProduct,
            'TotalAll'        => $TotalAll,
            'Products'        => $ProductSearch,
            'content'         => $content,
            'Category'        => $CategoryAll,
            "ProductHot"      => $ProductHot
        ];
        
        return view('Client.SearchProduct')->with('data',$data);
    }

    //Chỉ Tiết Sản Phẩm
    function ProductDetails($id){
        $Product = $this->ClientModel->GetProductById($id);
        $Result = $this->ClientModel->GetQuantityBuy($id);
        if($Result == null) $QuantityBuy = 0;
        else $QuantityBuy = $Result->QuantityBuy;
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        $data = [
            "Product"       => $Product,
            "QuantityBuy"   => $QuantityBuy,
            'QuantityProduct' => $QuantityProduct,
            'TotalAll'        => $TotalAll
        ];
        return view('Client.ProductDetails')->with('data',$data);
    }

    //GIỎ HÀNG
    function ShowCart(Request $request){
        if(Session::exists('IdCustomer')){
        if($request->Update){
            $_SESSION['Cart'][$request->id]['quantity']= $request->quantity;
            $_SESSION['Cart'][$request->id]['totalmoney']= $request->quantity * $_SESSION['Cart'][$request->id]['price'];
        }
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        $data = [
            'QuantityProduct' => $QuantityProduct,
            'TotalAll'        => $TotalAll
        ];
        return view('Client.Cart')->with('data',$data);
        }
        Session::flash('mess','Vui lòng đăng nhập');
        return redirect()->route('Login');
    }
    //THÊM VÀO GIỎ HÀNG
    function AddCart($id){
        if(Session::exists('IdCustomer')){
        $ProductInfo = $this->ClientModel->GetProductById($id);
        $Product = [
            'id'       => $ProductInfo->id_product,
            'name'     => $ProductInfo->name_product,
            "img"      => $ProductInfo->img_product,
            "quantity"         => 1,
            "price"            => $ProductInfo->price,
            "totalmoney"       => $ProductInfo->price
        ];
        if(!isset($_SESSION['Cart'][$id])){
            $_SESSION['Cart'][$id] = $Product;
        }else{
            $_SESSION['Cart'][$id]["quantity"]+=1;
            $_SESSION['Cart'][$id]["totalmoney"] = $_SESSION['Cart'][$id]["quantity"]*$_SESSION['Cart'][$id]["price"];
        }
        return redirect()->route('Cart');
        }
        Session::flash('mess','Vui lòng đăng nhập');
        return redirect()->route('Login');
    }
    //XÓA SẢN PHẨM KHỎI GIỎ HÀNG
    function DeleteCart($id){
        if(isset($_SESSION['Cart'][$id])){
            unset($_SESSION['Cart'][$id]);
        }
        return redirect()->back();
    }
   
    //TRANG THANH TOÁN
    function CheckOut(Request $request){
        if(isset($_SESSION['Cart'])){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        //Khi khách hàng bấm nút đặt hàng
        if($request->Order){
             $IdUser = Session::get('IdCustomer');
             $data = $request->data;
             $data['id_user'] = $IdUser;
             $data['total_money'] = $TotalAll;
             $data['create_date'] = $date;
             $data['order_status'] = "0";
             $data['status_delete']="0";
             //Thêm thông tin vào đơn hàng đồng thời lấy ra id đơn hàng vừa thêm vào
             $IdOrder = $this->ClientModel->AddOrder($data);
             //Thêm thông tin vào bảng chi tiết hóa đơn
             foreach($_SESSION['Cart'] as $key=>$values){
                 $data = [
                    'id_order'=>$IdOrder,
                    'id_product'=>$values['id'],
                    'quantity'=>$values['quantity'],
                    'unit_price'=>$values['price']
                 ];
                 $this->ClientModel->AddOrderDetails($data);
             }
              //Hủy thông tin giỏ hàng
              unset($_SESSION['Cart']);
              $this->notification->NotificationAutoHref("success","Bạn đã đặt hàng thành công","","","false","",route('index'));
        }
        //lấy thông tin khách hàng
        $id = Session::get('IdCustomer');
        $InfoUser = $this->ClientModel->GetUserById($id);
        $data = [
            'QuantityProduct'   => $QuantityProduct,
            'TotalAll'          => $TotalAll,
            'InfoUser'          => $InfoUser
        ];
        return view('Client.CheckOut')->with('data',$data);
        }
        Session::flash('mess','Vui lòng đăng nhập');
        return redirect()->route('Login');
       
    }
    //TRANG LIÊN HỆ
    function Contact(){
        if(isset($_SESSION['Cart'])){
            $QuantityProduct = count($_SESSION['Cart']);
            $TotalAll = 0;
            foreach($_SESSION['Cart'] as $key=>$values){
                $TotalAll+=$values['totalmoney'];
            }
        }else {$QuantityProduct = 0; $TotalAll = 0;}
        $data = [
            'QuantityProduct' => $QuantityProduct,
            'TotalAll'        => $TotalAll
        ];
        return view('Client.Contact')->with('data',$data);
    }
     //ĐĂNG NHẬP KHÁCH HÀNG
     function LoginCustomer(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d");
        $notifiSigin = "";
        $notifiLogin = "";
        if(!Session::exists('IdCustomer')){
            //khi ngươi dùng đăng nhập
            if($request->login){
                $user = $request->user;
                $pass = md5($request->password);
                $CheckUser = $this->ClientModel->LoginCustomer($user,$pass);
                if($CheckUser){
                    $CheckBanned = $this->ClientModel->CheckBanned($user);
                    if($CheckBanned == null){
                        Session::put('IdCustomer',$CheckUser->id);
                        Session::put('NameCustomer',$CheckUser->full_name);
                        Session::save();
                        return redirect()->route('index');
                    }else{
                        $notifiLogin = 'Tài khoản của bạn bị khóa. Lý do: '.$CheckBanned->reason_banned.'';
                    }
                }else{
                    $notifiLogin ='Tài khoản hoặc mật khẩu không xác';
                }
            }
            //khi người dùng đăng kí tài khoản
            if($request->sigin){
                $CheckUserName = $this->ClientModel->CheckUser($request->data["user_name"]);
                if($CheckUserName == 0){
                    if($request->data["pass_word"] == $request->data["pass_confrim"]){
                        $data = $request->data;
                        unset($data["pass_confrim"]);
                        $data["level_user"] = "";
                        $data["create_date"] = $date;
                        $data["banned"] = "0";
                        $data["reason_banned"] ="";
                        $data["pass_word"] = md5($request->data['pass_word']);
                        $this->ClientModel->Sigin($data);
                        $notifiSigin = '<h5 style="color: green;">Đăng kí tài khoản thành công</h5>';

                    }else{
                        $notifiSigin = '<h5 style="color: red;">Xác nhận mật khẩu không trùng khớp</h5>';
                    }
                }else{
                    $notifiSigin = '<h5 style="color: red;">Tài khoản đã có người khác sử dụng</h5>';
                }
            }
            if(isset($_SESSION['Cart'])){
                $QuantityProduct = count($_SESSION['Cart']);
                $TotalAll = 0;
                foreach($_SESSION['Cart'] as $key=>$values){
                    $TotalAll+=$values['totalmoney'];
                }
            }else {$QuantityProduct = 0; $TotalAll = 0;}
            $data = [
                'QuantityProduct'   => $QuantityProduct,
                'TotalAll'          => $TotalAll,
                'notifiSigin'        => $notifiSigin,
                'notifiLogin'       => $notifiLogin
            ];
            return view('Client.Login')->with('data',$data);
        }else return redirect()->route('index');
    }
    //ĐĂNG XUẤT KHÁCH HÀNG
    function LogoutCustomer(){
        unset($_SESSION['Cart']);
        Session::forget("IdCustomer");
        Session::forget("NameCustomer");
        return redirect()->route('index');
    }
   
}

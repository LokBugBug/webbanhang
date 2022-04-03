<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\core\notification;
use App\Models\AdminModel;
use App\core\core;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $core;
    private $AdminModel;
    private $Notification;
    
    function __construct()
    {
        $this->core = new core();
        $this->AdminModel = new AdminModel();
        $this->Notification = new notification();
    }
    //BẢNG ĐIỀU KHIỂN
    function Home(Request $request){
        //Kiểm tra đăng nhập
        $this->core->AuthLogin();
        //Đếm số lượng khách hàng
        $SumUser = $this->AdminModel->CountData("users");
        //danh sách đơn hàng gần đây
        $Orders = $this->AdminModel->GetOrderDesc();
        //Tổng đơn hàng
        $SumOrder = $this->AdminModel->CountData('orders');
        //Tổng đơn hàng đã giao
        $OrderSuccess = $this->AdminModel->CountOrderSuccess();
        //Tổng doanh thu
        $SumMoney = $this->AdminModel->SumMoney();
        $data = [
            "title"         => "Bảng Điều Khiển",
            "SumUser"       => $SumUser,
            "Orders"        => $Orders,
            "SumOrder"      => $SumOrder,
            "OrderSuccess"  => $OrderSuccess,
            "SumMoney"      => $SumMoney
        ];
        return view('Admin.Home')->with('data',$data);
    }

    //QUẢN LÍ THÀNH VIÊN
    function ShowUsers(){
        //Kiểm tra đăng nhập
        $this->core->AuthLogin();
        $listUsers = $this->AdminModel->GetUsers();
        $data = [
            "title"     => "Quản Lí Thành Viên",
            "Users"     => $listUsers
        ];
        return view('Admin.User.ShowUsers')->with('data',$data);
    }
    //CHỈNH SỬA THÀNH VIÊN
    function EditUser(Request $request,$id){
        //Kiểm tra đăng nhập
        $this->core->AuthLogin();
        if(isset($request->btnSaveUser)){
            $InfoUser = $request->info;
            $this->AdminModel->UpdateUser($id,$InfoUser);
            $this->Notification->NotificationAutoHref("success","Thông Báo","Chỉnh sửa thành viên thành công","","false","",route('AdminEditUsers',['id'=>$id]));
        }
        //Kiểm tra xem thành viên này có tồn tại hay không
        $Check = $this->AdminModel->CheckIsset("users","id",$id);
        if($Check >= 1){
            $User = $this->AdminModel->GetUserById($id);
            $data = [
                "title"     => "Chỉnh Sửa Thành Viên",
                "User"     => $User
            ];
            return view('Admin.User.EditUser')->with('data',$data);   
        }else{
            $this->Notification->NotificationBtn("Không tìm thấy thành viên này","warning","false","Quay Lại",route('AdminShowUsers'));
        }
        
    }

    //QUẢN LÍ DANH MỤC
    function ShowCategorys(){
         //Kiểm tra đăng nhập
         $this->core->AuthLogin();
         $ListCategory = $this->AdminModel->GetCategorys();
         $data = [
           "title"          =>"Quản Lí Danh Mục",
           "Categorys"   =>$ListCategory
         ];
         return view('Admin.Category.ShowCategorys')->with('data',$data);
    }

    //THÊM MỚI DANH MỤC
    function AddCategory(Request $request){
         //Kiểm tra đăng nhập
         $this->core->AuthLogin();
         $notifi = "";
         if($request->category_name){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d");
             $data = [
                 'category_name' => $request->category_name,
                 'display_status'=> '1',
                 'create_date'   =>  $date,
                 'delete_status' => '0'

             ];
             $this->AdminModel->AddCategory($data);
             $notifi = "Thêm danh mục thành công";
         }
         $data = [
             "title"    => "Thêm Mới Danh Mục",
             "notifi"   => $notifi
         ];
         return view('Admin.Category.AddCategory')->with('data',$data);
    }

    //CHỈNH SỬA DANH MỤC
    function EditCategory(Request $request,$id){
        //Kiểm tra đăng nhập
        $this->core->AuthLogin();
        if($request->btnUpdateCategory){
            $data = $request->data;
            $this->AdminModel->UpdateCategory($id,$data);
            $this->Notification->NotificationAutoHref("success","Thông Báo","Chỉnh sửa danh mục thành công","","false","",route('AdminEditCategory',['id'=>$id]));
        }
        $Category = $this->AdminModel->GetCategoryById($id);
        $data = [
            "title"    => "Chỉnh Sửa Danh Mục",
            "Category" => $Category
        ];
        return view('Admin.Category.EditCategory')->with('data',$data);
    }
    //XÓA DANH MỤC
    function DeleteCategory($Id,$CategoryName){
        $this->core->AuthLogin();
        $this->AdminModel->DeleteCategory($Id);
        Session::flash('messger',"Đã Xóa Danh Mục ".$CategoryName."");
        return redirect()->route('AdminShowCategorys');
    }
    //QUẢN LÍ SẢN PHẨM
    function ShowProducts(){
        $this->core->AuthLogin();
        $ListProducts = $this->AdminModel->GetProducts();
        $data = [
            "title"     => "Quản Lí Sản Phẩm",
            "Products"  =>$ListProducts
        ];
        return view("Admin.Product.ShowProducts")->with('data',$data);
    }
    //THÊM MỚI SẢN PHẨM
    function AddProduct(Request $request){
        $this->core->AuthLogin();
        $notifi = "";
        if($request->btnAddProduct){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date("Y-m-d");
            $data = $request->product;
            $data["create_date"] = $date;
            $data["delete_status"] = "0";
            $this->AdminModel->AddProduct($data);
            $notifi = "Thêm Sản Phẩm Thành Công";
        }
        $Categorys = $this->AdminModel->GetCategorys();
        $data = [
            "title"    => "Thêm Mới Sản Phẩm",
            "notifi"   =>$notifi,
            "Categorys" =>$Categorys
        ];
        return view('Admin.Product.AddProduct')->with('data',$data);
    }
    //CHỈNH SỬA SẢN PHẨM
    function EditProduct(Request $request,$id){
        $this->core->AuthLogin();
        if($request->product){
            $Product = $request->product;
            if($Product['img_product'] == null){
                unset($Product['img_product']);
            }
            $this->AdminModel->EditProduct($id,$Product);
            $this->Notification->NotificationAutoHref("success","Thông Báo","Chỉnh sản phẩm thành công","","false","",route('AdminEditProduct',['id'=>$id]));
        }
        $Product = $this->AdminModel->GetProductById($id);
        $Categorys = $this->AdminModel->GetCategorys();
        $data = [
            "title"     => "Chỉnh Sửa Sản Phẩm",
            "Categorys" => $Categorys,
            "Product"   => $Product
        ];
        return view('Admin.Product.EditProduct')->with('data',$data);
    }
    //XÓA SẢN PHẨM
    function DeleteProduct($Id,$ProductName){
        $this->core->AuthLogin();
        $this->AdminModel->DeleteProduct($Id);
        Session::flash('messger',"Đã Xóa Sản Phẩm ".$ProductName."");
        return redirect()->route('AdminShowProducts');
    }
    //QUẢN LÍ HÓA ĐƠN
    function ShowOrders(){
        $this->core->AuthLogin();
        $Orders = $this->AdminModel->GetOrders();
        $data = [
            "title"     => "Quản Lí Đơn Hàng",
            "Orders"    => $Orders
        ];
        return view("Admin.Order.ShowOrders")->with('data',$data);
    }
    //CHI TIẾT HÓA ĐƠN
    function OrderDetails($id){
        $this->core->AuthLogin();
        $OrderDetails = $this->AdminModel->OrderDetail($id);
        $Order = $this->AdminModel->GetOrderById($id);
        $data = [
            "title"             => "Chi Tiết Đơn Hàng",
            "OrderDetails"      => $OrderDetails,
            "Order"             => $Order
        ];
        return view("Admin.Order.OrderDetails")->with('data',$data);
    }
    //XỬ LÍ HÓA ĐƠN
    function Processing($id){
        $this->core->AuthLogin();
        $this->AdminModel->Processing($id);
        $this->Notification->NotificationAutoHref("success","Thông Báo","Xử Lí Hóa Đơn Thành Công","","false","",route('AdminOrderDetails',['id'=>$id]));
    }
    //TỪ CHỐI HÓA ĐƠN
    function CancelOrder($id){
        $this->core->AuthLogin();
        $this->AdminModel->CancelOrder($id);
        $this->Notification->NotificationAutoHref("success","Thông Báo","Bạn Đã Từ Chối Hóa Đơn","","false","",route('AdminOrderDetails',['id'=>$id]));
    }
    //XÓA HÓA ĐƠN
    function DeleteOrder($id){
        $this->core->AuthLogin();
        $this->AdminModel->DeleteOrder($id);
        Session::flash('messger',"Xóa Đơn Hàng Thành Công");
        return redirect()->route('AdminShowOrders');

    }
    //RESET WEBSITE
    function ResetWebSite(Request $request){
        $this->core->AuthLogin();
        if($request->btnReset){
            $Id = Session::get('IdAdmin');
            $password = $request->password;
            $check = $this->AdminModel->AuthReset($Id,md5($password));
            if($check >= 1){
                $this->AdminModel->ResetWebSite();
                $this->Notification->NotificationAutoHref("success","Thông Báo","Bạn đã reset toàn bộ website","","false","",route('AdminResetWebsite'));
                Session::flush();
            }else{
                $this->Notification->Notification("error","Thông Báo","Mật Khẩu Sai","Thử Lại","true","");
            }
        }
        $data = [
            "title" => "Reset Website"
        ];
        return view("Admin.ResetWebsite")->with('data',$data);
    }
    //ĐĂNG NHẬP ADMIN
    function LoginAdmin(Request $request){
        //Nếu đã đăng nhập rồi thì không được phép quay lại trang login
        $this->core->BackLogin();
        if(isset($request->login)){
            $User = $this->AdminModel->LoginAdmin($request->user,md5($request->password));
            if($User){
                $CheckBanned = $this->AdminModel->CheckBanned($request->user);
                if($CheckBanned){
                    $ReaSonBanner = $CheckBanned->reason_banned;
                    $this->Notification->Notification("error","Tài khoản của bạn đã bị khóa",$ReaSonBanner,"Xác Nhận","true","");
                }else{
                    Session::put('NameAdmin',$User->full_name);
                    Session::put('IdAdmin',$User->id);
                    Session::save();
                    $this->Notification->NotificationAutoHref("success","Đăng Nhập Thành Công","","","false","",route('AdminHome'));
                }
            }else{
                $this->Notification->Notification("error","Đăng Nhập Thất Bại","Tài khoản hoặc mật khẩu không chính xác","Xác Nhận","true","");
            }
        }
        $data = [
            "title" => "Admin | Login" 
        ];
        return view('Admin.Login')->with('data',$data);
    }
    //ĐĂNG XUẤT ADMIN
    function LogoutAdmin(){
        //Kiểm tra đăng nhập
        $this->core->AuthLogin();
        Session::forget("IdAdmin");
        Session::forget("NameAdmin");
        $this->core->Rederect('AdminLogin');
    }
}

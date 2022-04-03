<?php
namespace App\core;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


    class core{
        //Kiểm tra đăng nhập
        function AuthLogin(){
           if(!session()->exists('IdAdmin')){
                $this->Rederect('AdminLogin');
           }
        }
        function BackLogin(){
            if(session()->exists('IdAdmin')){
                $this->Rederect('AdminHome'); 
           }
        }
        //Điều hướng
        function Rederect($url){
            echo "<script>window.location.href='".route($url)."'</script>";
        }
    }
?>
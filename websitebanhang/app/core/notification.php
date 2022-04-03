<?php
namespace App\core;
    
    class notification{
        //Xuất hiện thông báo và tự động chuyển hướng sau 1.5s
        function NotificationAutoHref($icon,$title,$content,$btntext,$showbtn,$colorbtn,$url){
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script>
            $(document).ready(function(){
                Swal.fire({
                    position: "center",
                    icon: "'.$icon.'",
                    title: "'.$title.'",
                    text: "'.$content.'",
                    confirmButtonColor: "'.$colorbtn.'",
                    confirmButtonText: "'.$btntext.'",
                    showConfirmButton: '.$showbtn.',
                })
            });
            setTimeout(() =>window.location.href= "'.$url.'",1500)
            </script>';
        }

        //Xuất hiện thông báo có nút xác nhận
        function NotificationBtn($title,$icon,$showBtnCancel,$BtnText,$url){
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script>
                $(document).ready(function(){
                Swal.fire({
                    title: "'.$title.'",
                    icon: "'.$icon.'",
                    showCancelButton: '.$showBtnCancel.',
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "'.$BtnText.'"
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href= "'.$url.'";
                    }
                  });
                });
            </script>';
        }

        function Notification($icon,$title,$content,$btntext,$showbtn,$colorbtn){
            echo '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script>
            $(document).ready(function(){
                Swal.fire({
                    position: "center",
                    icon: "'.$icon.'",
                    title: "'.$title.'",
                    text: "'.$content.'",
                    confirmButtonColor: "'.$colorbtn.'",
                    confirmButtonText: "'.$btntext.'",
                    showConfirmButton: '.$showbtn.',
                  })
            });
        </script>';
        }
        function NotifiSuccess($text){
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script src='https://code.jquery.com/jquery-3.6.0.js'></script>
            <script>
            $(document).ready(function(){
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: '".$text."',
                showConfirmButton: false,
                timer: 1000
              })
            });
          </script>
            ";
          }
    
    }
    
?>
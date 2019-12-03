<meta charset = "UTF8">
<?php
    $stt = $_POST["st"];
    $ten = $_POST["lastname"];
    $lop = $_POST["class"];
    $khoa=$_POST["khoaa"];
    $noio = $_POST["address"];
    $quequan = $_POST["que"];
    $sdt = $_POST["phone"];
    $ngaydangky = $_POST["date"];
    //Tạo chuỗi kết nối đến CSDL
    $coon = mysqli_connect("localhost","root","123456789","thongtin") or die ("Không thể kết nối được");
    //Câu truy vấn
    $kt = "select * from thongtindk where hoten = '".$ten."'";
    //Truy vấn tới
    $kn = mysqli_query($coon,$kt);
    //Note
    if(isset($_POST["add"])){
        if($stt == ""||$ten == ""||$lop == ""|| $khoa == ""|| $noio ==""||$quequan == ""||$sdt == "" || $ngaydangky == ""){
            echo "Vui lòng nhập đủ thông tin !";
        }
        else{
            //Kiểm tra người dùng có trùng tên hoặc trùng lớp hay chưa  ?
            if($row = mysqli_fetch_array($kn)){
                if($ten == $row["hoten"]){
                   if($lop == $row["lop"]){
                        echo "Tên đăng nhập đã tồn tại!";
                   }        
            else{
                $sql = "insert into thongtin(stt, hoten, lop, khoa, noio, quequan, phone, email, ngaydangky)
                values('".$stt."','".$ten."','".$lop."','".$khoa."','".$noio."','".$quequan."','".$sdt."', '".$ngaydangky."')";
                mysqli_query($coon,$sql);
                echo "Đăng ký thành công!"; 
                }
            }
            else
                echo "Đăng ký thất bại!";
            }
            if($_GET['btnSubmit'] == '') 
            {   
        echo "Đây là nút Submit 2";
        
            }
        }
        }  

?>
<a href="formdangky.php">Quay lại trang chủ</a>
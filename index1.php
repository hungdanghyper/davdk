
<html>  
<head>      
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Ðồ Án LTHT-VÐK </title>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<style> body{background: #dddddd  } </style> <!--url(anhnen.png)-->

<body >
  <?php
//Khai báo sử dụng session
  session_start();

//Khai báo utf-8 để hiển thị được tiếng việt
  header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
  if (isset($_POST['dangnhap'])) 
  {    
     //Kết nối tới database
    include('ketnoi.php');

    //Lấy dữ liệu nhập vào
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {


      header('Location:index1.php');

    }

    // mã hóa pasword
    //$password = md5($password);

    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query("SELECT username, password FROM login WHERE username='$username'");
    if (mysqli_num_rows($query) == 0) {
      header('Location:index1.php');
    }

    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
      header('Location:index1.php');
    }
    
     $_SESSION['username'] = $username;
      header('Location:trangchu.php');
      die();
  }
  ?>

  <div class="row" style="margin-top: 0px;" >
    <table width="100%" height="70"> 
     <tr>
      <td bgcolor="#d8d5d5" align='center' > <h1> <font color='red' > <b> ĐỒ ÁN LẬP TRÌNH HỆ THỐNG VÀ VI ĐIỀU KHIỂN </b> </font> </h1> </td>
    </tr>
  </table>
  <table  width="100%" height="40">
   <tr>
    <td bgcolor="#5c5d5d" align='center' > <font color='white' > <b> HỒ TÁ QUÝ - ĐINH HỮU QUÂN - BÙI VIẾT TOÀN </b> </font> </td>
  </tr>
</table>
<table width=50% align='center' border='2'>
 <tr colsD02="5"> <div class="speed-slow"></div> <h3 align='center'> <font color='blue' > <b> Đăng Nhập Để Điều Khiển Thiết Bị </b> </font> </h3> 
 </tr>


</div>


<div class="row">
  <div class="col-xs-2 col-md-4"></div>
  <div class="col-xs-8 col-md-4">
    <form action="index.php" method="post">
      <div class="form-group">
        <label for="text">Tài Khoản:</label>
        <input type="username" class="form-control" name="txtUsername" placeholder="Nhập Tài Khoản">
      </div>
      <div class="form-group">
        <label for="pwd">Mật Khẩu: </label>
        <input type="password" class="form-control" name="txtPassword" placeholder="Nhập Mật Khẩu">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Nhớ Mật Khẩu</label>
      </div>
      <button type="submit" class="btn btn-default" name="dangnhap">Đăng Nhập</button>
      <div class="alert alert-danger" >
       <strong>Tài Khoản Không Tồn Tại!</strong>
     </div>


   </form>
 </div>
 <div class="col-xs-2 col-md-4"></div>
 <!-- jQuery -->
 <script src="bootstrap/js/jquery.js"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


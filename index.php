
<html>  
<head>      
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/chip.png"/>
  <title>Đồ Án VÐK </title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style> body{background: #dddddd  } </style> 

<body >
  <?php
//Khai báo sử dụng session
  require'ketnoi.php';
  session_start();

//Khai báo utf-8 để hiển thị được tiếng việt
  header('Content-Type: text/html; charset=UTF-8');

//Xử lý đăng nhập
  if (isset($_POST['dangnhap'])) 
  {    

    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
      header('Location:index1.php');
      exit;
    }
    $sql = "SELECT password FROM login WHERE username='$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_array())
      {
        if($password == $row['password'])
        {
          $_SESSION['username'] = $username;
          header('Location:trangchu.php');
          die();
        }
        else
        {
          header('Location:index1.php');
          exit;
        }
      }
    }
    else
    {
      header('Location:index1.php');
      exit;
    }
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
    <td bgcolor="#5c5d5d" align='center' > <font color='white' > <b> ĐẶNG BÁ HÙNG - NGUYỄN TIẾN DŨNG - PHAN KIỀU HƯNG </b> </font> </td>
  </tr>
</table>
<table width=50% align='center' border='2'>
 <tr colsD02="5"> <div class="speed-slow"></div> <h3 align='center'> <font color='blue' > <b> Đăng Nhập Để Điều Khiển Thiết Bị </b> </font> </h3> 
 </tr>


</div>


<div class="row">
  <div class="col-xs-2 col-md-4"></div>
  <div class="col-xs-8 col-md-4">
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary" name="dangnhap">Đăng Nhập</button>
  </form>
</div>
<div class="col-xs-2 col-md-4"></div>
</body>
</html>


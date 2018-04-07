
<html>  
<head>      
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="chip.png">
  <title> Ðồ Án LTHT-VÐK </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <style>
  .jumbotron{
    max-width: 1300px;
    margin: 0 auto;
  }
  .size{
    font-size: 25px;
  }
  .center{
    max-width: 800px;
    margin:10px auto;
  }
</style>
</head>

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

  <div class="jumbotron">
    <h1 class="display-4 text-center">ĐỒ ÁN LẬP TRÌNH HỆ THỐNG VÀ VI ĐIỀU KHIỂN</h1>
    <p class="display-5 text-xl-center text-primary size"> ĐẶNG BÁ HÙNG - NGUYỄN TIẾN DŨNG - PHAN KIỀU HƯNG</p>
    <hr class="my-4">
    <p class="display-5 text-xl-center text-justify size">ĐĂNG NHẬP</p>
    <div class="w-75 center">
      <form>
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" aria-describedby="username" placeholder="Enter Username" name="txtUsername">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtPassword">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" name="dangnhap">Submit</button>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


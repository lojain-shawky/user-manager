<?php 
include_once('db.php');
$tittle='add';
$name="";
$email="";
$password="";
$mobile="";
$btn_tittle="Save";
if(isset($_GET['action'])&&$_GET['action']=='edit'){
    $action='edit';
  $id=$_GET['id'];
$sql="SELECT * FROM users WHERE id = ".$id;
$user=mysqli_query($con,$sql);
if($user){
    $tittle="update";
    $current_user=$user->fetch_assoc();
    $name=$current_user['Name'];
    $email=$current_user['Email'];
    $password=$current_user['Password'];
    $mobile=$current_user['Mobile'];
    $btn_tittle="Update";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>users app</title>
</head>
<body>
<div class="container">
  <div class="wrapper p-5 m-5">
    <div class="d-flex justify-content-between">
        <h2><?php echo $tittle; ?> user</h2>
        <div><a href="index.php"><i data-feather="corner-down-left"></i></a></div>
    </div>
    <form action="index.php" method="post">
    <div class="mb-3">
  <label for="form-label" class="form-label">Name</label>
  <input type="text" class="form-control" value="<?php echo $name; ?>" id="form-label" 
     placeholder="enter your name" name="name" autocomplete="false">
</div>
<div class="mb-3">
  <label for="form-label" class="form-label">Password</label>
  <input type="password" class="form-control" value="<?php echo $password; ?>" id="form-label" placeholder="password" name="password" 
           autocomplete="false">
</div>
    <div class="mb-3">
  <label for="form-label" class="form-label">Email</label>
  <input type="email" class="form-control" value="<?php echo $email; ?>" id="form-label" placeholder="name@example.com" name="email" 
           autocomplete="false">
</div>
<div class="mb-3">
  <label for="form-label" class="form-label">Mobile</label>
  <input type="tel" class="form-control" value="<?php echo $mobile; ?>" id="form-label" placeholder="enter your phone number" name="mobile" 
           autocomplete="false">
</div>
<?php 
if(isset($_GET['id'])) { ?>
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
<?php }
?>
<input type="submit" class="btn btn-primary" value="<?php echo $btn_tittle; ?>" name="save">
    </form>
  </div>
</div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/icons.js"></script>
    <script>
  feather.replace();
</script>
</body>
</html>
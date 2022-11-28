<?php
$success=0;
$invalid=0;
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'webpage.php';
    $email=$_POST['email'];
    $password=$_POST['password'];   


    $sql="select * from `user` where 
    email='$email' and password='$password'";
    $result=mysqli_query($connection, $sql);

    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $data = $result->fetch_all(PDO::FETCH_ASSOC);

            if(is_array($data) && count($data) > 0){
                $_SESSION['myName']= $data[0][3]  ." ". $data[0][4]; // get f_name, l_name
                $_SESSION['myRank']= $data[0][7]; // get rank
                $_SESSION['email'] = $email; // get
                $_SESSION['id'] = $data[0][0]; // get Id
            }
            $success=1;
            header('location:FramePage.php');
        }
        else{
            $invalid=1;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login Page!</title>
</head>

<body style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;">

<?php 
if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Inavlid login!</strong> Wrong password or email!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
    <div class="container">
        <form action="loggedin.php" method="post" target="_parent">
            <h1 class="text-center"> Welcome to the Music Library</h1>

            <p> Please Login by entering the following information</p>
            <div class="form-group">
                <label for="exampleInputEmail1">Enter Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">Your email will not be shared withanyone.    </small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Enter Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>

            <small id="signup" class="form-text text-muted">To sign-up click on the following link:
                <a href="signup.php#signup" target="signedup">Sign-up!</a><br/> </small>
            <br>


            <button type="submit" class="btn btn-primary">Login</button>
            <button type="reset" class="btn btn-primary">Clear Fields</button>


        </form>
    </div>
</body>
</html>
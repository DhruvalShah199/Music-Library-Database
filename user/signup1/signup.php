<?php
$user=0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'webpage.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phoneNum=$_POST['phoneNum'];
    $age=$_POST['age'];

    $sql="select * from `user` where
    email='$email'";

    $result=mysqli_query($connection, $sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $user=1;
        }
        else{
            $sql="insert into `user`(email, password, f_name, l_name, phonenum, age)
             values('$email', '$password', '$fname', '$lname', '$phoneNum', '$age')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                header('location:loggedin.php');
            } else {
                die(mysqli_error($connection));
            }

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

    <title>Sign up</title>
</head>

<body id="signup" style="background: url(bgimage.png) no-repeat; background-size: cover; color:white;">

<?php 
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ooops!</strong> Looks like you already have an account!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
    <div class="container">
        <form action="signup.php" method="post">
            <h1 class="text-center">Music Library Sign-up</h1>

            <p> Please fill out every field to ensure that your sign-up is successful</p>
            <div class="form-group">
                <label for="inputEmail">Enter Email address</label>
                <input type="text" pattern="([A-Za-z]{1})([A-Za-z0-9]){1,}([A-Za-z0-9_.]){1,}([A-Za-z0-9_]{1,})@([A-Za-z0-9]{2,})[.]([A-Za-z]{2,4})$" required class="form-control" id="inputEmail" aria-describedby="emailHelp"
                    placeholder="name@example.com" name="email" >
            </div>
            <div class="form-group">
                <label for="inputPassword">Enter Password</label>
                <input type="password" required class="form-control" id="inputPassword" placeholder="Password" name="password">
            </div>

            <div class="form-group">
                <label for="inputFname">Enter Given Name</label>
                <input type="text" required class="form-control" id="inputFname" placeholder="Given Name" name="fname">
            </div>

            <div class="form-group">
                <label for="inputLname">Enter Surname Name</label>
                <input type="text" required class="form-control" id="inputLname" placeholder="Surname Name" name="lname">
            </div>

            <div class="form-group">
                <label for="inputPhoneNum">Enter Phone Number</label>
                <input type="text" required class="form-control" id="inputPhoneNum" placeholder="Enter Phone Number" name="phoneNum">
            </div>

            <div class="form-group">
                <label for="inputAge">Enter Your Age</label>
                <input type="number" required class="form-control" id="inputAge" placeholder="Enter your age" name="age">
            </div>

            <button type="submit" class="btn btn-primary">Sign up</button>
            <button type="reset" class="btn btn-primary">Clear Fields</button>

            <br>
            <br>
            <small id="loggedin" class="form-text text-muted">To go back to the log-in page:
            <a href="loggedin.php#loggedin" target="loggedin">Log-in!</a><br/> </small>
        </form>
    </div>
</body>
</html>
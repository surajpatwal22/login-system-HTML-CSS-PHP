<?php
$showAlert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        include 'partials/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["confirmpassword"]; 

        $newsql = "SELECT * FROM `users` WHERE username = '$username'";
        $result =  mysqli_query($conn, $newsql);
        
        // Checking for existing user with the same name
        $newnum = mysqli_num_rows($result);
        if ($newnum > 0) {
            echo "<script>alert('Username already exists! Please try a different one.');</script>";
        }else{
            if (($password == $cpassword)  && !empty($username) && !empty($password)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ( '$username', '$hash', current_timestamp());";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location: signup.php");
                    exit();
                } else {
                    die("Error: " . mysqli_error($conn));
                }
            
        }
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($showAlert) {
        echo ' <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        User created successfully!
      </div>
      <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div> ';
    }

    ?>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 ">
                <div class="card my-2">
                    <form class="card-body cardbody-color p-lg-4" action="/loginSystem/signup.php" method="post">
                        <div class="text-center">
                            <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" aria-describedby="emailHelp"
                                name="username" placeholder="Enter user name" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="cpassword" name="confirmpassword"
                                placeholder="Confirm password" required>
                        </div>
                        <div class="text-center"><button type="submit"
                                class="btn btn-color bg-warning px-5 mb-5 ">Sign-Up</button></div>
                        <div id="emailHelp" class="form-text text-center  text-dark">Already
                            Registered? <a href="/loginSystem/login.php" class="text-dark fw-bold"> Want to Log in</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
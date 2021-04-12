<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="main-bg">
    <div></div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uID = strtoupper($_POST['userID']);
        $uPass = $_POST['userPass'];

        $servername = "localhost";
        $username = "root";
        $pass = "";
        $db = "votingdb";

        // crate a connection
        $conn = mysqli_connect($servername, $username, $pass, $db);
        // die if conncetion not successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "select * from `users` where `enrollid` = '$uID' and `password` = '$uPass'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            if ($numRows == 1) {
                $_SESSION['currUserID'] = $uID;
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Correct credentials.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
                header("Location: voterprofile.php");
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Incorrect credentials.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
            }
        }
    }
    ?>
    <div class="login-container text-c animated flipInX">
        <div>
            <h1 class="text-darkyellow">Voting System | IIITA</h1>
            <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
        </div>
        <h3 class="text-whitesmoke">Sign In</h3>
        <div class="container-content">
            <form class="margin-t" action="./login.php" method="post">
                <div class="form-group">
                    <input type="text" name="userID" id="userID" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="userPass" id="userPass" class="form-control" placeholder="*****" required="">
                </div>
                <button type="submit" class="form-button button-l margin-b">Sign In</button>

                <!-- <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a> -->
                <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                <a class="text-darkyellow" href="./signup.php"><small>Register</small></a>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>

</html>
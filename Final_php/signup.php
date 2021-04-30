<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link rel="stylesheet" href="./css/signup.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Register</title>
</head>

<body class="main-bg">
    <!-- <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand mx-auto" href="#" style="color: coral">EVOTE</a>
    </nav> -->
    <?php
    // echo "currUserID".$_SESSION['currUserID']."<br>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $enrollid = strtoupper($_POST['enrollid']);
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];
        $cnfPassword = $_POST['cnfPassword'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $course = $_POST['course'];
        $batchyear = $_POST['batchyear'];
        $cgpa = $_POST['cgpa'];
        $gender = $_POST['gender'];

        // data check
        if ($password and $password != $cnfPassword) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Passwords didn\'t match.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
        } else {
            if ($enrollid && $name && $dob and $email && $course and $batchyear && $gender) {
                // echo "none is null";
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
                    $sql = "INSERT INTO `users`
                    (`enrollid`,
                    `name`,
                    `birthdate`,
                    `mobile`,
                    `email`,
                    `course`,
                    `batchyear`,
                    `gender`,
                    `cgpa`,
                    `password`)
                    VALUES
                    ('$enrollid',
                    '$name',
                    '$dob',
                    '$phone',
                    '$email',
                    '$course',
                    $batchyear,
                    '$gender',
                    $cgpa,
                    '$password')";

                    if (mysqli_query($conn, $sql)) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> New account added successfully. Now goto login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Fill all the details.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
            }
        }
    }
    ?>
    <div class="intro-area">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <div>
                        <!-- <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" /> -->
                        <img src="http://cdn.onlinewebfonts.com/svg/img_532042.png" alt="" />
                    </div>
                    <h3>Welcome</h3>
                    <p></p>
                    <span>Already have an account?</span>
                    <div class="center"><a class="btnlogin" href="./index.php">Login</a></div>
                    <!-- <a href="./index.php" class="">Login</a> -->
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Signup</h3>
                            <form action="./signup.php" method="post" class="row register-form">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enrollement ID *" value="" name="enrollid" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name *" value="" name="name" />
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" placeholder="Date Of Birth *" name="dob" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" value="" name="password" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password *" value="" name="cnfPassword" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Your Phone *" value="" name="phone" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Course *" value="" name="course" />
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="Batch year *" value="" min="0" name="batchyear" />
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" placeholder="CGPA *" value="" step='0.01' name="cgpa" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" max-length="1" placeholder="Gender(M/F)" pattern="[MF]" name="gender" />
                                    </div>
                                    <input type="submit" class="btnRegister" value="Signup" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>

</html>
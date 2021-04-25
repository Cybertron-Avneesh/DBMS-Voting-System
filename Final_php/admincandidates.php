<?php
function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "votingdb";

    // crate a connection
    $conn = mysqli_connect($servername, $username, $pass, $db);
    return $conn;
}

$conn = getConnection();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/admincandidates.css" />
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/table.css" />
    <title>Admin Candidates</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark" style="padding-bottom: 15px;">
        <a class="navbar-brand mx-auto" href="#" style="color: coral">Candidates</a>
        <a href="#">
            <img src="images/logout.png" alt="" style="width: 40px" />
        </a>
    </nav>
    <div class="page-wrapper chiller-theme">
        <a id="show-sidebar" class="btn btn-lg btn-dark" href="#" style="z-index: 5;">
            <i class="fas fa-lg fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a>Welcome</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture" />
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>
                                Admin
                            </strong>
                        </span>
                    </div>
                </div>

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="sidebar-dropdown">
                            <a href="./adminelections.php">
                                <i class="fa fa-calendar"></i>
                                <span>Elections</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="./admincandidates.php" id="activated">
                                <i class="fa fa-users"></i>
                                <span>Candidates</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="./adminvoter.php">
                                <i class="fa fa-users"></i>
                                <span>Voters</span>
                            </a>
                        </li>



                        <li class="sidebar-dropdown">
                            <a href="./adminliveresult.php">
                                <i class="fa fa-chart-line"></i>
                                <span>Live Results</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div>
        </nav>
    </div>
    <!-- sidebar-wrapper  -->

    <!-- Add your Div here  -->
    <div class="main">
        <div class="container">
            <div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'Select') {
                    if ($conn) {
                        $enrollid = strtoupper($_POST['enrollid']);
                        $eid = $_POST['eid'];
                        $sql = "UPDATE `candidates` set isselected = b'1'
								where cid='$enrollid' and eid=$eid";
                        // echo $sql;
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong> ' . $enrollid . ' selected as a valid candidates for election id: ' . $eid . '.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Warning!</strong> Error selecting a candidate.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
                        }
                    } else {
                        echo "Connection error";
                    }
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'Deselect') {
                    if ($conn) {
                        $enrollid = strtoupper($_POST['enrollid']);
                        $eid = $_POST['eid'];
                        $sql = "UPDATE `candidates` set isselected = b'0'
								where cid='$enrollid' and eid=$eid";
                        // echo $sql;
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong>' . $enrollid . ' unselected from election id: ' . $eid . '.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Warning!</strong> Error updated election.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
                        }
                    } else {
                        echo "Connection error";
                    }
                }
                ?>
                <form class="form-horizontal" role="form" method="post" action="./admincandidates.php">
                    <input type="hidden" name="action" value="update">

                    <div class="form-group container-fluid">
                        <label class="col-lg-3 control-label">Election ID(eid):</label>
                        <div class="col-lg-8">
                            <!-- Read This! The date input takes dafault value in the format of YYYY-MM-DD -->
                            <input class="form-control" type="number" value="0" min="0" name="eid" />
                        </div>
                    </div>

                    <div class="form-group container-fluid">
                        <label class="col-lg-3 control-label">Enroll ID to select/deselect</label>
                        <div class="col-lg-8">
                            <!-- Read This! The date input takes dafault value in the format of YYYY-MM-DD -->
                            <input class="form-control" type="text" value="" name="enrollid" />
                        </div>
                    </div>


                    <div class="form-group container-fluid">
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-success" value="Select" name="action" />
                            <input type="submit" class="btn btn-warning" value="Deselect" name="action" />
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="table-wrapper-scroll-y my-custom-scrollbar table-sm table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th scope="col">EID</th>
                        <th scope="col">Candidate Enrollment ID</th>
                        <th scope="col">Candidate Name</th>
                        <th scope="col">Is Selected?<br>0: No, 1: Yes</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($conn) {
                            $sql = "select candidates.eid, candidates.cid, candidates.isselected, users.name
                            from candidates
                            inner join users
                            where candidates.cid = users.enrollid
                            order by eid desc";
                            // echo $sql;
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // echo var_dump($row);
                                    // echo json_encode($row);
                                    // echo "<br>";
                                    echo '<tr>
											<th scope="row">' . $row['eid'] . '</th>
											<td>' . $row['cid'] . '</td>
											<td>' . $row['name'] . '</td>
											<td>' . $row['isselected'] . '</td>
											</tr>';
                                }
                            } else {
                                echo '<tr>
										<td colspan="5">No candidates found.</td>
									</tr>';
                            }
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Warning!</strong> Error communicating to server.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">×</span>
									</button>
								  </div>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
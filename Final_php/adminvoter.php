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

	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/adminvoter.css" />
	<script src="js/main.js"></script>
	<link rel="stylesheet" href="css/table.css" />
	<title>Admin | Voter</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Voters</a>
		<a href="./login.php">
			<img src="images/logout.png" alt="" style="width: 40px" />
		</a>
	</nav>
	<div class="page-wrapper chiller-theme">
		<a id="show-sidebar" class="btn btn-lg btn-dark" href="#">
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
								<i class="fa fa-chart-line"></i>
								<span>Elections</span>
							</a>
						</li>

						<li class="sidebar-dropdown">
							<a href="./admincandidates.php">
								<i class="fa fa-chart-line"></i>
								<span>Candidates</span>
							</a>
						</li>

						<li class="sidebar-dropdown">
							<a href="./adminvoter.php" id="activated">
								<i class="fa fa-chart-line"></i>
								<span>Voters</span>
							</a>
						</li>

						<li class="sidebar-dropdown">
							<a href="#">
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
				<a href="./login.php">
					<i class="fa fa-power-off"></i>
				</a>
			</div>
		</nav>
	</div>
	<!-- sidebar-wrapper  -->

	<!-- Add your Div here  -->
	<div class="main">
		<div class="container">
			<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-delete-tab" data-toggle="pill" href="#pills-delete" role="tab" aria-controls="pills-delete" aria-selected="true">Delete</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-list-tab" data-toggle="pill" href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="false">List</a>
				</li>
			</ul>

			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
					<form class="" action="./adminvoter.php" method="post">
						<div class="form-group container-fluid">
							<label class="col-lg-4 control-label">Enter the Enrollment ID to be removed:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="" name="enrollID" id="enrollID" />
							</div>
						</div>
						<div class="form-group container-fluid">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input type="submit" class="btn btn-info" value="Remove this voter" />
								<span></span>
							</div>
						</div>
					</form>
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						if ($conn) {
							$sql = "delete from `users` where enrollid='" . $_POST['enrollID'] . "'";
							// echo $sql;
							$result = mysqli_query($conn, $sql);
							if ($result) {
								echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong> ' . $_POST['enrollID'] . ' was removed successfully.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
							} else {
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Warning!</strong> Enrollment ID not removed.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
							}
						} else {
							echo "error";
						}
					}
					?>
				</div>
				<div class="tab-pane fade " id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
					<div class="table-wrapper-scroll-y my-custom-scrollbar table-sm table-responsive">
						<table class="table table-hover">
							<thead>
								<th scope="col">Enroll ID</th>
								<th scope="col">Name</th>
								<th scope="col">DOB<br>(yyyy-mm-dd)</th>
								<th scope="col">Batch</th>
								<th scope="col">Course</th>
								<th scope="col">Gender</th>
								<th scope="col">CGPA</th>
							</thead>
							<tbody>
								<?php
								if ($conn) {
									$sql = "SELECT * FROM `users`";
									// echo $sql;
									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result)) {
										while ($row = mysqli_fetch_assoc($result)) {
											// echo var_dump($row);
											// echo json_encode($row);
											// echo "<br>";
											echo '<tr>
											<th scope="row">' . $row['enrollid'] . '</th>
											<td>' . $row['name'] . '</td>
											<td>' . $row['birthdate'] . '</td>
											<td>' . $row['batchyear'] . '</td>
											<td>' . $row['course'] . '</td>
											<td>' . $row['gender'] . '</td>
											<td>' . $row['cgpa'] . '</td>
											</tr>';
										}
									} else {
										echo '<tr>
										<td colspan="5">No Voters available</td>
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
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
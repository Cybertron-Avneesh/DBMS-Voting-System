<?php
session_start();

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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

	<link rel="stylesheet" href="css/main.css" />
	<script src="js/main.js"></script>
	<link rel="stylesheet" href="css/voterprofile.css">
	<title>Voter | Election List</title>
</head>

<body style="overflow: hidden;">
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Elections</a>
		<a class="nav-link" href="./index.php">
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
								<?php
								echo "" . $_SESSION['currUserID'];
								?>
							</strong>

						</span>
						<!-- <span class="user-role">Role</span> -->
					</div>
				</div>

				<!-- sidebar-search  -->
				<div class="sidebar-menu">
					<ul>
						<li>
							<a href="./voterprofile.php">
								<i class="fa fa-book"></i>
								<span>Profile</span>
							</a>
						</li>
						<li class="active">
							<a href="./voterelectionslist.php" id="activated">
								<i class="fa fa-calendar"></i>
								<span>Available elections</span>
							</a>
						</li>
						<li>
							<a href="./voterapplyforelection.php">
								<i class="fas fa-sign-in-alt"></i>
								<span>Apply as candidate</span>
							</a>
						</li>

						<li>
							<a href="./castvotes.php">
								<i class="fas fa-vote-yea"></i>
								<span>Cast vote</span>
							</a>
						</li>


						<li>
							<a href="./liveresult.php">
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
				<a href="./index.php">
					<i class="fa fa-power-off"></i>
				</a>
			</div>
		</nav>
	</div>
	<!-- sidebar-wrapper  -->

	<!-- Add your Div here  -->

	<div class="intro-area">
		<div class="main main-raised">
			<div class="profile-content">
				<div class="container">
					<span>
						<h1> Elections </h1>
					</span>
					<div class="table-wrapper-scroll-y my-custom-scrollbar table-sm table-responsive">
						<table class="table table-hover">
							<thead>
								<th scope="col">Election ID</th>
								<th scope="col">Title</th>
								<th scope="col">Description</th>
								<th scope="col">Start time<br>(yyyy-mm-dd hh:mm:ss)</th>
								<th scope="col">End time<br>(yyyy-mm-dd hh:mm:ss)</th>
							</thead>
							<tbody>
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
								if ($conn) {
									date_default_timezone_set("Asia/Kolkata");
									$currtime = date("Y-m-d H:i:s", time());
									$sql = "SELECT * FROM `elections` where endtime>" . "'" . $currtime . "'";
									// echo $sql;
									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result)) {
										while ($row = mysqli_fetch_assoc($result)) {
											// echo var_dump($row);
											// echo json_encode($row);
											// echo "<br>";
											echo '<tr>
											<th scope="row">'.$row['eid'].'</th>
											<td>'.$row['title'].'</td>
											<td>'.$row['descriptionelection'].'</td>
											<td>'.$row['starttime'].'</td>
											<td>'.$row['endtime'].'</td>
											</tr>';
										}
									} else {
										echo '<tr>
										<td colspan="5">No elections available</td>
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
								<!-- <tr>
									<th scope="row">1</th>
									<td>Gymkhana - President</td>
									<td>Only available for 3rd year students</td>
									<td>2021-04-21 10:00:00</td>
									<td>2021-04-21 15:00:00</td>
								</tr> -->
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
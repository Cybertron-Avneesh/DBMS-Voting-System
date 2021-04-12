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
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/voterprofile.css">
	<script src="js/main.js"></script>
	<title>Voter | Profile</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Profile</a>
		<a class="nav-link" href="./login.php">
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
						<li class="active">
							<a href="./voterprofile.php" id="activated">
								<i class="fa fa-book"></i>
								<span>Profile</span>
							</a>
						</li>
						<li>
							<a href="./voterelectionslist.php">
								<i class="fa fa-calendar"></i>
								<span>Available elections</span>
							</a>
						</li>
						<li>
							<a href="./voterapplyforelection.php">
								<i class="fa fa-folder"></i>
								<span>Apply as candidate</span>
							</a>
						</li>

						<li>
							<a href="./castvotes.php">
								<i class="fa fa-folder"></i>
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
				<a href="./login.php">
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
					$sql = "SELECT * FROM `users` where enrollid=" . "'" . $_SESSION["currUserID"] . "'";
					// echo $sql;
					$result = mysqli_query($conn, $sql);
					if ($result) {
						while ($row = mysqli_fetch_assoc($result)) {
							// echo var_dump($row);
							// echo json_encode($row);
							// echo "<br>";
							
							echo "<div class='row'>
							<div class='col-md-6 ml-auto mr-auto'>
								<div class='profile'>
									<div class='avatar'>
										<img src='https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg' alt='Circle Image' class='img-raised rounded-circle img-fluid'>
									</div>
									<div class='name'>
										<h3 class='title'>".$row['name']."</h3>
									</div>
								</div>
							</div>
						</div>
						<div style='overflow-x:auto;'>
							<table class='table table-hover'>
								<tbody>
									<tr>
										<th scope='row'>Username</th>
										<td>".$row['enrollid']."</td>
									</tr>
									<tr>
										<th scope='row'>Email</th>
										<td>".$row['email']."</td>
									</tr>
									<tr>
										<th scope='row'>Contact Number</th>
										<td>".$row['mobile']."</td>
									</tr>
									<tr>
										<th scope='row'>Date Of Birth(MM/DD/YYYY)</th>
										<td>".$row['birthdate']."</td>
									</tr>
									<tr>
										<th scope='row'>Gender</th>
										<td>".$row['gender']."</td>
									</tr>
									<tr>
										<th scope='row'>CGPA</th>
										<td>".$row['cgpa']."</td>
									</tr>
									<tr>
										<th scope='row'>Batch Year</th>
										<td>".$row['batchyear']."</td>
									</tr>
									
								</tbody>
							</table>
						</div>";
						}
					} else {
						echo "<strong> No record found.</strong>";
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}

					?>
					<!-- <div class="row">
						<div class="col-md-6 ml-auto mr-auto">
							<div class="profile">
								<div class="avatar">
									<img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
								</div>
								<div class="name">
									<h3 class="title">firstName lastName</h3>
									<h6>User/Admin</h6>
								</div>
							</div>
						</div>
					</div>
					<div style="overflow-x:auto;">
						<table class="table table-hover">
							<tbody>
								<tr>
									<th scope="row">Username</th>
									<td>Dummy</td>
								</tr>
								<tr>
									<th scope="row">Email</th>
									<td>Dummy@gmail.com</td>
								</tr>
								<tr>
									<th scope="row">Contact Number</th>
									<td>1234567891</td>
								</tr>
								<tr>
									<th scope="row">Address</th>
									<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, voluptate?
									</td>
								</tr>
								<tr>
									<th scope="row">Date Of Birth(MM/DD/YYYY)</th>
									<td>08/08/2000</td>
								</tr>
								<tr>
									<th scope="row">Age</th>
									<td>21</td>
								</tr>
							</tbody>
						</table>
					</div> -->

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
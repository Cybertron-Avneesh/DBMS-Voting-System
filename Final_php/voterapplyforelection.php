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
	<link rel="stylesheet" href="css/table.css">
	<title>Voter | Candidate Application</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Apply as Candidate</a>
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
						<li>
							<a href="./voterprofile.php">
								<i class="fa fa-book"></i>
								<span>Profile</span>
							</a>
						</li>
						<li class="active">
							<a href="./voterelectionslist.php">
								<i class="fa fa-calendar"></i>
								<span>Available elections</span>
							</a>
						</li>
						<li>
							<a href="./voterapplyforelection.php" id="activated">
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

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$eid = $_POST['electionID'];
						if ($conn) {
							date_default_timezone_set("Asia/Kolkata");
							$currtime = date("Y-m-d H:i:s", time());

							$sql = "SELECT * FROM `elections` where eid=" . $eid . " and endtime>" . "'" . $currtime . "'";
							// echo $sql;

							$result = mysqli_query($conn, $sql);
							if (mysqli_num_rows($result)) {
								$sql = "INSERT INTO `candidates` (`cid`, `eid`, `isselected`) VALUES ('" . $_SESSION['currUserID'] . "', '" . $eid . "', b'0')";
								// echo $sql;
								$result = mysqli_query($conn, $sql);
								if ($result) {
									echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Success!</strong> Applied successfully for Election ID: ' . $eid . '.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
							  </div>';
								} else {
									echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Warning!</strong> You seem to have already applied for Election ID: ' . $eid . '.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
							  </div>';
								}
							} else {
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Warning!</strong> Error applying for Election ID: ' . $eid . '. Try checking Election ID you provided.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
							  </div>';
							}
						} else {
							echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Warning!</strong> Error communicating to server.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								  <span aria-hidden="true">×</span>
								</button>
							  </div>';
						}
					}
					?>
					<div>
						<form method="post" action="./voterapplyforelection.php">
							<div class="mb-3 ">
								<label for="electionID" class="form-label">Election ID</label>
								<input type="number" class="form-control" id="electionID" name="electionID">
							</div>
							<button type="submit" class="btn btn-primary">Apply</button>
						</form>
					</div>
					<hr>
					<div>
						<h2>Upcoming elections you have applied</h2>
						<table class="table table-hover">
							<thead>
								<th scope="col">Election ID</th>
								<th scope="col">Title</th>
								<th scope="col">Status</th>
							</thead>
							<tbody>
								<?php
								$conn = getConnection();

								if ($conn) {
									date_default_timezone_set("Asia/Kolkata");
									$currtime = date("Y-m-d H:i:s", time());

									$sql = "select candidates.eid, candidates.isselected, elections.title
									from candidates
									inner join elections
									where candidates.cid = '" . $_SESSION['currUserID'] . "' and candidates.eid = elections.eid and endtime>'" . $currtime . "'";
									// echo $sql;

									$result = mysqli_query($conn, $sql);
									// echo var_dump($result);
									if ($result) {
										while ($row = mysqli_fetch_assoc($result)) {
											// echo var_dump($row);
											// echo json_encode($row);
											// echo "<br>";
											echo '<tr>
											<th scope="row">' . $row['eid'] . '</th>
											<td>' . $row['title'] . '</td>
											<td>' . $row['isselected'] . '</td>
											</tr>';
										}
									} else {
										echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Warning!</strong> 
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													  <span aria-hidden="true">×</span>
													</button>
												  </div>';
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
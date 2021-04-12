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

	<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->

	<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/voterprofile.css">
	<script src="js/main.js"></script>
	<title>Voter | Liver Results</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Live Results</a>
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
							<a href="./voterprofile.php">
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
							<a href="./liveresult.php" id="activated">
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
			<div class="profile-content container">
				<!-- <div class="card">
					<div class="card-header">
						Featured
					</div>
					<div class="card-body">
						<h5 class="card-title">Special title treatment</h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div> -->
				<!-- <div class="card-deck">
					<div class="card bg-primary">
						<div class="card-body text-center">
							<p class="card-text">Some text inside the first card</p>
						</div>
					</div>
					<div class="card bg-warning">
						<div class="card-body text-center">
							<p class="card-text">Some text inside the second card</p>
						</div>
					</div>
					<div class="card bg-success">
						<div class="card-body text-center">
							<p class="card-text">Some text inside the third card</p>
						</div>
					</div>
					<div class="card bg-danger">
						<div class="card-header">
							Header
						</div>
						<div class="card-body text-center">
							<p class="card-text">Some text inside the fourth card</p>
						</div>
					</div>
					<div class="card bg-warning">
						<div class="card-body text-center">
							<p class="card-text">Some text inside the second card</p>
						</div>
					</div>
					<div class="card bg-success">
						<div class="card-body text-center">
							<p class="card-text">Some text inside the third card</p>
						</div>
					</div>
					<div class="card bg-danger">
						<div class="card-header">
							Header
						</div>
						<div class="card-body text-center">
							<p class="card-text">Some text inside the fourth card</p>
						</div>
					</div>
				</div> -->
				<!-- <div class="container ">
					<div class="card text-center col-lg-6 col-sm-12">
						<div class="card-header">
							Featured
						</div>
						<div class="card-body">
							<h5 class="card-title">Special title treatment</h5>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
						<div class="card-footer text-muted">
							2 days ago
						</div>
					</div> -->
				<!-- <div class="span6">
						<h5>Poll: Where do you usually browse</h5>
						<strong>Windows PC</strong><span class="pull-right">30%</span>
						<div class="progress progress-danger active">
							<div class="bar" style="width: 30%;"></div>
						</div>
						<strong>Mac</strong><span class="pull-right">40%</span>
						<div class="progress progress-info active">
							<div class="bar" style="width: 40%;"></div>
						</div>
						<strong>iPad/iPhone</strong><span class="pull-right">10%</span>
						<div class="progress progress-striped active">
							<div class="bar" style="width: 10%;"></div>
						</div>
						<strong>Android</strong><span class="pull-right">5%</span>
						<div class="progress progress-success active">
							<div class="bar" style="width: 5%;"></div>
						</div>
						<strong>Others</strong><span class="pull-right">15%</span>
						<div class="progress progress-warning active">
							<div class="bar" style="width: 15%;"></div>
						</div>
						<p>
							<a href="#" class="btn btn-large btn-success">Vote</a>
							<a href="#" class="pull-right">View detailed results</a>
						</p>
					</div> -->

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
					$sql = "SELECT `display_result` from `admincontrol`";
					$result = mysqli_query($conn, $sql);
					if ($result) {
						$display_res = mysqli_fetch_assoc($result)['display_result'];
						if ($display_res) {
							$sql = 'SELECT
								concat(eid, ":", cid) as `eid:cid`,
								COUNT(*) AS `cnt`
							  FROM
								votes
							  GROUP BY
								  concat(eid, ":", cid)';
							$result = mysqli_query($conn, $sql);
							$fin = array();
							while ($row = mysqli_fetch_assoc($result)) {
								$splitted = explode(":", $row['eid:cid']);
								$fin[$splitted[0]][$splitted[1]] = $row['cnt'];
							}
							foreach ($fin as $eid => $value) {
								$sql = "SELECT title from `elections` where eid=$eid";
								$result = mysqli_query($conn, $sql);
								if ($result) {
									$title = mysqli_fetch_assoc($result)['title'];
									echo '<div class="card">
									<div class="card-header">
										' . $eid . ' - ' . $title . '
										</div> <div class="card-body">';
									foreach ($value as $cid => $votes) {
										echo '<h5 class="card-title">' . $cid . ' - ' . $votes . ' votes</h5>';
									}
									echo '	</div>
									</div><br>';
								}
							}
						} else {
							echo '<div class="page-wrap d-flex flex-row align-items-center">
								<div class="container">
									<div class="row justify-content-center">
										<div class="col-md-12 text-center">
											<span class="display-1 d-block">: //</span>
											<div class="mb-4 lead">Live results currently unavailable.</div>
											<a href="./voterprofile.php" class="btn btn-link">Back to Home</a>
										</div>
									</div>
								</div>
							</div>
							';
						}
					} else {
						echo "Error finding result.<br>";
					}
				} else {
				}
				?>
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
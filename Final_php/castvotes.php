<?php
include './castvote_helper.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	global $conn;
	// echo var_dump($_POST);
	// print_r($_POST);

	foreach ($_POST as $eid => $value) {
		$sql = "INSERT into `votes` (enrollid, eid, cid) values ('" . $_SESSION['currUserID'] . "', $eid, '$value')";
		// echo $sql . "<br>";
		$result = mysqli_query($conn, $sql);
		if($result) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Success!</strong> Your votes have been saved successfully. Thanks for voting.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>';
		} else {
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Error!</strong> Some erorr occured while saving your vote. Try to login in again.<br>
			You may contact Admin.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">×</span>
			</button>
		  </div>';
		}
	}
}
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

	<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->

	<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/adminvoter.css" />
	<link rel="stylesheet" href="css/table.css" />
	
	<script src="js/main.js"></script>
	<title>Voter | Cast Votes</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark" style="padding-bottom: 15px;">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Cast your vote</a>
		<a class="nav-link" href="./index.php">
			<img src="images/logout.png" alt="" style="width: 40px" />
		</a>
	</nav>
	<div class="page-wrapper chiller-theme">
		<a id="show-sidebar" class="btn btn-lg btn-dark" href="#" style="z-index:5"> 
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
								<i class="fas fa-sign-in-alt"></i>
								<span>Apply as candidate</span>
							</a>
						</li>

						<li>
							<a href="./castvotes.php" id="activated">
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
				<a href="#">
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
				<div class="card">
					<div class="card-header">
						Available elections
					</div>
					<div class="card-body">
						<?php
						$unVotedElections = getUnVotedElections($_SESSION['currUserID']);
						if (mysqli_num_rows($unVotedElections)) {
							echo '<form action="./castvotes.php" method="post">';
							// --- add elections and their title
							while ($row = mysqli_fetch_assoc($unVotedElections)) {
								$eid = $row['eid'];
								$title = getTitle($row['eid']);
								echo "<h4>$eid" . " - " . "$title</h4>";
								$cand = getCandidatesFor($eid);
								if (mysqli_num_rows($cand)) {
									while ($row = mysqli_fetch_assoc($cand)) {

										// echo "$row['cid'] : "
										echo '<div class="form-check">
												<input class="form-check-input" type="radio" name="' . $eid . '" id="eid_' . $eid . '_cid_' . $row['cid'] . '" value="' . $row['cid'] . '" checked>
												<label class="form-check-label" for="eid_' . $eid . '_cid_' . $row['cid'] . '">
													(' . $row['cid'] . ') ' . $row['name'] . '
												</label>
											</div>';
									}
								} else {
									echo 'NO Candidates applied';
								}
								echo "<hr>";
							}
							echo '<button type="submit" class="form-button btn btn-primary">Vote</button></form>';
							// 	<form action="./" method="post">


							// 	<div class="form-check">
							// 		<input class="form-check-input" type="radio" name="eid1" id="eid1_cidiib9">
							// 		<label class="form-check-label" for="eid1_cidiib9">
							// 			Default checked radio
							// 		</label>
							// 	</div>
							// 	<button type="submit" class="form-button btn btn-primary">Vote</button>
							// </form>

						} else {
							echo '<div class="page-wrap d-flex flex-row align-items-center">
								<div class="container">
									<div class="row justify-content-center">
										<div class="col-md-12 text-center">
											<span class="display-1 d-block">: //</span>
											<div class="mb-4 lead">No elections currently available. You might have already voted.</div>
											<a href="./voterprofile.php" class="btn btn-primary">Back to Home</a>
										</div>
									</div>
								</div>
							</div>
							';
						}
						?>

					</div>
				</div>
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
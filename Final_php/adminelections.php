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
	<link rel="stylesheet" href="css/adminelections.css" />
	<script src="js/main.js"></script>
	<link rel="stylesheet" href="css/table.css"/>
	<title>Admin | Elections</title>
</head>

<body>
	<nav class="navbar navbar-dark bg-dark" style="padding-bottom: 15px;">
		<a class="navbar-brand mx-auto" href="#" style="color: coral">Elections</a>
		<a href="./index.php">
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
								Admin
							</strong>
						</span>
					</div>
				</div>

				<!-- sidebar-search  -->
				<div class="sidebar-menu">
					<ul>
						<li class="sidebar-dropdown">
							<a href="#" id="activated">
								<i class="fa fa-calendar"></i>
								<span>Elections</span>
							</a>
						</li>

						<li class="sidebar-dropdown">
							<a href="./admincandidates.php">
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
				<a href="./index.php">
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
					<a class="nav-link active" id="pills-list-tab" data-toggle="pill" href="#pills-list" role="tab" aria-controls="pills-list" aria-selected="false">List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-create-tab" data-toggle="pill" href="#pills-create" role="tab" aria-controls="pills-create" aria-selected="true">Create</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-update-tab" data-toggle="pill" href="#pills-update" role="tab" aria-controls="pills-update" aria-selected="false">Update</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-delete-tab" data-toggle="pill" href="#pills-delete" role="tab" aria-controls="pills-delete" aria-selected="false">Delete</a>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
					<div class="table-wrapper-scroll-y my-custom-scrollbar table-sm table-responsive">
						<table class="table table-hover">
							<thead>
								<th scope="col">EID</th>
								<th scope="col">Title</th>
								<th scope="col">Description</th>
								<th scope="col">Start time</th>
								<th scope="col">End time</th>
							</thead>
							<tbody>
								<?php
								if ($conn) {
									$sql = "SELECT * FROM `elections`";
									// echo $sql;
									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result)) {
										while ($row = mysqli_fetch_assoc($result)) {
											// echo var_dump($row);
											// echo json_encode($row);
											// echo "<br>";
											echo '<tr>
											<th scope="row">' . $row['eid'] . '</th>
											<td>' . $row['title'] . '</td>
											<td>' . $row['descriptionelection'] . '</td>
											<td>' . $row['starttime'] . '</td>
											<td>' . $row['endtime'] . '</td>
											</tr>';
										}
									} else {
										echo '<tr>
										<td colspan="5">No elections available.</td>
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

				<div class="tab-pane fade" id="pills-create" role="tabpanel" aria-labelledby="pills-create-tab">
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'create') {
						if ($conn) {
							$title = $_POST['title'];
							$description = $_POST['description'];
							$starttime = $_POST['starttime'];
							$starttime = str_replace('T', ' ', $starttime) . ":00";
							$endtime = $_POST['endtime'];
							$endtime = str_replace('T', ' ', $endtime) . ":00";
							$sql = "INSERT INTO `elections` (title, descriptionelection, starttime, endtime) values(
								'$title', '$description', '$starttime', '$endtime'
							)";
							// echo $sql;
							$result = mysqli_query($conn, $sql);
							if ($result) {
								echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong> Election added successfully.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
									  </div>';
							} else {
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Warning!</strong> Error saving new elections.
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
					<form class="form-horizontal" role="form" method="post" action="./adminelections.php">
						<!-- <div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Election ID:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="" />
							</div>
						</div> -->
						<input type="hidden" name="action" value="create">
						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Election Title:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="" name="title" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Description:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="" name="description" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Start Date time:</label>
							<div class="col-lg-8">
								<!-- Read This! The date input takes dafault value in the format of YYYY-MM-DD -->
								<input class="form-control" type="datetime-local" value="" name="starttime" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">End Date time:</label>
							<div class="col-lg-8">
								<!-- Read This! The date input takes dafault value in the format of YYYY-MM-DD -->
								<input class="form-control" type="datetime-local" value="" name="endtime" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input type="submit" class="btn btn-info" value="Start an election" />
								<span></span>
							</div>
						</div>
					</form>
				</div>

				<div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab">
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'update') {
						if ($conn) {
							$eid = $_POST['ueid'];
							$title = $_POST['utitle'];
							$description = $_POST['udescription'];
							$starttime = $_POST['ustarttime'];
							$starttime = str_replace('T', ' ', $starttime) . ":00";
							$endtime = $_POST['uendtime'];
							$endtime = str_replace('T', ' ', $endtime) . ":00";
							$sql = "UPDATE `elections` set title = '$title', descriptionelection='$description', starttime='$starttime', endtime='$endtime'
								where eid=$eid";
							// echo $sql;
							$result = mysqli_query($conn, $sql);
							if ($result) {
								echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong>Success!</strong> Election with EID: '.$eid.' updated successfully.
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
					<form class="form-horizontal" role="form" method="post" action="./adminelections.php">
						<input type="hidden" name="action" value="update">
						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Election ID:</label>
							<div class="col-lg-8">
								<input class="form-control" type="number" value="0" min="0" name="ueid" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Election name:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="" name="utitle" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Description:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" value="" name="udescription" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Start Date:</label>
							<div class="col-lg-8">
								<!-- Read This! The date input takes dafault value in the format of YYYY-MM-DD -->
								<input class="form-control" type="datetime-local" value="" name="ustarttime" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">End Date:</label>
							<div class="col-lg-8">
								<!-- Read This! The date input takes dafault value in the format of YYYY-MM-DD -->
								<input class="form-control" type="datetime-local" value="" name="uendtime" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input type="submit" class="btn btn-info" value="Update it!" />
								<span></span>
							</div>
						</div>
					</form>
				</div>

				<div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
					<?php
					if ($_SERVER['REQUEST_METHOD'] == 'POST'  && $_POST['action'] == 'delete') {
						if ($conn) {
							$sql = "delete from `elections` where eid=" . $_POST['eid'];
							// echo $sql;
							$result = mysqli_query($conn, $sql);
							if ($result) {
								echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong>Success!</strong> Election with EID: ' . $_POST['eid'] . ' was removed successfully.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											  <span aria-hidden="true">×</span>
											</button>
										  </div>';
							} else {
								echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong>Warning!</strong> Error removing election
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
					<form class="form-horizontal" role="form" method="post" action="./adminelections.php">
						<input type="hidden" name="action" value="delete">
						<div class="form-group container-fluid">
							<label class="col-lg-3 control-label">Enter the Election id to be removed:</label>
							<div class="col-lg-8">
								<input class="form-control" type="number" min="0" value="0" name="eid" />
							</div>
						</div>

						<div class="form-group container-fluid">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input type="submit" class="btn btn-info" value="Delete this election" />
								<span></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
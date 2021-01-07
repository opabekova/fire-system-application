<?php
	
	require_once 'db.php';
	require_once 'user.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<?php include "head.php"; ?>
	</head>
	<body>
		<?php
			include 'navbar.php';
		?>
		<div class="container">
			<div class="row mt-3">
				<div class="col-12">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">
					    	Login Page
					    </li>
					  </ol>
					</nav>
				</div>
			</div>
			<div class="row mt-3" style="min-height: 500px;">
				<div class="col-12">
					<h3 class="text-center">SIGN IN</h3>
					<div class="row mt-3">
						<div class="col-6 mx-auto">
							<?php 
								if(isset($_GET['error'])){
						    ?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  Incorrect login or password!
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
						    <?php 
						    	}
						    ?>
							<form action="auth.php" method="post">
								<div class="form-group">
									<label>
										LOGIN : 
									</label>
									<input type="login" class="form-control" name="login">
								</div>
								<div class="form-group">
									<label>
										PASSWORD : 
									</label>
									<input type="password" class="form-control" name="password">
								</div>
								<div class="form-group">
									<button class="btn btn-success">SIGN IN</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){

?>
<!DOCTYPE html>
<html>
	<head>
		<?php include "head.php"; ?>
	</head>
	<body>
		<?php
			require 'navbar.php';
		?>
		<div class="container">
			<div class="row mt-3">
				<div class="col-12">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">
					    	Profile Page
					    </li>
					  </ol>
					</nav>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-6 mx-auto" style="min-height: 600px;">					
					<form>
						<div class="form-group">
							<label>
								LOGIN : 
							</label>
							<input type="login" class="form-control" value="<?php echo $CURRENT_USER['login']; ?>" readonly style = "background-color: white;">
						</div>					
						<div class="form-group">
							<label>
								FULL NAME : 
							</label>
							<input type="text" class="form-control" name="full_name" value="<?php echo $CURRENT_USER['full_name'];?>" readonly>
						</div>
						<div class="form-group">
							<button class="btn btn-success">UPDATE PROFILE</button>
						</div>
					</form>

				</div>
			</div>
		</div>

	</body>
</html>
<?php
	
	}else{

		header("Location:login.php");

	}

?>
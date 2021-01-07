<?php
	require_once 'db.php';
	require_once 'user.php';

	if(ONLINE){

?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			require_once 'head.php';
		?>
	</head>
	<body>
		<?php
			require_once 'navbar.php';
		?>
		<div class="container">
			<div class="row mt-3">
				<div class="col-12">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">
					    	Floors
					    </li>
					  </ol>
					</nav>
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewFloor">
					  + Add New
					</button>
					<div class="modal fade" id="addNewFloor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					  	<form action="toaddfloor.php" method="post">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="staticBackdropLabel">New Floor</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <div class="form-group">
						        	<label>
						        		Name : 
						        	</label>
						        	<input type="text" name="name" class="form-control">
						        </div>
						        <div class="form-group">
						        	<label>
						        		Floor Number : 
						        	</label>
						        	<input type="number" value="0" min = "0" max = "1000" name="floor" class="form-control">
						        </div>					        
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button class="btn btn-primary">Add Floor</button>
						      </div>
						    </div>
						</form>
					  </div>
					</div>					
					<table class="table table-striped mt-3">
						<thead>
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>FLOOR</th>
								<th style="width: 10%;">DETAILS</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$floors = getFloors();
								if($floors!=null){
									foreach($floors as $floor){
							?>
								<tr>
									<td>
										<?php
											echo $floor['id'];
										?>
									</td>
									<td>
										<?php
											echo $floor['name'];
										?>
									</td>
									<td>
										<?php
											echo $floor['floor'];
										?>
									</td>
									<td>
										<a href="readfloor.php?id=<?php echo $floor['id']; ?>" class = "btn btn-info btn-sm">
											DETAILS
										</a>
									</td>		
								</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
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
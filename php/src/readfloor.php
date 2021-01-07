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
					<?php
						if(isset($_GET['id']) && is_numeric($_GET['id'])){
							$floor = getFloor($_GET['id']);
							if($floor!=null){
					?>
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item"><a href="floors.php">Floors</a></li>
						    <li class="breadcrumb-item active" aria-current="page">
						    	<?php
						    		echo $floor['name'].", floor - ".$floor['floor'];
						    	?>
						    </li>
						  </ol>
						</nav>
						<div class="jumbotron mb-3">
						  <h2>
						  	Floor: <?php echo $floor['floor'];?>
						  </h2>
						  <h3>
						  	<?php echo $floor['name']; ?>
						  </h3>
						</div>
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewRoom">
						  + Add New
						</button>
						<div class="modal fade" id="addNewRoom" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg">
						  	<form action="toaddroom.php" method="post">
						  		<input type="hidden" name="floor_id" value="<?php echo $floor['id']; ?>">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="staticBackdropLabel">New Room</h5>
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
							        		Room Number : 
							        	</label>
							        	<input type="number" value="0" min = "0" max = "1000" name="room_number" class="form-control">
							        </div>
							        <div class="form-group">
							        	<label>
							        		Smoke Sensor Device ID:
							        	</label>
							        	<input type="text" name="smoke_detector_id" class="form-control">
							        </div>
							        <div class="form-group">
							        	<label>
							        		Temperature Sensor Device ID:
							        	</label>
							        	<input type="text" name="temperature_sensor_id" class="form-control">
							        </div>
							        <div class="form-group">
							        	<label>
							        		Motion Sensor Device ID:
							        	</label>
							        	<input type="text" name="motion_sensor_id" class="form-control">
							        </div>
									<div class="form-group">
							        	<label>
							        		Manual Alarm Device ID:
							        	</label>
							        	<input type="text" name="temperature_sensor_id" class="form-control">
							        </div>							        
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button class="btn btn-primary">Add Room</button>
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
									<th>ROOM NUMBER</th>
									<th style="width: 10%;">DETAILS</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$rooms = getRoomsByFloorId($floor['id']);
									if($rooms!=null){
										foreach($rooms as $room){
								?>
									<tr>
										<td>
											<?php
												echo $room['id'];
											?>
										</td>
										<td>
											<?php
												echo $room['name'];
											?>
										</td>
										<td>
											<?php
												echo $room['room_number'];
											?>
										</td>
										<td>
											<a href="readroom.php?id=<?php echo $room['id']; ?>" class = "btn btn-info btn-sm">
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
					<?php
							}
						}
					?>
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
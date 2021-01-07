<?php
	require_once 'db.php';
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
					    <li class="breadcrumb-item"><a href="index.php">Sensors</a></li>
					  </ol>
					</nav>
				</div>
			</div>
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addNewSensor">
				+ Add New
			</button>
			<div class="modal fade" id="addNewSensor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
			  	<form action="toaddsensor.php" method="post">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="staticBackdropLabel">New Sensor</h5>
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
				        		Sensor Type : 
				        	</label>
				        	<select class="form-control" name="sensor_type_id">
				        		<?php
				        			$sesnorTypes = getSensorTypes();
				        			if($sesnorTypes!=null){
				        				foreach($sesnorTypes as $sensorType){
				        		?>	
				        			<option value="<?php echo $sensorType['id']; ?>">
				        				<?php
				        					echo $sensorType['name'];
				        				?>
				        			</option>
				        		<?php
				        				}
				        			}
				        		?>
				        	</select>
				        </div>					        
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button class="btn btn-primary">Add Sensor</button>
				      </div>
				    </div>
				</form>
			  </div>
			</div>
			<div class="row mt-3">
				<div class="col-12">
					<table class="table">
						<thead>
							<th>
								SENSOR ID
							</th>
							<th>
								SENSOR NAME
							</th>
							<th>
								SENSOR TYPE
							</th>
							<th>
								SENSOR STATUS
							</th>							
							<th style="width: 20%;">
								SENSOR STATUS
							</th>														
						</thead>
						<tbody>
							<?php
								
								$sensors = getSensors();

								if($sensors!=null){
									foreach($sensors as $sensor){
										$activeStatus = "success";
										if($sensor['active']==1){
											$activeStatus = "danger";
										}
							?>
								<tr>
									<td>
										<?php echo $sensor['id']; ?>
									</td>
									<td>
										<?php echo $sensor['name']; ?>
									</td>
									<td>
										<?php echo $sensor['sensor_type_name']; ?>
									</td>
									<td>
										<div class="spinner-grow spinner-grow-sm text-<?php echo $activeStatus; ?>" role="status" id = "temperature_sensor_status_indicator">
											<span class="sr-only">Loading...</span>
										</div>
									</td>
									<td>
										<a href="sensordetails.php?id=<?php echo $sensor['id']; ?>" class = "btn btn-primary btn-sm">
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
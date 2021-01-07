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
							$room = getRoom($_GET['id']);
							if($room!=null){
					?>
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
						    <li class="breadcrumb-item"><a href="floors.php">Floors</a></li>
						    <li class="breadcrumb-item">
						    	<a href="readfloor.php?id=<?php echo $room['floor_id']; ?>">
						    		<?php echo $room['floor_name']?>, floor - <?php echo $room['floor']; ?>
						    	</a>
						    </li>
						    <li class="breadcrumb-item active" aria-current="page">
						    	<?php
						    		echo $room['name'].", room number - ".$room['room_number'];
						    	?>
						    </li>
						  </ol>
						</nav>
						<div class="jumbotron">
						  <h2>
						  	Room number: <?php echo $room['room_number'];?>
						  </h2>
						  <h3>
						  	<?php echo $room['name']; ?>
						  </h3>
						  <div class="row mt-4">
						  	<div class="col-12">
						  		<table class="table">
						  			<thead>
						  				<tr>
						  					<th>
						  						Sensor
						  					</th>
						  					<th>
						  						Status
						  					</th>
						  					<th>
						  						Manual Control
						  					</th>
						  				</tr>
						  			</thead>
						  			<tbody>
							  			<tr>
							  				<td>
							  					Temperature Sensor Status: 
							  				</td>
							  				<td>
							  					<?php
							  						$temperatureClass = "success";
							  						if($room['temperature_sensor_status']==1){
							  							$temperatureClass = "danger";
							  						}
							  					?>
												<div class="spinner-grow spinner-grow-sm text-<?php echo $temperatureClass; ?>" role="status" id = "temperature_sensor_status_indicator">
												  <span class="sr-only">Loading...</span>
												</div>						  					
							  				</td>
							  				<td>
							  					<div class="custom-control custom-switch">
												  <input type="checkbox" class="custom-control-input" id="temperature_control" onchange="setManualTemperatureStatus(this)" <?php if($room['temperature_sensor_status']==1){ echo "checked"; }?> >
												  <label class="custom-control-label" for="temperature_control"></label>
												</div>
							  				</td>
							  			</tr>
							  			<tr>
							  				<td>
							  					Smoke Sensor Status: 
							  				</td>
							  				<td>
							  					<?php
							  						$smokeClass = "success";
							  						if($room['smoke_sensor_status']==1){
							  							$smokeClass = "danger";
							  						}
							  					?>
												<div class="spinner-grow spinner-grow-sm text-<?php echo $smokeClass; ?>" role="status" id = "smoke_sensor_status_indicator">
												  <span class="sr-only">Loading...</span>
												</div>						  					
							  				</td>
							  				<td>
							  					<div class="custom-control custom-switch">
												  <input type="checkbox" class="custom-control-input" id="smoke_control" onchange="setManualSmokeStatus(this)" <?php if($room['smoke_sensor_status']==1){ echo "checked"; }?> >
												  <label class="custom-control-label" for="smoke_control"></label>
												</div>
							  				</td>
							  			</tr>
										<tr>
							  				<td>
							  					Movement Sensor Status: 
							  				</td>
											<td>
							  					<?php
							  						$movementClass = "success";
							  						if($room['movement_sensor_status']==1){
							  							$movementClass = "danger";
							  						}
							  					?>
												<div class="spinner-grow spinner-grow-sm text-<?php echo $movementClass; ?>" role="status" id = "movement_sensor_status_indicator">
												  <span class="sr-only">Loading...</span>
												</div>						  					
							  				</td>
							  				<td>
							  					<div class="custom-control custom-switch">
												  <input type="checkbox" class="custom-control-input" id="movement_control" onchange="setManualMovementStatus(this)" <?php if($room['movement_sensor_status']==1){ echo "checked"; }?> >
												  <label class="custom-control-label" for="movement_control"></label>
												</div>
							  				</td>							  				
							  			</tr>						  			
							  			<tr>
							  				<td>
							  					Manual Alarm Status: 
							  				</td>
											<td>
							  					<?php
							  						$alarmClass = "success";
							  						if($room['manual_alarm_status']==1){
							  							$alarmClass = "danger";
							  						}
							  					?>
												<div class="spinner-grow spinner-grow-sm text-<?php echo $alarmClass; ?>" role="status" id = "manual_alarm_status_indicator">
												  <span class="sr-only">Loading...</span>
												</div>						  					
							  				</td>
							  				<td>
							  					<div class="custom-control custom-switch">
												  <input type="checkbox" class="custom-control-input" id="alarm_control" onchange="setManualAlarmStatus(this)" <?php if($room['manual_alarm_status']==1){ echo "checked"; }?> >
												  <label class="custom-control-label" for="alarm_control"></label>
												</div>
							  				</td>
							  			</tr>
						  			</tbody>					  			
						  		</table>
						  	</div>
						  </div>
						</div>
						<script type="text/javascript">
							function setManualTemperatureStatus(checkbox) {
								var stat = checkbox.checked;
								$.post(
									"ajax_manual_controller.php",
									{
										act: "room_temperature_manual_set_status",
										room_id: <?php echo $room['id']; ?>, 
										status: stat
									},
									function(response){

										if(stat){
											document.getElementById('temperature_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
										}else{
											document.getElementById('temperature_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-success";
										}
									}
								);
							}
							function setManualSmokeStatus(checkbox) {
								var stat = checkbox.checked;
								$.post(
									"ajax_manual_controller.php",
									{
										act: "room_smoke_manual_set_status",
										room_id: <?php echo $room['id']; ?>, 
										status: stat
									},
									function(response){
										
										if(stat){
											document.getElementById('smoke_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
										}else{
											document.getElementById('smoke_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-success";
										}
									}
								);
							}
							function setManualMovementStatus(checkbox) {
								var stat = checkbox.checked;
								$.post(
									"ajax_manual_controller.php",
									{
										act: "room_movement_manual_set_status",
										room_id: <?php echo $room['id']; ?>, 
										status: stat
									},
									function(response){
										
										if(stat){
											document.getElementById('movement_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
										}else{
											document.getElementById('movement_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-success";
										}
									}
								);
							}

							function setManualAlarmStatus(checkbox) {
								var stat = checkbox.checked;
								$.post(
									"ajax_manual_controller.php",
									{
										act: "room_alarm_set_status",
										room_id: <?php echo $room['id']; ?>, 
										status: stat
									},
									function(response){
										
										if(stat){
											document.getElementById('manual_alarm_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
										}else{
											document.getElementById('manual_alarm_status_indicator').className = "spinner-grow spinner-grow-sm text-success";
										}
									}
								);
							}

							function checkCurrentRoomStatus(){
								$.get("check_current_active_rooms.php", {
									id: <?php echo $room['id']; ?>
								}, function(res){
									var room = JSON.parse(res);
									if(room.length>0){

										if(room[0]['temperature_sensor_status']=="1"){
											
											document.getElementById('temperature_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
											document.getElementById('manual_alarm_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";

											document.getElementById('temperature_control').checked = true;
											document.getElementById('alarm_control').checked = true;

										}else if(room[0]['smoke_sensor_status']=="1"){
											
											document.getElementById('smoke_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
											document.getElementById('manual_alarm_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";

											document.getElementById('smoke_control').checked = true;
											document.getElementById('alarm_control').checked = true;											
										}else if(room[0]['movement_sensor_status']=="1"){
											
											document.getElementById('movement_sensor_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
											document.getElementById('movement_control').checked = true;

										}else if(room[0]['manual_alarm_status']=="1"){

											document.getElementById('manual_alarm_status_indicator').className = "spinner-grow spinner-grow-sm text-danger";
											document.getElementById('alarm_control').checked = true;								
										
										}
									}
								});
							}

						</script>
					<?php
							}
						}
					?>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				setInterval(checkStatus, 2000);
			});

			function checkStatus(){
				$.get("http://localhost/firesensors/check_sensors_status.php",
					{

					},
				function(result){

					var sensors = JSON.parse(result);

					for(i=0;i<sensors.length;i++){
						
						$.post("update_current_sensors.php", {
							id: sensors[i]['id'],
							sensor_type: sensors[i]['sensor_type']
						},
						function(data){
							checkCurrentRoomStatus();
						});
					}

				});
			}
		</script>
	</body>
</html>
<?php
	}else{

		header("Location:login.php");

	}
?>
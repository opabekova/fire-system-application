<?php
	require_once 'db.php';
	$id = 0;
	if(isset($_GET['id'])&&is_numeric($_GET['id'])){
		$id = $_GET['id'];
	}
	$sensor = getSensor($id);
	if($sensor!=null && $sensor['id']!=null){
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
					    <li class="breadcrumb-item active" aria-current="page">
							<?php
								echo $sensor['name'];
							?>
						</li>
					  </ol>
					</nav>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-12">
					<div class="jumbotron">
					  <h1 class="display-4">
					  	<?php
					  		echo $sensor['name'];
					  	?>
					  </h1>
					  <p class="lead">
					  	<?php
					  		echo $sensor['sensor_type_name'];
					  	?>
					  </p>
					  <hr class="my-4">
					  <p>
					  	<?php
					  		$activeStatus = "success";
							if($sensor['active']==1){
								$activeStatus = "danger";
							}
					  	?>
					  	<div class="spinner-grow spinner-grow-sm text-<?php echo $activeStatus; ?>" role="status" id = "temperature_sensor_status_indicator">
							<span class="sr-only">Loading...</span>
						</div>
						<div class="custom-control custom-switch mt-2">
						  <input type="checkbox" class="custom-control-input" id="manual_switch" onchange="setManualSwitch(this)" <?php if($sensor['active']==1){ echo "checked='checked'"; }?> >
						  <label class="custom-control-label" for="manual_switch"></label>
						</div>					  	
					  </p>
					</div>
					<script type="text/javascript">

						function setManualSwitch(input){

							var stat = input.checked;

							$.post(
								"ajax_manual_controller.php",
								{
									act: "manual_switch",
									sensor_id: <?php echo $sensor['id']; ?>, 
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
					</script>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	
	}else{

		header("Location:index.php");

	}

?>
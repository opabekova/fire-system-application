<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #174963;">
  <a class="navbar-brand" href="index.php">
  	<b><?php echo SITE_NAME; ?></b>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  	<?php
      if(ONLINE){
    ?>
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="profile.php">
	        	<?php
	        		echo $CURRENT_USER['full_name']; 
	        	?>
	        </a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="logout.php">Logout</a>
	      </li>      
	      <li class="nav-item">
	        <a class="nav-link" href="floors.php">Floors</a>
	      </li>
	    </ul>
    <?php
    	}else{
    ?>
 	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Home</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="login.php">Login</a>
	      </li>
	    </ul>   	
    <?php
    	}
    ?>    
  </div>
</nav>
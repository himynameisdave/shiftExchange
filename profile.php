

<h4 class='profName'><?php 

	echo $_SESSION['first_name']." ".$_SESSION['last_name']; 

?></h4>

<ul class='profOptions'>

	<li><a id='postClicker' href='#'>Post A Shift</a></li>|
	<li><a href='#'>My Shifts</a></li>|
	<li><a href="<?php echo $_SERVER['PHP_SELF'];?>?logout=true">Logout</a></li>

</ul>


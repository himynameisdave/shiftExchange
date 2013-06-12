<?php
		
	session_start();

//	IS SOMEONE TRYING TO REGISTER!?
	if(isset($_POST['registerSubmit'])){
		
	 	//Database Connection Data
	    mysql_connect("localhost", "root", "") or die(mysql_error());
	    mysql_select_db("shiftExchange") or die(mysql_error());
		
		$encPass = md5($_POST['regPassword2']);		
		
		$q = "INSERT INTO employees (first_name, last_name, email, password)
			VALUES ( '{$_POST[firstName]}','{$_POST[lastName]}','{$_POST[regEmail]}','{$encPass}' )";

		$e = mysql_query($q);
		
	}
	
  include('inc/class.login.php');

  $login = new Login();

  if($login->isLoggedIn()){
    $showProfile = 1;
    }
  else{
    $showProfile = 0;
   }
   if(isset($_GET['logout'])){
	   $login->logOut();
	   header("Location: ".$_SERVER['PHP_SELF']."");
   }
	
	$token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));	
	
	
/*	Begin actual output	*/
	require_once("header.php");
	
	if($showProfile > 0){
		
		require_once("profile.php");
		
	}else{
    	$login->showErrors();
		require_once("loginForm.php");
		
	}
		
?>

</div>
<div class='clearer'></div>

	
</div><!--End of topbar -->

<div id="main">
	
	<div id="register" class='post'>
				
		<h3 class="postHead">Register</h3>
		
		<a href='#' class='close'>&#88;</a>
		
		<div class='postCont'>			
			<form id="registerForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" autocomplete="off">
				<fieldset>
					<label for='firstName'>First Name:</label>
					<input name='firstName' type='text' autocomplete="off" class='postInput' autofocus	/>
					
					<label for='lastName'>Last Name:</label>
					<input name='lastName' type='text' autocomplete="off" class='postInput'	/>
				</fieldset>
				
				<fieldset>
					<label for='email'>E-mail:</label>
					<input name='regEmail' type='text' autocomplete="off" class='postInput'	/>
				</fieldset>
				
				<fieldset>
					<label for='password1'>Password:</label>
					<input name='regPassword1' type='password' autocomplete="off" class='postInput'	/>
					
					<label for='password2'>Again, please:</label>
					<input name='regPassword2' type='password' autocomplete="off" class='postInput'	/>
				</fieldset>
				
				<input type="submit" name="registerSubmit" value="Register Me!" />
				
			</form>
		</div>
			
	</div>
	
	<!--The hidden 'Add A Shift' section-->
	<div id="postShift" class='post'>
	
		<h3 class="postHead">Post A Shift</h3>
		
		<a href='#' class='close'>&#88;</a>
		
		<div class="postCont">

			<form id="postShiftForm" method="post" action="#" autocomplete="off">
				
				<fieldset>
					<label for='typeDropdown'>Shift Type:</label>
					<select name='typeDropdown' class="postDropdown">
						<option value=''>Guarding</option>
						<option value=''>Instructional</option>
						<option value=''>WP/SL</option>
						<option value=''>Changeroom</option>
						<option value=''>Cash</option>
						<option value=''>Exeter</option>
						<option value=''>Head Guard</option>
						<option value=''>Head Instructor</option>
					</select>
				
					<label for='poolDropdown'>Pool:</label>
					<select name='poolDropdown' class="postDropdown">
						<option value='MCC'>MCC</option>
						<option value='ACC'>ACC</option>
						<option value='ARC'>ARC</option>
						<option value='OP'>OP</option>
					</select>
				
				</fieldset>
				<fieldset>
					<label for='startDropdown'>Start Time:</label>
					<select name='startDropdown' class="postDropdown">
						<option value='06:00'>6:00am</option>
						<option value='06:30'>6:30am</option>
						<option value='07:00'>7:00am</option>
						<option value='07:30'>7:30am</option>
						<option value='08:00'>8:00am</option>
						<option value='08:30'>8:30am</option>
						<option value='9:00'>9:00am</option>
						<option value='9:30'>9:30am</option>
						<option value='10:00'>10:00am</option>
						<option value='10:30'>10:30am</option>
						<option value='11:00'>11:00am</option>
						<option value='11:30'>11:30am</option>
						<option value='12:00'>12:00pm</option>
						<option value='12:30'>12:30pm</option>
						<option value='13:00'>1:00pm</option>
						<option value='13:30'>1:30pm</option>
						<option value='14:00'>2:00pm</option>
						<option value='14:30'>2:30pm</option>
						<option value='15:00'>3:00pm</option>
						<option value='15:30'>3:30pm</option>
						<option value='16:00'>4:00pm</option>
						<option value='16:30'>4:30pm</option>
						<option value='17:00'>5:00pm</option>
						<option value='17:30'>5:30pm</option>
						<option value='18:00'>6:00pm</option>
						<option value='18:30'>6:30pm</option>
						<option value='19:00'>7:00pm</option>
						<option value='19:30'>7:30pm</option>
						<option value='20:00'>8:00pm</option>
						<option value='20:30'>8:30pm</option>
						<option value='21:00'>9:00pm</option>
						<option value='21:30'>9:30pm</option>
						<option value='22:00'>10:00pm</option>
						<option value='22:30'>10:30pm</option>
						<option value='23:00'>11:00pm</option>
					</select>
					
					<label for='endDropdown'>End Time:</label>
					<select name='endDropdown' class="postDropdown">
						<option value='06:00'>6:00am</option>
						<option value='06:30'>6:30am</option>
						<option value='07:00'>7:00am</option>
						<option value='07:30'>7:30am</option>
						<option value='08:00'>8:00am</option>
						<option value='08:30'>8:30am</option>
						<option value='9:00'>9:00am</option>
						<option value='9:30'>9:30am</option>
						<option value='10:00'>10:00am</option>
						<option value='10:30'>10:30am</option>
						<option value='11:00'>11:00am</option>
						<option value='11:30'>11:30am</option>
						<option value='12:00'>12:00pm</option>
						<option value='12:30'>12:30pm</option>
						<option value='13:00'>1:00pm</option>
						<option value='13:30'>1:30pm</option>
						<option value='14:00'>2:00pm</option>
						<option value='14:30'>2:30pm</option>
						<option value='15:00'>3:00pm</option>
						<option value='15:30'>3:30pm</option>
						<option value='16:00'>4:00pm</option>
						<option value='16:30'>4:30pm</option>
						<option value='17:00'>5:00pm</option>
						<option value='17:30'>5:30pm</option>
						<option value='18:00'>6:00pm</option>
						<option value='18:30'>6:30pm</option>
						<option value='19:00'>7:00pm</option>
						<option value='19:30'>7:30pm</option>
						<option value='20:00'>8:00pm</option>
						<option value='20:30'>8:30pm</option>
						<option value='21:00'>9:00pm</option>
						<option value='21:30'>9:30pm</option>
						<option value='22:00'>10:00pm</option>
						<option value='22:30'>10:30pm</option>
						<option value='23:00'>11:00pm</option>
					</select>
				</fieldset>
				<fieldset>
					<label for='shiftDate'>Shift Date:</label>
					<input id='pickDate' type='text' name='shiftDate' class='postInput' />						
				</fieldset>
				
					<input type="submit" name="postShiftSubmit" value="Post This Shift" />

			</form>
		</div>
	</div><!--End postshift div-->
	
	<h2 class="available">Available Shifts</h2>

<?php
	
	//Database Connection Data
    mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("shiftExchange") or die(mysql_error());
    
    unset($data);
    $data = mysql_query("SELECT * FROM shifts");
	while($row = mysql_fetch_array($data))	{
		
		$pool = $row['pool'];
		$type = $row['type'];
		$startTime = $row['start_time'];
		$endTime = $row['end_time'];
		$shiftDate = $row['shift_date'];
		$hrs = $row['shift_length'];
		
		echo "<!--NEW SHIFT POST-->
			<div class='post'>
				<a href='' class='poolIcon ".$pool."'></a>
				<h3 class='postHead'>".$type."</h2>
				<div class='postCont'>
				<p class='content'>***SOMEONE*** is looking for someone to take their ".$startTime." - ".$endTime." guarding shift on ".$shiftDate."</p>	
				<h5 class='hrsNum'>$hrs<span class='hrs'> hrs</span></h5>				
			</div>
			
		</div>";
		
	};//	End of while loop
	
	require_once("footer.php");	
	
?>
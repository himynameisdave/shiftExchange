<form id='loginForm' method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

	<input type='text' name='email' placeholder="E-mail" autocomplete="no"	autofocus/>
	<input type='password' name='password' placeholder="Password" autocomplete="no"	/>
	<input type='submit' name='login' value='Login'	/>

<ul class='profOptions'>
	<input type="hidden" name="token" value="<?php echo $token;?>" />
	<li>Not a member?</li>
	<li><a id='registerClick' href='#'>Register Now!</a></li>
</ul>
</form>


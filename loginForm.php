<form id='loginForm' autocomplete="off" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

	<input type='text' name='email' placeholder="E-mail" autocomplete="off"	autofocus/>
	<input type='password' name='password' placeholder="Password" autocomplete="off"	/>
	<input type='submit' name='login' value='Login'	/>

<ul class='profOptions'>
	<input type="hidden" name="token" value="<?php echo $token;?>" />
	<li>Not a member?</li>
	<li><a id='registerClick' href='#'>Register Now!</a></li>
</ul>
</form>


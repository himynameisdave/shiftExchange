<?php

class Login
{
  private $_id;
  private $_email;
  private $_password;
  private $_passmd5;

  private $_errors;
  private $_access;
  private $_login;
  private $_token;

  public function __construct()
  {
    $this->_errors = array();
    $this->_login  = isset($_POST['login'])? 1 : 0;
    $this->_access = 0;
    $this->_token  = $_POST['token'];

    $this->_id       = 0;
    $this->_email = ($this->_login)? $this->filter($_POST['email']) : $_SESSION['email'];
    $this->_password = ($this->_login)? $this->filter($_POST['password']) : '';
    $this->_passmd5  = ($this->_login)? md5($this->_password) : $_SESSION['password'];
  }

  public function isLoggedIn()
  {
    ($this->_login)? $this->verifyPost() : $this->verifySession();

    return $this->_access;
  }

  public function logOut () {
		session_start();
		session_unset();  // destroy $_SESSION ram
		session_destroy();  // destroy $_SESSION file
		session_write_close();
		$this->_access = 0;
  }

  public function filter($var)
  {
    return $var;
    //preg_replace('/[^a-zA-Z0-9]/','',$var);
  }

  public function verifyPost()
  {
    try
    {
      if(!$this->isTokenValid())
         throw new Exception('Invalid Form Submission');

      if(!$this->isDataValid())
         throw new Exception('Invalid Form Data');

      if(!$this->verifyDatabase())
         throw new Exception('Invalid Email/Password');

    $this->_access = 1;
    $this->registerSession();
    }
    catch(Exception $e)
    {
      $this->_errors[] = $e->getMessage();
    }
  }

  public function verifySession()
  {
    if($this->sessionExist() && $this->verifyDatabase())
       $this->_access = 1;
  }

  public function verifyDatabase()
  {
    //Database Connection Data
    mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("shiftExchange") or die(mysql_error());

    $data = mysql_query("SELECT employee_id, first_name, last_name FROM employees WHERE email = '{$this->_email}' AND password = '{$this->_passmd5}'");

    if(mysql_num_rows($data))
      {
        list($this->_id,$_SESSION['first_name'],$_SESSION['last_name']) = @array_values(mysql_fetch_assoc($data));
        return true;
      }
    else
      { return false; }
      
      
  }

  public function isDataValid()
  {
    return true;
    //(preg_match('/^[a-zA-Z0-9]{5,12}$/',$this->_email) && preg_match('/^[a-zA-Z0-9]{5,12}$/',$this->_password))? 1 : 0;
  }

  public function isTokenValid()
  {
    return (!isset($_SESSION['token']) || $this->_token != $_SESSION['token'])? 0 : 1;
  }

  public function registerSession()
  {
    $_SESSION['ID'] = $this->_id;
    $_SESSION['email'] = $this->_email;
    $_SESSION['password'] = $this->_passmd5;
  }

  public function sessionExist()
  {
    return (isset($_SESSION['email']) && isset($_SESSION['password']))? 1 : 0;
  }

  public function showErrors()
  {
  	if(isset($this->_errors[0])){
	  echo "<h3>Errors</h3>";
      foreach($this->_errors as $key=>$value)
    	echo $value."<br>";
	}
  }
}

?>
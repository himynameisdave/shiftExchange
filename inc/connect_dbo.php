<?php

try
{
	
    $user = "root";
    $pass = "";
    $dbo = new PDO('mysql:host=localhost;dbname=shiftExchange', $user, $pass);
}
catch (PDOException $e)
{
   print("Error: ".$e->getMessage()."<br />
    ");
}


?>

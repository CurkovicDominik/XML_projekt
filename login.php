<?php 

	$operation = $_POST["op"];
	$xmlFile = simplexml_load_file("users.xml");
   			
	$xmlLocalCopy = new SimpleXMLElement($xmlFile->asXML()); 

	if($operation == "login")
	{
	$username = $_POST["username"];
	$password = $_POST["password"];
    
	foreach($xmlLocalCopy as $user)
    {
        if($user->username == $username && $user->password == $password)
        {
            session_start();
			$_SESSION['user'] = $username;
            echo "Uspijeh";
        }
    }
	}
	else
	{
		echo "Neuspjeh"; 
	}
?>

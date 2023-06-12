<?php
    $xmlFile = simplexml_load_file("users.xml");
    $xmlFileProizvoid = simplexml_load_file("proizvodi.xml");

    $operation = $_POST["op"];
    if($operation == "sendInfo" && $_POST["username"] != "" && $_POST["password"] != "" && $_POST["password2"] != "")
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        
        $result=0;
        foreach($xmlFile->user as $user)
        {
            if($user->username == $username)
            {
                $result=1;
            }
        }
        if($result>0)
        {
            echo "Korisničko ime već postoji!";
        }
        else
        {
            if($password == $password2)
            {
                $user = $xmlFile->addChild("user");
                $user->addChild("username", $username);
                $user->addChild("password", $password);
                $xmlFile->asXML("users.xml");
                $noviUser = $xmlFileProizvoid->addChild("$username");
                 $xmlFileProizvoid->asXML("proizvodi.xml");
                echo "Korisnik kreiran";
            }
            else
            {
                echo "Lozinke se ne poklapaju!";
            }
        }
    
    }
    else
    {
        echo "Popunite sva polja";
    }
 ?>
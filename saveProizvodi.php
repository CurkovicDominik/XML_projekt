<?php
    session_start();
    $operation = $_GET["op"];
    $proizvodi = simplexml_load_file("proizvodi.xml");
    if($operation == "sendInfo")
    {
        $proizvodd = $_GET["proizvod"];
        $user = $_SESSION['user'];
        foreach($proizvodi->children() as $korisnik)
        {
            if($korisnik->getName() == $user)
            {
                $korisnik = $korisnik->addChild("proizvod", $proizvodd);

            }
        }        
        $proizvodi->asXML("proizvodi.xml");
        echo "Proizvod dodan.";
        
    }
    else if($operation == "idle")
    {
        foreach($proizvodi->children() as $korisnik)
        {
            if($korisnik->getName() == $_SESSION['user'])
            {
                if($korisnik->count() == 0)
                {
                    echo "Košarica vam je prazna";
                    return;
                }
                echo "<ul id='lista_proizvoda'>";
                foreach($korisnik->children() as $proizvod)
                {   
                    echo "<li>" . $proizvod . "</li>";
                }
                echo "</ul>";
                
            }
            
        }
    }
    else
    {
        echo "Neuspjeh";
    }
 ?>
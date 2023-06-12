<?php 
    session_start();
   // $proizvodi = simplexml_load_file("proizvodi.xml");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodavaonica</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
    <h1>Prodavaonica stolica</h1>
    <br>
<div class="profil">
    <h2>Dobrodošli <?php echo $_SESSION['user']; ?></h2>
<div class="kosara">
    <button id="gumb_kosarica">Košarica</button>
    <ul id="lista_proizvoda"></ul>
</div>
</div>
</div>
    <br>
    <div id="proizvodi" class="proizvodi">
        <div name="proizvod" class="proizvod">
            <img src="https://www.ikea.com/us/en/images/products/lerhamn-chair-black-brown-vittaryd-beige__0728160_pe736117_s5.jpg?f=s" alt="1">
            <p>Stolica 1</p>
            <p>Cijena: 100kn</p>
            <button name="gumb">Dodaj u košaricu</button>
        </div>
        <div name="proizvod" class="proizvod">
            <img src="https://content.la-z-boy.com/Images/product/category/white/large/235401.jpg" alt="2">
            <p>Stolica 2</p>
            <p>Cijena: 200kn</p>
            <button name="gumb">Dodaj u košaricu</button>
        </div>
        <div name="proizvod" class="proizvod">
            <img src="https://www.bludot.com.au/media/catalog/product/f/d/fd1_lngchr_bh_frontlow-field-lounge-chair-tait-blush_2.jpg?optimize=medium&fit=bounds&height=1200&width=1500&canvas=1500:1200" alt="3">
            <p>Stolica 3</p>
            <p>Cijena: 300kn</p>
            <button name="gumb">Dodaj u košaricu</button>
        </div>
        <div name="proizvod" class="proizvod">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/White_Monobloc_chair.jpg/220px-White_Monobloc_chair.jpg" alt="4">
            <p>Stolica 4</p>
            <p>Cijena: 400kn</p>
            <button name="gumb">Dodaj u košaricu</button>
        </div>
        <div name="proizvod" class="proizvod">
            <img src="https://images.costco-static.com/ImageDelivery/imageService?profileId=12026540&itemId=1570087-847&recipeName=680" alt="5">
            <p>Stolica 5</p>
            <p>Cijena: 500kn</p>
            <button name="gumb">Dodaj u košaricu</button>
        </div>
    </div>

<script type="text/javascript">
    var brojac = 0;
    var xhr = new XMLHttpRequest();
    let gumbi = document.getElementsByName("gumb");
    kosara = document.getElementById("gumb_kosarica");
    ///////////////////////////////////////////////////
    myTimer = null;
        kosara.onclick = function(){
            if(brojac == 0)
            {
                brojac = 1;
                timer();
            }
            else
            {
            brojac = 0;
             }
            console.log(brojac);
           }
          timer();
          function timer()
          {
            myTimer = setInterval(prikazujeKosaru, 000);
          } 
    function prikazujeKosaru(){
        if(brojac == 1)
        {
            urlAdresa = "saveProizvodi.php?op=idle";	
			xhr.open("GET", urlAdresa, true);
            xhr.send(null);
            xhr.onreadystatechange = prikaziKosaru;
            
            
        }else{
            document.getElementById("lista_proizvoda").innerHTML = "";
            clearInterval(myTimer);
        }}
    ///////////////////////////////////////////////////
    gumbi.forEach(function(gumb)
    {
        gumb.onclick= function(){
            urlAddress = "saveProizvodi.php?op=sendInfo&proizvod=" + gumb.parentElement.children[1].innerHTML;	
			xhr.open("GET", urlAddress, true);
            xhr.send(null);
            xhr.onreadystatechange = prikaziKosaru;
    }});

function prikaziKosaru()
        {
            if(xhr.readyState == 4 && xhr.status == 200)
            {
                document.getElementById("lista_proizvoda").innerHTML = xhr.responseText;
            }
        }

</script>
</body>
</html>
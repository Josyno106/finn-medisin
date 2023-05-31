<?php  
    session_start();
?>
<!DOCTYPE html>
<html lang="no">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="keywords"
      content="finn, medisin, legemiddel, legemiddelmangel, lagerstatus"
    />
    <meta
      name="description"
      content="Hjemmeside for å finne medisiner på norske apotek"
    />
    <meta
      name="author"
      content="Patrik Oskar Graff, Iselin Sannes Stridsklev, Almin Dacic, Joachim Nyland Andersen, Sindre Rødne"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hjemmeside</title>
    <link rel="stylesheet" href="css/site2.css" />
    <link
      rel="icon"
      type="image/x-icon"
      href="../BOP3000/Logo/fm_favicon.ico"
    />
    <link
      id=""
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
      let check_product = !!localStorage.getItem("product_string");
      if(check_product===false) window.location.href = 'index.php'
    </script>
  </head>
  <body>
    <section class="section1.2">
      <div class="sec1_2_placement_inner_i">
        <div class="sec1_2box1">
          <img src="Pictures/Medicine_icon-1.png" />
        </div>
        <div class="description">
        </div>
      </div>
    </section>

    <footer class="footer-style">
      <div class="footer_placement">
        <p>
          finnmedisin.no &copy; 2023<br />Nettsiden benytter
          <a href="">informasjonskapsler</a>
        </p>
      </div>
      <!-- <button>Til toppen</button> -->
    </footer>
    <script>
      let product = localStorage.getItem("product_string").split('-');
       console.log(product)

        $('.description').html(`<p id="product">varenavn: ${product[0]} <br />Butikknavn: ${product[1]} <br />styrke: ${product[2].length>0 && !product[2]===null ? product[2] :'Utilgjengelig'}<br />mengde: ${product[3].length>0 && !product[3]===null ? product[3] :'Utilgjengelig'}</p>`)
    </script>
  </body>
</html>
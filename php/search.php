<?php
  require_once "db.php";

  if (isset($_POST['product'])) {
    $clean_str =  trim($_POST['query']);
      
      $query = "SELECT * FROM vare WHERE vare_name = '{$_POST['product']}' LIMIT 1";
      $result = mysqli_query($conn, $query);
       
      if (mysqli_num_rows($result) > 0) {

        echo '<h4>'.'Results for  <span style="color:#00796b;">'.$_POST['product'].'</span> in'.'</h4>'.$_POST['location'];
        while ($res = mysqli_fetch_array($result)) {
          
        //  WHERE butikkvare.vare_id= $res['vare_id']
          $shopQuery = "SELECT * FROM butikk INNER JOIN butikkvare on butikk.butikk_id=butikkvare.butikk_id WHERE butikkvare.vare_id = '".$res['vare_id']."'   LIMIT 10";
          

          $shopsResult = mysqli_query($conn, $shopQuery);
          
          if (mysqli_num_rows($shopsResult) > 0) { 
                  echo '<ul>';
                while ($shopsRes = mysqli_fetch_array($shopsResult)) { 
                     echo "<li> <a href='#'>".$res['vare_name']." ".'-'." ".$shopsRes['butikk_name']."  </a></li>";
                    }
                    echo '</ul>';
           }
        
        }
      } else {
        echo "
        <div class='alert alert-danger mt-3 text-center' role='alert'>
          
          Oops Varen ble ikke funnet
        </div>
        ";
      }
    }
   
    ?>



<!-- /AND butikk.butikk_postkode = '".$_POST['location']."' -->
<!-- echo "<li> <a href='#'>".$res['vare_name']." ".'-'." ".$shopsRes['butikk_name']."  ".'-'."  ".$res['vare_styrke_enhet']."  ".'-'."  ".$res['vare_antall']."</a></li>"; -->

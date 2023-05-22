<?php
  require_once "db.php";
 
  if (isset($_POST['product'])) {
      $query = "SELECT * FROM vare WHERE vare_name LIKE '{$_POST['product']}%' LIMIT 1";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {

        echo '<h4>'.'Results for  <span style="color:#00796b;">'.$_POST['product'].'</span> in'.'</h4>'.$_POST['location'];
        while ($res = mysqli_fetch_array($result)) {
          
        //  WHERE butikkvare.vare_id= $res['vare_id']
          $shopQuery = "SELECT * FROM butikk INNER JOIN butikkvare on butikk.butikk_id=butikkvare.butikk_id WHERE butikkvare.vare_id = '".$res['vare_id']."' AND butikk.butikk_postkode = '".$_POST['location']."'  LIMIT 5";
          $shopsResult = mysqli_query($conn, $shopQuery);
          
          if (mysqli_num_rows($shopsResult) > 0) { 
                while ($shopsRes = mysqli_fetch_array($shopsResult)) { 
                     echo '<ul>';
                     echo "<li> <a href='#'>".$shopsRes['butikk_name']."    ".$shopsRes['butikk_postkode']."     ".$shopsRes['butikk_poststed']."</a></li>";
                     echo '</ul>';
                }
           }
          
        }
      } else {
        echo "
        <div class='alert alert-danger mt-3 text-center' role='alert'>
        Record not found
        </div>
        ";
      }
    }
   
    ?>


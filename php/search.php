<?php
  require_once "db.php";
 
  if (isset($_POST['query'])) {
      $query = "SELECT * FROM vare WHERE vare_name LIKE '{$_POST['query']}%' LIMIT 10";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
          
          echo '<ul>';
          // echo $res['vare_name']. "<br/>";
          echo "<li> <a href='#'>".$res['vare_name']."</a></li>";
          echo '</ul>';
          
          
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


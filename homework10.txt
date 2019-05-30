<!DOCTYPE HTML>
<html>

<body>
    <?php
      $jsonFile = file_get_contents('zips.json');
      $data = json_decode($jsonFile, true);
      echo '<table>';
      echo '<tr><th><b>Zip Code</b></th>
                <th><b>City</b></th>
                <th><b>State</b></th>
                <th><b>Population</b></th></tr>';
      foreach($data as $city){
        echo('<tr>');
        foreach($city as $property){
          if (is_array($property)){
            foreach($property as $properties){
              echo('<td>' . $properties . '</td>');
            }
          }
          else{
            echo('<td>' . $property . '</td>');
          }
        }
        echo('</tr>');
      }
      echo '</table>';
    ?>
</body>

</html>

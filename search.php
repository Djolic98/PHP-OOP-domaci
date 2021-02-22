<?php
  $conn=mysqli_connect("localhost","root","","itehdomaci");

  if (isset($_POST['query'])) {
     
    $query = "SELECT * FROM filmovi WHERE naziv LIKE '%{$_POST['query']}%'
                                          OR produkcija LIKE '%{$_POST['query']}%'
                                          OR trajanje LIKE '%{$_POST['query']}%' 
                                          OR zanr LIKE '%{$_POST['query']}%'
                                          OR zanr in (SELECT id
                                                     FROM zanr
                                                     WHERE nazivZanra LIKE '%{$_POST['query']}%') ";
    $result = mysqli_query($conn, $query);
 
  if (mysqli_num_rows($result) > 0) {
    echo '<div class="row justify-content-center">';
    echo '<table class=table>';
    echo '<thead>';
    echo '<tr>';
        echo '<th>Naziv</th>';
        echo '<th>Produkcija</th>';
        echo '<th>Trajanje</th>';
        echo '<th>Zanr</th>';
    echo '</tr>';
    echo '</thead>' ; 
    while ($data = mysqli_fetch_array($result)){
     echo '<tr>';

     echo '<td>'.$data['naziv'].'</td>';
     echo '<td>'.$data['produkcija'].'</td>';
     echo '<td>'.$data['trajanje'].'</td>';
     echo '<td>'.$data['zanr'].'</td>';
     
     echo '</tr>'; 
      
       
    } 
    echo '</table>';
    echo '</div>';
    } else {
    echo "<p style='color:red'>Ne postoji film u bazi...</p>";
  }
}
 
 ?>


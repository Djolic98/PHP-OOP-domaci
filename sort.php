<?php  
 $connect = mysqli_connect("localhost", "root", "", "itehdomaci");  
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * , z.nazivZanra FROM filmovi f LEFT JOIN zanr z on (f.zanr=z.id)
           GROUP BY f.ID ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($connect, $query);  
 $output .= '  
 <table class="table table-bordered">  
      <tr>  
            
           <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>  
           <th><a class="column_sort" id="produkcija" data-order="'.$order.'" href="#">Produkcija</a></th>  
           <th><a class="column_sort" id="trajanje" data-order="'.$order.'" href="#">Trajanje</a></th>  
           <th><a class="column_sort" id="zanr" data-order="'.$order.'" href="#">RB Zanra</a></th>
           <th><a class="column_sort" id="nazivZanra" data-order="desc" href="#">Zanr</a></th>   
           <th colspan="2">Action</th>
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr>  
            
           <td>' . $row["naziv"] . '</td>  
           <td>' . $row["produkcija"] . '</td>  
           <td>' . $row["trajanje"] . '</td>  
           <td>' . $row["zanr"] . '</td>
           <td>' . $row["nazivZanra"] . '</td>   
           <td>
                <a class="btn btn-info">Edit</a>
                <a class="btn btn-danger">Delete</a>
            </td>
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmovi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylefilmovi.css">
</head>

<body>
<div id="unosnovog" class="container-fluid text-left">
    <a href="index.php" class="btnPocetna btn-info" style="height:50px;">
        <h3>Pocetna</h3>
    </a>
</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h2>Pronadji film</h2>
                <input type="text" name="search" id="search" autocomplete="off" placeholder="Unesite deo naziva">
                <br />
                <div id="output"></div>
            </div>
            <br />
        </div>

        <br>
    </div>
    <br />
    <div class="container" style="width:1200px;" >

        <div class="table-responsive" id="filmovi_table">
            <table class="table table-bordered">
                <tr>
                    <th><a class="column_sort" id="redniBroj" data-order="desc" href="#">R.B.</a></th>
                    <th><a class="column_sort" id="naziv" data-order="desc" href="#">Naziv</a></th>
                    <th><a class="column_sort" id="produkcija" data-order="desc" href="#">Produkcija</a></th>
                    <th><a class="column_sort" id="trajanje" data-order="desc" href="#">Trajanje</a></th>
                    <th><a class="column_sort" id="zanr" data-order="desc" href="#">RB Zanra</a></th>
                    <th><a class="column_sort" id="nazivZanra" data-order="desc" href="#">Zanr</a></th>
                    <th colspan="2" class="akcija" >Action</th>

                </tr>
                <?php

                include 'myadmin.php';
                $model = new Database('itehdomaci');
                $rows = $model->fetch();
                $i = 1;
                if (!empty($rows)) {
                    foreach ($rows as $row) {

                ?>

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row["naziv"]; ?></td>
                            <td><?php echo $row["produkcija"]; ?></td>
                            <td><?php echo $row["trajanje"]; ?></td>
                            <td><?php echo $row["zanr"]; ?></td>
                            <td><?php echo $row["nazivZanra"]; ?></td>
                            <td>
                                <a href="unos.php?edit=<?php echo $row['ID']; ?>" class="btnEdit btn-info">Edit</a>
                                <a href="unos.php?delete=<?php echo $row['ID']; ?>" class="btnDelete btn-danger">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "no data";
                }

                ?>
            </table>
        </div>
    </div>
    <br />
    </div>
    </div>
    <div id="unosnovog" class="container-fluid text-center"> 
    <a href="unos.php?insert" class="btnUnos btn-infounos" style="height:70px;">
        <h2>Unesi novi film</h2>
    </a>
    </div>


</body>

</html>

<script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("ID");  
           var order = $(this).data("order");  
           var arrow = '';  
             
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#filmovi_table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  
 </script>  

<script type="text/javascript">
    $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'search.php',
              method: 'POST',
              data: {query:query},
              success: function(data){
 
                $('#output').html(data);
                $('#output').css('display', 'block');
 
                $("#search").focusout(function(){
                    $('#output').css('display', 'none');
                });
                $("#search").focusin(function(){
                    $('#output').css('display', 'block');
                });
              }
            });
          } else {
          $('#output').css('display', 'none');
        }
      });
    });
  </script>
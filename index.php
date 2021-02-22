<!DOCTYPE html>
<html>
<head>
  <title>Prvi domaci-sajt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!--for mobile website-->
  <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--jquery-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><!--bootstrap file-->
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script><!--za kreiranje ikonica za social media na kraju strance-->
  <script src="scrolling.js"></script>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript">
     $(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle' ) ) {
        $(this).collapse('hide');
    }
    });
  </script>
</head>
<body>
<!--first bar with menu-->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"><!--dugme za mobilne telefone-->
              <span class="icon-bar"></span><!--3 linije -->
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
         </button>
         <!--<a class="navbar-brand" href="#"><img src="img/logo.png" height="55px"></a>--><!--logo sa lev strane-->
      </div><!--end of navbar header-->
  <div class="collapse navbar-collapse" id="myNavbar"><!--odredjujemo sekciju putem id a-->
      <ul class="nav navbar-nav navbar-right"> <!--pojavljuje se na desnoj strani za desktop verzije to je lista-->
          <li><a href="#naslovna">Naslovna</a><!--link je Home tj naslov,a #home je za sekcije stranice-->
          <li><a href="#onama">O nama</a>
          <li><a href="filmovi.php">Filmovi</a>
          <li><a href="#kontakt">Kontakt</a>
      </ul>
  </div><!--enf of navbar collapse, kraj sekcije myNavbar-->
  </div><!--end of container-->
</nav><!--end of nav-->
  
<div id="naslovna">
  <img src="img/movietheaterpopcornticket.jpg" class="banner">
</div>

<div id="onama" class="container-fluid text-center">    
  <h1>O nama</h1>
  <br><br><!--break-->
  <div class="row">
      <div class="col-md-6"><!--ima ih 12 tako da 6 deli na dva dela--->
          <p>
            Bioskop “Movie“ čine pet sala ukupnog kapaciteta od 478 sedišta, 
            Movie je jedan od bolje tehnički opremljenih bioskopa u Beogradu. Poseduje tri sistema za reprodukciju digitalnog zvuka
             (standardi zvuka su SDDS, DTS, Dolby Digital EX i Dolby Surround) kao i sofisticiranu tehnologiju za fotografiju (Ernemann Cine GMBH / 35mm cine projektori).
            Isto tako poseduje i Dolby 3D (reprodukcija digitalnih 3D filmova)
          </p>
      </div>
      <div class="col-md-6"><!--druga polovina je slika--->
          <img src="img/popcorn.jpg" id="logo">
      </div>
  </div><!--end row--->
  <br>
</div><!---end of container-->

<div id="filmovi" class="container-fluid text-center">
  <h1>Repertoar!</h1>
  <div class="row">
      <div class="col-md-4"><!--delimo na 4 dela-->
          <img src="img/Frozen-2013.jpg"> <!--id="icon">  za mob-->
          <h3>Frozen</h3>
      </div>
      <div class="col-md-4">
          <img src="img/Knives-Out-2019.jpg">
          <h3>Knives-out</h3>
      </div>
      <div class="col-md-4">
          <img src="img/Pirates-of-the-Caribbean-2017-poster.jpg">
          <h3>Pirates of the Caribbean</h3>
      </div>

  </div>
  <!--<h2>Lako je i moze svako</h2>-->
  <br>
</div>

<!--ovde izmedju moze slika da se spoje gornji i donji deo -->

<footer id="kontakt" class="container-fluid text-center">
  <div class="row">
      <h2>Kontakt</h2>
      <div class="social">
          <a href="" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="" target="_blank"><i class="fab fa-youtube"></i></a>
      </div>
  </div>

</footer>


</body>
</html>







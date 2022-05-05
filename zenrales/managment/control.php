<?php 
include_once("../config/config.php");
include_once("assets/yonetim_fonksiyon.php");
$yonetim = new yonetim;
$yonetim->konrolet("cot");
?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">




<link href="<?php echo urlyon ?>assets/css/admin_panel.css" type="text/css" rel="stylesheet" />
<link href="<?php echo urlyon ?>../css/stildosyasi.css" type="text/css" rel="stylesheet" />


<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  

</head>

<body>



    <!-- Side navigation -->
<div class="sidenav">
  <a href="<?php echo urlyon ?>control.php?sayfa=siteayar">Site ayarları</a>
  <a href="<?php echo urlyon ?>control.php?sayfa=images_home">Images home</a>
  <a href="<?php echo urlyon ?>control.php?sayfa=games">Games</a>
  <a href="<?php echo urlyon ?>control.php?sayfa=about">About</a>
  <a href="<?php echo urlyon ?>control.php?sayfa=gelenmesaj">Gelen Mesajlar</a>
</div>

        <!-- main content area start -->
        <div class="main">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center bg-dark" style="height:50px;">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                      
                    </div>
                    <!-- profil ayarlar çıkıs -->
                     <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right "style="max-height:40px;" >
                            
                            <h4 class="user-name dropdown-toggle text-white" data-toggle="dropdown">
                            <i class="fa fa-user mr-2"></i>
                            <?php echo $yonetim->kuladial($baglanti); ?>
                            </h4>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo urlyon ?>control.php?sayfa=kullanici">Kullanıcı Ayarları</a>
                            <a class="dropdown-item" href="<?php echo urlyon ?>control.php?sayfa=cikis">Çıkış</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="main-content-inner">
                <!-- sales report area start -->
               <div class="row">
                    <div class="col-lg-12 mt-2 bg-white text-center" style="min-height:500px;">
                   
                   
                    <?php 
                     @$sayfa = $_GET["sayfa"];
                     switch($sayfa) :

                     case"siteayar":
                        $yonetim->siteayar($baglanti);
                     break;
                     case"images_home":
                        $yonetim->images_home($baglanti);
                     break;
                     case"heroimgguncelle":
                        $yonetim->heroguncelleme($baglanti);
                     break;
                     case"aboutimgguncelle":
                        $yonetim->aboutimgguncelleme($baglanti);
                     break;
                     case"contactimgguncelle":
                        $yonetim->contactimgguncelleme($baglanti);
                     break;

                     case"games":
                        $yonetim->gamepanel($baglanti);
                     break;
                     case"gameimgguncelle":
                        $yonetim->gameimgguncelleme($baglanti);
                     break;
                     case"gameekle":
                        $yonetim->gameekle($baglanti);
                     break;
                     case"gamesil":
                        $yonetim->gamesil($baglanti);
                     break;

                     case"about":
                        $yonetim->about($baglanti);
                     break;
                     case"aboutekle":
                        $yonetim->aboutekle($baglanti);
                     break;
                     case"aboutsil":
                        $yonetim->aboutsil($baglanti);
                     break;

                     case "gelenmesaj":
                        $yonetim->gelenmesajlar($baglanti); 
                     break;
                     case "mesajoku":
                        $yonetim->mesajdetay($baglanti,$_GET["id"]); 
                     break;
                     case "mesajarsivle":
                        $yonetim->mesajarsivle($baglanti,$_GET["id"]); 
                     break;
                     case "mesajsil":
                        $yonetim->mesajsil($baglanti,$_GET["id"]); 
                     break;


                     case "kullanici":
                        $yonetim->kullanici($baglanti); 
                     break;

                     case "cikis":
                     $yonetim->cikis($baglanti); 
                     break;

                     default:
                     
                     endswitch;
                     ?>
                </div>
            </div>
            </div>
        </div>
        <!-- main content area end -->
    </div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
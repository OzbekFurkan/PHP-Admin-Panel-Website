<?php 
include_once("../config/config.php");
include_once("assets/yonetim_fonksiyon.php");
$yonetim = new yonetim;
$yonetim->konrolet("ind");
?>

<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">




<link href="<?php echo URL ?>css/stildosyasi.css" type="text/css" rel="stylesheet" />
<link href="<?php echo URL ?>css/stil_footer.css" type="text/css" rel="stylesheet" />
<link href="<?php echo URL ?>css/stil_card.css" type="text/css" rel="stylesheet" />


<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  

</head>

<body>



<div class="login-area text-center">
    <?php
    if(!$_POST):
       // echo md5(sha1(md5("123456")));
    
    ?>
        <div class="container">
        <div class="login-box ptb--100">
        <form action="" method="post">
        <div class="login-form-head">
        <h4>Yönetim Paneli Giriş</h4></div>
        <div class="login-form-body">
        <div class="form-gp">
        <label for="kuladlab">Kullanıcı Adı</label>
        <input type="text" name="kulad" id="kuladlab" />
        <i class="ti-user"></i>
        </div>
        <div class="form-gp">
        <label for="sifrelab">Şifre</label>
        <input type="password" name="sifre" id="sifrelab" />
        <i class="ti-lock"></i>
        </div>
       
        <div class="submit-btn-area">
        <input type="submit" class="btn btn-dark" value="Giriş Yap">
        </div>
        
        </form>
        </div>
        </div>
        </div>
        <?php 
    else:
        $kulad=htmlspecialchars($_POST["kulad"]);
        $sifre=htmlspecialchars($_POST["sifre"]);
        if($kulad=="" && $sifre==""):
            echo '
            <div class="container-fluid bg-white">
            <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-14 font-weight-bold">
            Bilgiler boş olamaz</div>
            </div>';
            header("refresh:2,url=".urlyon."index.php");
        else:
            //vt kontrol fonksiyonu
            $yonetim->giriskontrol($kulad,$sifre,$baglanti);
    endif;
    endif;
    ?>









<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
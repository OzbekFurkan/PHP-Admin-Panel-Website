<?php
include_once("config/config.php");
include_once("library/fonksiyon-1.php");
include_once("mailgonder.php");
$fonksiyon1 = new fonksiyon1;

try {
    $baglanti=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SIFRE."");
            $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die($e->getMessage());
            }

            
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

<section>
<header>
    <div id="head_div" class="container-fluid" style="background-image: url(<?php echo URL ?><?php echo $fonksiyon1->hero_img; ?>);">
        
       
            <nav class="navbar navbar-expand-sm navbar-dark " id="navbar_home">
                
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="<?php echo URL ?>index.php?sayfa=home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Games
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form action="POST">
                                    <?php $fonksiyon1->navbar_game_count($baglanti); ?>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL ?>index.php?sayfa=about" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL ?>index.php?sayfa=contact" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                    if(isset($_COOKIE["kulbilgi"])):
                                    echo $fonksiyon1->kuladial($baglanti);
                                        
                                    else:
                                        echo'Login / Register';
                                    endif;
                                ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form action="POST">
                                    <?php
                                        if(isset($_COOKIE["kulbilgi"])):
                                        echo '
                                            <a class="dropdown-item" href="index.php?sayfa=kullanici">Change Password</a>
                                            <a class="dropdown-item" href="index.php?sayfa=cikis">Quit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="index.php?sayfa=hesapsil">Delete Account !</a>
                                            
                                        ';
                                            
                                        else:
                                        echo'
                                            <a class="dropdown-item" href="index.php?sayfa=logreg">Login</a>
                                            <a class="dropdown-item" href="index.php?sayfa=reg">Register</a>
                                        ';
                                        endif;
                                    ?>
                                    
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>
                            
                            
                        
            
            <br><br><br><br>
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.7)">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                <h1 class="mb-3"><?php echo $fonksiyon1->hero_h1; ?></h1>
                <h5 class="mb-4"><?php echo $fonksiyon1->hero_h5; ?></h5>
                <a
                    class="btn btn-outline-light btn-lg m-2"
                    href="<?php echo URL ?><?php echo $fonksiyon1->btn1_yol; ?>"
                    role="button"
                    rel="nofollow"
                    target="_blank"
                    ><?php echo $fonksiyon1->btn1_txt; ?></a
                >
                <a
                    class="btn btn-outline-light btn-lg m-2"
                    href="<?php echo $fonksiyon1->btn2_yol; ?>"
                    target="_blank"
                    role="button"
                    ><?php echo $fonksiyon1->btn2_txt; ?></a
                >
                </div>
            </div>
        </div>
    </div>
</header>
</section>
<!-- BİZDEN HABERLER BÖLÜMÜ -->

<div class="container mt-4 mb-0">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center breaking-news bg-transparent">
                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Break News</span></div>
                <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <a href="#"><?php echo $fonksiyon1->new1; ?> </a> <span class="dot"></span> <a href="#"><?php echo $fonksiyon1->new2; ?> </a> <span class="dot"></span> <a href="#"><?php echo $fonksiyon1->new3; ?> </a> </marquee>
            </div>
        </div>
    </div>
</div>



<!--             icerik bolumu             -->
<section>
<main>

    <?php  
        $sayfa = @$_GET["sayfa"];
        switch(@$sayfa):

            case "home":
                $fonksiyon1->home($baglanti);
            break;
            case "games":
                $fonksiyon1->games($baglanti);
            break;
            
            case "about":
                $fonksiyon1->about($baglanti);
            break;
            case "contact":
                $fonksiyon1->contact($baglanti);
            break;
            case "logreg":
                $fonksiyon1->logreg($baglanti);
            break;
            case "reg":
                $fonksiyon1->reg($baglanti);
            break;
            case "kullanici":
                $fonksiyon1->kullanici($baglanti);
            break;
            case "cikis":
                $fonksiyon1->cikis($baglanti);
            break;
            case "hesapsil":
                $fonksiyon1->hesapsil($baglanti);
            break;
                
            default:
                $fonksiyon1->home($baglanti);
            break;

        endswitch;
        
    ?>


</main>
</section>





<div class="container-fluid" style="background-color: #222222; margin-top:15px; margin-bottom:0px;">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4 col-sm-12 col-xs-12">
            <div id="card_sub" class="card p-3 p-md-4 text-white"> <span><i class="fa fa-envelope-open-o fa-2x" aria-hidden="true"></i></span>
                <h6 class="my-3"> Subscribe to the newsletter </h6>
                <div class="row d-flex my-2 pr-2 pr-md-5 div1">
                    <div class="col-9"> <input type="email" class="form-control py-3" id="inp1" placeholder="Enter email address"> </div>
                    <div class="col-3 px-0"> <button id="btn_sub" class="btn text-white px-4 py-2"> OK </button> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
<footer>

<div class="container-fluid" id="cont_footer">
    <div id="card_footer">
        <div class="row mb-4 ">
            <div class="col-md-4 col-sm-11 col-xs-11">
                <div class="footer-text pull-left">
                    <div class="d-flex">
                        <h1 class="font-weight-bold mr-2 px-3" style="color:#16151a; background-color:#957bda"> Z </h1>
                        <h1 style="color: #957bda">enrales</h1>
                    </div>
                    <p class="card-text"><?php echo $fonksiyon1->footer_content; ?></p>
                    <div class="social mt-2 mb-3"> <i class="fa fa-facebook-official fa-lg"></i> <i class="fa fa-instagram fa-lg"></i> <i class="fa fa-twitter fa-lg"></i> <i class="fa fa-linkedin-square fa-lg"></i> <i class="fa fa-facebook"></i> </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-1 col-xs-1 mb-2"></div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h5 class="heading">Services</h5>
                <ul>
                    <li>IT Consulting -</li>
                    <li>Development</li>
                    <li>Cloud</li>
                    <li>DevOps & Support</li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h5 class="heading">Industries</h5>
                <ul class="card-text">
                    <li>Game Dev</li>
                    <li>Web Dev</li>
                    <li>Smart Office</li>
                    <li>E-trade</li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-4">
                <h5 class="heading">Company</h5>
                <ul class="card-text">
                    <li>Home</li>
                    <li>Games</li>
                    <li>Contact</li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <div class="divider mb-4"> </div>
        <div class="row" style="font-size:10px;">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="pull-left">
                    <p><i class="fa fa-copyright"></i> 2019 copyright</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="pull-right mr-4 d-flex policy">
                    <div>Terms of Use</div>
                    <div>Privacy Policy</div>
                    <div>Cookie Policy</div>
                </div>
            </div>
        </div>
    </div>
</div>

</footer>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


  
</body>
</html>
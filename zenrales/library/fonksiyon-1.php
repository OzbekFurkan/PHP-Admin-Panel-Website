
<?php
    

     ob_start();
    class fonksiyon1
    {
        public $hero_img, $hero_h1, $hero_h5, $btn1_txt, $btn1_yol, $btn2_txt, $btn2_yol, $new1, $new2, $new3, $about_img, $about_h1, $about_h4, $about_slogan, $oyun_sayisi, $oyuncu_sayisi, $partner_sayisi, $contact_img, $contact_h1, $contact_h4, $footer_content;
        function __construct() 
        {
            try {
                $baglanti=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SIFRE);
                     $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                     }catch(PDOException $e){
                         die($e->getMessage());
                     }
         
                     $ayarcek = $baglanti->prepare('select * from siteayar_home');
                     $ayarcek->execute();
                     $sorguson = $ayarcek->fetch();
                     $this->hero_img=$sorguson["hero_img"];
                     $this->hero_h1=$sorguson["hero_h1"];
                     $this->hero_h5=$sorguson["hero_h5"];
                     $this->btn1_txt=$sorguson["btn1_txt"];
                     $this->btn1_yol=$sorguson["btn1_yol"];
                     $this->btn2_txt=$sorguson["btn2_txt"];
                     $this->btn2_yol=$sorguson["btn2_yol"];
                     $this->new1=$sorguson["new1"];
                     $this->new2=$sorguson["new2"];
                     $this->new3=$sorguson["new3"];
                     $this->about_img=$sorguson["about_img"];
                     $this->about_h1=$sorguson["about_h1"];
                     $this->about_h4=$sorguson["about_h4"];
                     $this->about_slogan=$sorguson["about_slogan"];
                     $this->oyun_sayisi=$sorguson["oyun_sayisi"];
                     $this->oyuncu_sayisi=$sorguson["oyuncu_sayisi"];
                     $this->partner_sayisi=$sorguson["partner_sayisi"];
                     $this->contact_img=$sorguson["contact_img"];
                     $this->contact_h1=$sorguson["contact_h1"];
                     $this->contact_h4=$sorguson["contact_h4"];
                     $this->footer_content=$sorguson["footer_content"];
                
        }
        
        function navbar_game_count($vt)
        {
            $sorgusonuc = $vt->prepare("select * from games");
            $sorgusonuc->execute();
            
            while($sonuc =  $sorgusonuc->fetch(PDO::FETCH_ASSOC)):
                echo'
                    <a class="dropdown-item" href="index.php?sayfa=games&id='.$sonuc["id"].'">'.$sonuc["title"].'</a>
                ';
            endwhile;
        }


        function home($vt)
        {
            echo'
                

                <!-----------------------------                    -------------------                ---------      home card -------------------           ---------------       --------->

                <div class="container mt-2">
                    <div class="row">
                        ';
                            $ayar = $vt->prepare("select * from games");
                            $ayar->execute();
                            while($gelen = $ayar->fetch(PDO::FETCH_ASSOC)):
                                echo'
                                
                                <div class="col-md-3 col-sm-6">
                                <div id="card-home" class="card card-block">
                                <img id="img-card" src="'.$gelen["game_pic"].'" alt="Photo of sunset">
                                    <h5 id="card-title-home" class="card-title mt-3 mb-3">'.$gelen["title"].'</h5>
                                    <p id="card-text-home" class="card-text">'.$gelen["slogan"].'</p> 
                            </div>
                                </div>
                                
                                ';
                            endwhile;
                        echo'
                       
                          
                    </div>
  
                </div>

                <!-----------------------------                    -------------------                ---------      about -------------------           ---------------       --------->
                <section style="margin-top:50px; background-image: url('.$this->about_img.');" id="aboutus">
    
                    <div class="container h-100" >
                        <div class="row align-items-center h-100">
                            <div class="col-6 mx-auto">
                                <div class="card h-100 border-primary justify-content-center bg-transparent">
                                    <div>
                                        <h1 class="text-white">'.$this->about_h1.'</h1>
                                        <h4 class="text-white">'.$this->about_h4.'</h4><br>
                                        <a href="index.php?sayfa=about" id="btn-et" class="border bordered"> More... </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
                
                <!-----------------------------                    -------------------                ---------       info table       -------------------           ---------------       --------->

                <table style="width: 100%; margin-top:30px; margin-bottom:30px;">
                    <tbody>
                    <tr>
                    <th>
                    <h1 style="text-align: center;">'.$this->oyun_sayisi.'<br />
                    GAMES</h1>
                    </th>
                    <th>
                    <h1 style="text-align: center;">'.$this->oyuncu_sayisi.'<br />
                    PLAYER</h1>
                    </th>
                    <th>
                    <h1 style="text-align: center;">'.$this->partner_sayisi.'<br />
                    PARTNER</h1>
                    </th>
                    </tr>
                    </tbody>
                </table>

                <!-----------------------------                    -------------------                ---------       contact       -------------------           ---------------       --------->

                <section style="margin-top:50px; background-image: url('.$this->contact_img.');" id="contactus">
    
                    <div class="container h-100">
                        <div class="row align-items-center h-100">
                            <div class="col-6 mx-auto">
                                <div class="card h-100 border-primary justify-content-center bg-transparent">
                                    <div>
                                        <h1 class="text-white">'.$this->contact_h1.'</h1>
                                        <h4 class="text-white">'.$this->contact_h4.'</h4><br>
                                        <a href="index.php?sayfa=contact" id="btn-et" class="border bordered"> More... </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>

            ';
        }

        function games($vt)
        {
            $id = @$_GET["id"];
            $sorgusonuc = $vt->prepare("select * from games where id=$id");
            $sorgusonuc->execute();
            $gelen = $sorgusonuc->fetch();
            echo '
            <br><br>
            <!-- Section heading -->
            <h3 class="text-center text-white mb-4">'.$gelen["title"].'</h3>
            <!-- Section description -->
            <p class="text-center text-white w-sm-75 mx-auto mb-5">'.$gelen["slogan"].'</p>

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-6 text-center text-lg-left">
                <img class="img-fluid" src="'.$gelen["game_pic"].'" alt="Sample image" >
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4" style="line-height:3; color:white;">

                '.$gelen["text"].' 
                
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <iframe width="560" height="315" 
                                src="'.$gelen["trailer_link"].'" 
                                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
                <!--Grid column-->
                
            </div>
            <!-- Grid row --><br><br><br>

            <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-9 d-flex justify-content-around">
                <a href="index.php?sayfa=home" class="square_btn">
                    <span>Go to home</span>
                </a>
                <a href="'.$gelen["download_link"].'" class="square_btn">
                    <span>'."Download For ".$gelen["platform"].'</span>
                </a>
                </div>
                <div class="col-lg-2">

                </div>
            </div><br><br><br><br>
            ';
        }

        

        function about($vt)
        {
            echo
            '
             <section id="what-we-do">
                <div class="container">
                    <h2 class="section-title mb-2 h1">What we do</h2>
                    <p class="text-center text-muted h5">'.$this->about_slogan.'</p>
                    '; 
                        $ayar = $vt->prepare("select * from about");
                        $ayar->execute();
                        while($gelen = $ayar->fetch(PDO::FETCH_ASSOC)):
                            echo'
                            <div class="row mt-5">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-block block-1">
                                            <h3 class="card-title">'.$gelen["about1_h3"].'</h3>
                                            <p class="card-text">'.$gelen["about1_p"].'</p>
                                            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-block block-2">
                                            <h3 class="card-title">'.$gelen["about2_h3"].'</h3>
                                            <p class="card-text">'.$gelen["about2_p"].'</p>
                                            <a href="" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        endwhile;
                    echo'
                    
                   
                </div>	
            </section>
            ';
        }

       

        function contact($vt)
        {
            if($_POST):
                $date = date("Y-m-d H:i:s");
                $ad = htmlspecialchars($_POST["ad"]);
                $mailadres = htmlspecialchars($_POST["mailadres"]);
                $konu = htmlspecialchars($_POST["konu"]);
                $mesaj = htmlspecialchars($_POST["mesaj"]);
                $al = $vt->prepare("insert into gelenmail(ad, mailadres, konu, mesaj, zaman) values('$ad','$mailadres','$konu','$mesaj','$date')");
                $al->execute();
                $mailyol = new mailyolla;
                $mailyol->mailg($ad, $mailadres, $konu, $mesaj);
                
                echo '<div class="alert alert-success mt-5" role="alert">
                    Message sent successfully.
                </div>';
                header("refresh:2,url=".URL."index.php?sayfa=contact");
            else:
            echo '
            
            <section id="contact">
                <div class="container">
                <div class="well well-sm">
                    <h3><strong>Contact Us</strong></h3>
                </div>
                
                <div class="row">
                    <div class="col-md-7">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47881.73905945041!2d27.3237495132379!3d41.40430369108412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b4a4b464b4438d%3A0x6a3ca9160e28dbed!2zTMO8bGVidXJnYXosIEvEsXJrbGFyZWxp!5e0!3m2!1str!2str!4v1617557753302!5m2!1str!2str" width="100%" height="340" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
            
                    <div class="col-md-5">
                        <h4 style="color: lavenderblush;"><strong>Get in Touch</strong></h4>
                    <form action="index.php?sayfa=contact" method="post">
                        <div class="form-group" style="margin-bottom: 15px;">
                        <input type="text"  class="form-control" name="ad" value="" placeholder="Name">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                        <input type="email"  class="form-control" name="mailadres" value="" placeholder="E-mail">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                        <input type="tel"  class="form-control" name="konu" value="" placeholder="Tittle">
                        </div>
                        <div class="form-group" style="margin-bottom: 15px;">
                        <textarea class="form-control"  name="mesaj" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button class="btn btn-default"  type="submit" name="button">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit
                        </button>
                    </form>
                    </div>
                </div>
                </div>
            </section>

            ';
            endif;
        }


        function kullanici($baglanti)
        {
            $id=$this->coz($_COOKIE["kulbilgi"]);
            $sorgu=$baglanti->prepare("select * from members where id=$id");
            $sorgu->execute();
            $sonuc = $sorgu->fetch();
            if($_POST):
                
                @$eskisif=htmlspecialchars($_POST["sifre"]);
                @$yenisif=htmlspecialchars($_POST["yenisifre"]);
                @$yenisif2=htmlspecialchars($_POST["yenisifre2"]);
                //eski şifreyi şifrele ve vt ile karsılastır.
                //yeni sifreler aynımı kontrol et
                //
                if($eskisif=="" || $yenisif=="" || $yenisif2==""):
                    echo '<div class="alert alert-danger mt-5">Hiçbir alan boş geçilemez.</div>';
                    header("refresh:1,url=".URL."index.php?sayfa=kullanici");
                else:
                $sifrelihal=md5(sha1(md5($eskisif)));
                if($sonuc['password']!=$sifrelihal):
                    echo '<div class="alert alert-danger mt-5">Eski şifre hatalı girildi.</div>';
                    header("refresh:1,url=".URL."index.php?sayfa=kullanici");
                else:
                    if($yenisif!=$yenisif2):
                        echo '<div class="alert alert-danger mt-5">Yeni şifreler eşleşmiyor.</div>';
                        header("refresh:1,url=".URL."index.php?sayfa=kullanici");
                    else:
                        $yenisifson=md5(sha1(md5($yenisif)));
                        $guncelleme=$baglanti->prepare("update members set 
                        password=? where id=$id");
                        $guncelleme->bindParam(1,$yenisifson,PDO::PARAM_STR);
                        $guncelleme->execute();
                        echo '<div class="alert alert-success mt-5">
                    Bilgiler başarıyla güncellendi.
                        </div>';
                        header("refresh:1,url=".URL."index.php?sayfa=kullanici");
                    endif;
                endif;
            endif;

            else:
            echo 
            '
            <section class="updatedVerify">
                <div id="container-reset-password" class="container">
                    <h1>Password Validation</h1>
                    <div class="inputBoxLeft">
                    <form action="index.php?sayfa=kullanici" method="post">
                        <ul>
                        <li>
                            <label for="password"></label>
                            <span><input type="password" id="password" name="sifre" placeholder="old password" required></span>
                        </li>
                        <li>
                            
                            <span><input type="password" id="password" name="yenisifre" placeholder="password" required></span>
                        </li>
                        <li>
                            <span><input type="password" id="password-verify" name="yenisifre2" placeholder="Verify Password"  /></span>
                            
                            
                        </li>
                        <li>
                            <input class="passwordButton" type="submit" value="Reset Password">
                        </li>
                        </ul>
                    </form>
                    </div>
                </div>


            </section>
        
            ';
            endif;
            
        }

        function logreg($vt)
        {
            
            if($_POST):
                $mailadres=htmlspecialchars($_POST["logmailinput"]);
                $sifre=htmlspecialchars($_POST["logsifreinput"]);
                
                $this->giriskontrol($mailadres, $sifre, $vt);

                
                
            else:
            echo
            '
                
            <section class="updatedVerify">
                <div id="container-reset-password" class="container">
                    <h1>Login</h1>
                    <div class="inputBoxLeft">
                    <form action="index.php?sayfa=logreg" method="post">
                        <ul>
                        <li>
                            <label for="mail"></label>
                            <span><input type="text" id="password" name="logmailinput" placeholder="mail"></span>
                        </li>
                        <li>
                            <span><input type="password" id="password-verify" name="logsifreinput" placeholder="Password"  /></span>
                            
                            
                        </li>
                        <li>
                        <span><a href="index.php?sayfa=reg">Register</a></span>
                             
                        </li>
                        <li>
                            <input class="passwordButton" type="submit" value="Login">
                        </li>
                        </ul>
                    </form>
                    </div>
                </div>


            </section>
            
            ';
            endif;
        }



        function sifrele($veri){
            return base64_encode(gzdeflate(gzcompress(serialize($veri))));
            
        }

        function coz($veri){
            return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
        }

        function kuladial($vt)
        {
            $cookid=$_COOKIE["kulbilgi"];
            $cozduk=$this->coz($cookid);
            $sorgusonuc = $vt->prepare("select * from members where id=$cozduk");
            $sorgusonuc->execute();
            $gelen = $sorgusonuc->fetch();
            return $gelen["username"];
        }//kullanıcı adı ayarla

        function giriskontrol($kulad,$sifre,$vt)  
        {
            $sifrelihal=md5(sha1(md5($sifre)));
            $sor=$vt->prepare("select * from members where mail='$kulad' and password='$sifrelihal'");
            $sor->execute();
           
            if($sor->rowCount()==0):
                echo '
                header("refresh:1,url=index.php?sayfa=logreg");
                <div class="container-fluid bg-white">
                <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-danger font-14 font-weight-bold">
                Bilgiler hatalı!</div>
                </div>';
         
                
            else:
            $gelendeger=$sor->fetch();
            header("refresh:1,url=index.php?sayfa=home");
            echo '
            
            <div class="container-fluid bg-white">
            <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-success font-14 font-weight-bold">
            Giriş başarılı!</div>
            </div>';
          
            
            //cookie
            $id=$this->sifrele($gelendeger["id"]);
            setcookie("kulbilgi",$id, time() + 60*60*24);
            endif;
        }///giris

        function cikis($vt){
            $cookid=$_COOKIE["kulbilgi"];
            setcookie("kulbilgi",$cookid, time() - 5);
            header("refresh:2,url=".URL."index.php?sayfa=home");
            echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">Cıkış başarılı!</div>';
            
        }//cikis

        function hesapsil($vt)
        {
            $cookid=$_COOKIE["kulbilgi"];
            $cozduk=$this->coz($cookid);
            $sorgu = $vt->prepare("delete from members where id=$cozduk");
            $sorgu->execute();
            $this->cikis($vt);
        }

        function konrolet($sayfa)
        {
            if(isset($_COOKIE["kulbilgi"])):
                if($sayfa=="ind"):
                    header("Location:".URL."control.php");
                endif;
            
            else:
                if($sayfa=="cot"):
                    header("Location:".URL."index.php"); 
                endif;
            endif;
    
        }//cookie

        function reg($vt)
        {
            
            if($_POST):
                $mailadres=htmlspecialchars($_POST["mailinput"]);
                $username=htmlspecialchars($_POST["usernameinput"]);
                $sifre=htmlspecialchars($_POST["sifreinput"]);
                $sifre = md5(sha1(md5($sifre)));
                $ayarcek = $vt->prepare("insert into members(mail,password,username) values('$mailadres','$sifre','$username')");
                $ayarcek->execute();
                echo '<div class="alert alert-success mt-5" role="alert">
                <strong>Başarıyla Kayıt Olundu</strong>
                </div>';
                
            else:
            echo
            '
            <section class="updatedVerify">
                <div id="container-reset-password" class="container">
                    <h1>Register</h1>
                    <div class="inputBoxLeft">
                    <form action="index.php?sayfa=reg" method="post">
                        <ul>
                        <li>
                            <label for="mail"></label>
                            <span><input type="text" id="password" name="mailinput" placeholder="mail"></span>
                        </li>
                        <li>
                            
                            <span><input type="text" id="password" name="usernameinput" placeholder="username"></span>
                        </li>
                        <li>
                            <span><input type="password" id="password-verify" name="sifreinput" placeholder="Password"  /></span>
                            
                            
                        </li>
                        <li>
                        <span><a href="index.php?sayfa=logreg">Already have an account ?</a></span>
                             
                        </li>
                        <li>
                            <input class="passwordButton" type="submit" value="Register">
                        </li>
                        </ul>
                    </form>
                    </div>
                </div>


            </section>
                
            
                
            
            ';
            endif;
        }


    }













?>
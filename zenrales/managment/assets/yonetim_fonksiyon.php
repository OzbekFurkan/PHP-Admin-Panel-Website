<?php 
ob_start();
 try {
 $baglanti=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SIFRE);
            $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            }catch(PDOException $e){
                die($e->getMessage());
            }
 
class yonetim 
{
    function sorgum($vt,$sorgu,$tercih=0){
       
        $al = $vt->prepare($sorgu);
        $al->execute();
        if($tercih==1):
            return $al->fetch();
            elseif($tercih==2):
            return $al;
        endif;
    

    }//genel sorgu

    function siteayar($baglanti) {
        $sonuc=$this->sorgum($baglanti,"select * from siteayar_home",1 );
        if($_POST):
            //$hero_img=htmlspecialchars($_POST["hero_img"]);
            $hero_h1=htmlspecialchars($_POST["hero_h1"]);
            $hero_h5=htmlspecialchars($_POST["hero_h5"]);
            $btn1_txt=htmlspecialchars($_POST["btn1_txt"]);
            $btn1_yol=htmlspecialchars($_POST["btn1_yol"]);
            $btn2_txt=htmlspecialchars($_POST["btn2_txt"]);
            $btn2_yol=htmlspecialchars($_POST["btn2_yol"]);
            $new1=htmlspecialchars($_POST["new1"]);
            $new2=htmlspecialchars($_POST["new2"]);
            $new3=htmlspecialchars($_POST["new3"]);
            //$about_img=htmlspecialchars($_POST["about_img"]);
            $about_h1=htmlspecialchars($_POST["about_h1"]);
            $about_h4=htmlspecialchars($_POST["about_h4"]);
            $about_slogan=htmlspecialchars($_POST["about_slogan"]);
            $oyun_sayisi=htmlspecialchars($_POST["oyun_sayisi"]);
            $oyuncu_sayisi=htmlspecialchars($_POST["oyuncu_sayisi"]);
            $partner_sayisi=htmlspecialchars($_POST["partner_sayisi"]);
            
            $contact_h1=htmlspecialchars($_POST["contact_h1"]);
            $contact_h4=htmlspecialchars($_POST["contact_h4"]);
            $footer_content=htmlspecialchars($_POST["footer_content"]);
            
            $guncelleme=$baglanti->prepare("update siteayar_home set 
            hero_h1=?, hero_h5=?, btn1_txt=?, btn1_yol=?, btn2_txt=?, btn2_yol=?, new1=?, new2=?, new3=?, about_h1=?, about_h4=?, about_slogan=?, oyun_sayisi=?, oyuncu_sayisi=?, 
            partner_sayisi=?, contact_h1=?, contact_h4=?, footer_content=? ");
            
            $guncelleme->bindParam(1,$hero_h1,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$hero_h5,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$btn1_txt,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$btn1_yol,PDO::PARAM_STR);
            $guncelleme->bindParam(5,$btn2_txt,PDO::PARAM_STR);
            $guncelleme->bindParam(6,$btn2_yol,PDO::PARAM_STR);
            $guncelleme->bindParam(7,$new1,PDO::PARAM_STR);
            $guncelleme->bindParam(8,$new2,PDO::PARAM_STR);
            $guncelleme->bindParam(9,$new3,PDO::PARAM_STR);
            
            $guncelleme->bindParam(10,$about_h1,PDO::PARAM_STR);
            $guncelleme->bindParam(11,$about_h4,PDO::PARAM_STR);
            $guncelleme->bindParam(12,$about_slogan,PDO::PARAM_STR);
            $guncelleme->bindParam(13,$oyun_sayisi,PDO::PARAM_STR);
            $guncelleme->bindParam(14,$oyuncu_sayisi,PDO::PARAM_STR);
            $guncelleme->bindParam(15,$partner_sayisi,PDO::PARAM_STR);
            $guncelleme->bindParam(16,$contact_h1,PDO::PARAM_STR);
            $guncelleme->bindParam(17,$contact_h4,PDO::PARAM_STR);
            $guncelleme->bindParam(18,$footer_content,PDO::PARAM_STR);
            
            $guncelleme->execute();
            echo '<div class="alert alert-success mt-5" role="alert">
            <strong>Site ayarları</strong> başarıyla güncellendi.
            </div>';
            header("refresh:2,url=".urlyon."control.php?sayfa=siteayar");
        else:
        ?>
      <form action="<?php echo urlyon ?>control.php?sayfa=siteayar" method="post">
        <div class="row">
        <div class="col-lg-8 mx-auto mt-2">
        <h3 class="text-info">Site Ayarları
     
        </h3>
        </div>
       
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">hero_h1</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="hero_h1" class="form-control" value="<?php echo $sonuc['hero_h1'];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">hero_h5</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="hero_h5" class="form-control" value="<?php echo $sonuc["hero_h5"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">btn1_txt</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="btn1_txt" class="form-control" value="<?php echo $sonuc["btn1_txt"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">btn1_yol</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="btn1_yol" class="form-control" value="<?php echo $sonuc["btn1_yol"];?>" />
        </div>
        </div>
        </div>
         <!--ara-->
         <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">btn2_txt</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="btn2_txt" class="form-control" value="<?php echo $sonuc["btn2_txt"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">btn2_yol</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="btn2_yol" class="form-control" value="<?php echo $sonuc["btn2_yol"];?>"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">new1</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="new1" class="form-control" value="<?php echo $sonuc["new1"];?>"   />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">new2</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="new2" class="form-control" value="<?php echo $sonuc["new2"];?>"   />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">new3</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="new3" class="form-control" value="<?php echo $sonuc["new3"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about_h1</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about_h1" class="form-control" value="<?php echo $sonuc["about_h1"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about_h4</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about_h4" class="form-control" value="<?php echo $sonuc["about_h4"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about_slogan</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about_slogan" class="form-control" value="<?php echo $sonuc["about_slogan"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">oyun_sayisi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="oyun_sayisi" class="form-control" value="<?php echo $sonuc["oyun_sayisi"];?>"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">oyuncu_sayisi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="oyuncu_sayisi" class="form-control" value="<?php echo $sonuc["oyuncu_sayisi"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">partner_sayisi</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="partner_sayisi" class="form-control" value="<?php echo $sonuc["partner_sayisi"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">contact_h1</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="contact_h1" class="form-control" value="<?php echo $sonuc["contact_h1"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">contact_h4</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="contact_h4" class="form-control" value="<?php echo $sonuc["contact_h4"];?>"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">footer_content</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="footer_content" class="form-control" value="<?php echo $sonuc["footer_content"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        
       
        <div class="col-lg-8 mx-auto mt-2 border-bottom">
        <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
        </div>
        </div>
        </form>
       <?php
      endif;
      
    } //siteayar kısmı





    function images_home($vt){
        echo '<div class="row text-center">
        
        <div class="col-lg-12">
        <h4 class="float-left mt-3 text-info bg-secondary">
        
        Hero Image</h4> </div>';
        //$introbilgiler=$vt->prepare("select * from intro");
        $introbilgiler=$this->sorgum($vt,"select * from siteayar_home",2);
        $sonbilgi=$introbilgiler->fetch();
        echo '<div class="col-lg-4">
        <div class="row card-bordered  p-1 m-1" style ="width:1500px; height:1024px;">
        <div class="col-lg-12 bg-dark">
        <img src="../'.$sonbilgi["hero_img"].'" style ="width:1500px; height:1024px;">
   
        <a href="control.php?sayfa=heroimgguncelle" class="m-2 text-success" style="font-size:20px;">Guncelle</a>
        
     
        </div> </div>
        </div>';
        // -----------------------------------------------------------------------------             about   image     --------------------------------------------------------------  
        echo'
        <div class="col-lg-12 mt-5">
        <h4 class="float-left mt3 text-info bg-secondary">
        
        About Image</h4> </div>';
        //$introbilgiler=$vt->prepare("select * from intro");
        $introbilgiler=$this->sorgum($vt,"select * from siteayar_home",2);
        $sonbilgi=$introbilgiler->fetch();
        echo '<div class="col-lg-4">
        <div class="row card-bordered  p-1 m-1" style ="width:1500px; height:1024px;">
        <div class="col-lg-12 bg-dark">
        <img src="../'.$sonbilgi["about_img"].'" style ="width:1500px; height:1024px;">
        
        <a href="control.php?sayfa=aboutimgguncelle" class="m-2 text-success" style="font-size:20px;">Guncelle</a>
        
        
        </div> </div>
        </div>';
        // -----------------------------------------------------------------------------             contact   image     --------------------------------------------------------------
        echo'
        <div class="col-lg-12 mt-5">
        <h4 class="float-left mt-3 text-info bg-secondary">
        
        Contact Image</h4> </div>';
        //$introbilgiler=$vt->prepare("select * from intro");
        $introbilgiler=$this->sorgum($vt,"select * from siteayar_home",2);
        $sonbilgi=$introbilgiler->fetch();
        echo '<div class="col-lg-4">
        <div class="row card-bordered  p-1 m-1" style ="width:1500px; height:1024px;">
        <div class="col-lg-12 bg-dark">
        <img src="../'.$sonbilgi["contact_img"].'" style ="width:1500px; height:1024px;">
        
        <a href="control.php?sayfa=contactimgguncelle" class=" m-2 text-success" style="font-size:20px;">Guncelle</a>
        
        
        </div> </div>
        </div>';
        // -----------------------------------------------------------------------------             ara    --------------------------------------------------------------

        echo '</div>';

    }//vt resimleri geldi


    function heroguncelleme($vt){
        
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            // <?php echo $gelenşntroid;
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=".urlyon."control.php?sayfa=heroimgguncelle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=".urlyon."control.php?sayfa=heroimgguncelle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=".urlyon."control.php?sayfa=heroimgguncelle");
                    else://kosullar tamam
                        // yeniyi kaydet
                       
                        $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $this->sorgum($vt,"update siteayar_home set hero_img='$dosyaminyolu2'",0);
                        echo '<div class="alert alert-success mt-5">
                        Güncelleme başarılı.</div>';
                        header("refresh:2,url=".urlyon."control.php?sayfa=images_home");
                      
        //veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">Hero Image güncelleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             </p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';
    }

    function aboutimgguncelleme($vt){
        
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            // <?php echo $gelenşntroid;
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=".urlyon."control.php?sayfa=aboutimgguncelle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=".urlyon."control.php?sayfa=aboutimgguncelle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=".urlyon."control.php?sayfa=aboutimgguncelle");
                    else://kosullar tamam
                        // yeniyi kaydet
                       
                        $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $this->sorgum($vt,"update siteayar_home set about_img='$dosyaminyolu2'",0);
                        echo '<div class="alert alert-success mt-5">
                        Güncelleme başarılı.</div>';
                        header("refresh:2,url=".urlyon."control.php?sayfa=images_home");
                      
        //veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">About Image güncelleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             </p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';
    }

    function contactimgguncelleme($vt){
        
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            // <?php echo $gelenşntroid;
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=".urlyon."control.php?sayfa=contactimgguncelle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=".urlyon."control.php?sayfa=contactimgguncelle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=".urlyon."control.php?sayfa=contactimgguncelle");
                    else://kosullar tamam
                        // yeniyi kaydet
                       
                        $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $this->sorgum($vt,"update siteayar_home set contact_img='$dosyaminyolu2'",0);
                        echo '<div class="alert alert-success mt-5">
                        Güncelleme başarılı.</div>';
                        header("refresh:2,url=".urlyon."control.php?sayfa=images_home");
                      
            //veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">Contact Image güncelleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             </p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';
    }


    function gamepanel($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">
        <h4 class="float-left mt-3 text-info mb-2">
        <a href="control.php?sayfa=gameekle" class=" bg-success p-1 text-white mr-2 mt-3">Game ekle</a>
        Game Bilgileri</h4> </div>';
        //$introbilgiler=$vt->prepare("select * from intro");
        $introbilgiler=$this->sorgum($vt,"select * from games",2);
        while($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):
        echo '<div class="col-lg-12">
        <div class="row card-bordered  p-1 m-1">
        <div class="col-lg-12">
        <img src="../'.$sonbilgi["game_pic"].'">
        
        <a href="control.php?sayfa=gameimgguncelle&id='.$sonbilgi["id"].'" class=" m-2 text-success" style="font-size:20px;">image guncelle</a>
        <a href="control.php?sayfa=gamesil&id='.$sonbilgi["id"].'" class=" m-2 text-success" style="font-size:20px;">Game sil</a>
        
        </div> </div>
        </div>


        <form action="control.php?sayfa=games" method="post">
        <div class="row">';
        
        if($_POST):
            $sonid = $_POST["sonid"];
            $platform=htmlspecialchars($_POST["platform"]);
            $category=htmlspecialchars($_POST["category"]);
            $title=htmlspecialchars($_POST["title"]);
            $slogan=htmlspecialchars($_POST["slogan"]);
            $text=htmlspecialchars($_POST["text"]);
            $trailer_link=htmlspecialchars($_POST["trailer_link"]);
            $download_link=htmlspecialchars($_POST["download_link"]);
            $guncelleme=$vt->prepare("update games set 
            platform=?, category=?, title=?, slogan=?, text=?, trailer_link=?, download_link=? where id=".$sonid);
            
            $guncelleme->bindParam(1,$platform,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$category,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$title,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$slogan,PDO::PARAM_STR);
            $guncelleme->bindParam(5,$text,PDO::PARAM_STR);
            $guncelleme->bindParam(6,$trailer_link,PDO::PARAM_STR);
            $guncelleme->bindParam(7,$download_link,PDO::PARAM_STR);

            $guncelleme->execute();
            echo '<div class="alert alert-success mt-5" role="alert">
            <strong>Game bilgileri</strong> başarıyla güncellendi.
            </div>';
            header("refresh:2,url=".urlyon."control.php?sayfa=games");
        else:
        ?>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">platform</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="platform" class="form-control" value="<?php echo $sonbilgi["platform"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">category</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="category" class="form-control" value="<?php echo $sonbilgi["category"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">title</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="title" class="form-control" value="<?php echo $sonbilgi["title"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">slogan</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="slogan" class="form-control" value="<?php echo $sonbilgi["slogan"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">text</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="text" class="form-control" value="<?php echo $sonbilgi["text"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">trailer_link</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="trailer_link" class="form-control" value="<?php echo $sonbilgi["trailer_link"];?>"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">download_link</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="download_link" class="form-control" value="<?php echo $sonbilgi["download_link"];?>"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        
       
        <div class="col-lg-8 mx-auto mt-2 border-bottom">
        <input type="hidden" name="sonid" class="btn btn-info m-1" value="<?php echo $sonbilgi["id"];?>" />
        <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
        </div>
        </div>
        </form>
        
            <?php
            endif;
            echo'
        ';
        endwhile;
        echo '</div>';
    }//vt resimleri geldi
    function gameimgguncelleme($vt){
        $gelenid = $_GET["id"];
        echo '<div class="row text-center">
        <div class="col-lg-12">';
        if($_POST):
            // <?php echo $gelenşntroid;
            //dosya bos mu dolumu
            //boyut uygunmu
            //uzanttı 
            //son
            
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=".urlyon."control.php?sayfa=gameimgguncelle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=".urlyon."control.php?sayfa=gameimgguncelle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=".urlyon."control.php?sayfa=gameimgguncelle");
                    else://kosullar tamam
                        // yeniyi kaydet
                       
                        $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $this->sorgum($vt,"update games set game_pic='$dosyaminyolu2' where id=".$gelenid,0);
                        echo '<div class="alert alert-success mt-5">
                        Güncelleme başarılı.</div>';
                        header("refresh:2,url=".urlyon."control.php?sayfa=games");
                      
        //veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
      
        else:
             ?>
             <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom"><?php echo $gelenid; ?> idli Game Image güncelleme formu</h5>
             <form action="" method="post" enctype="multipart/form-data">
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             </p>
             <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
             </form>
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
            <?php 
        endif;
        echo '</div></div>';
    }



    function gameekle($vt){
        echo '<div class="row text-center">
        <div class="col-lg-12">
        <h4 class="float-left mt-3 text-info mb-2">
        
        Game Ekle</h4> </div>';
        
       
       
        echo '<div class="col-lg-12">
        <div class="row card-bordered  p-1 m-1">
        <div class="col-lg-12">
        
        
        
        
        
        </div> </div>
        </div>


        <form action="control.php?sayfa=gameekle" method="post" enctype="multipart/form-data">
        <div class="row">';
        
        if($_POST):
            
            
            

            
            if($_FILES["dosya"]["name"]==""):
                echo '<div class="alert alert-danger mt-5">
                Dosya yüklenmedi, bu alan boş olamaz.</div>';
                header("refresh:2,url=".urlyon."control.php?sayfa=gameimgguncelle");
            else://bos degilese
                if($_FILES["dosya"]["size"]>(1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">
                    Dosya boyutu çok fazla!</div>';
                    header("refresh:2,url=".urlyon."control.php?sayfa=gameimgguncelle");
                else://boyut uygunsa
                    $izinverilen=array("image/png", "image/jpeg");
                    if(!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">
                       İzin verilen uzantı değil!</div>';
                       header("refresh:2,url=".urlyon."control.php?sayfa=gameimgguncelle");
                    else://kosullar tamam
                        // yeniyi kaydet
                       
                        $dosyaminyolu='../img/'.$_FILES["dosya"]["name"];
                    
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        $dosyaminyolu2=str_replace('../','',$dosyaminyolu);
                        $platform=htmlspecialchars($_POST["platform"]);
                        $category=htmlspecialchars($_POST["category"]);
                        $title=htmlspecialchars($_POST["title"]);
                        $slogan=htmlspecialchars($_POST["slogan"]);
                        $text=htmlspecialchars($_POST["text"]);
                        $trailer_link=htmlspecialchars($_POST["trailer_link"]);
                        $download_link=htmlspecialchars($_POST["download_link"]);
                        $guncelleme=$vt->prepare("insert into games(
                        platform, category, title, slogan, text, trailer_link, download_link, game_pic) values('$platform','$category','$title','$slogan','$text','$trailer_link','$download_link', '$dosyaminyolu2')");
                        $guncelleme->execute();
                        
                      
        //veritabanına ekleme-----------
 
                    endif;
                endif; 
        endif;
            echo '<div class="alert alert-success mt-5" role="alert">
            <strong>Game</strong> başarıyla geklendi.
            </div>';
            header("refresh:2,url=".urlyon."control.php?sayfa=games");
        else:
        ?>
         <div class="col-lg-4 mx-auto mt-2">
             <div class="card card-bordered">
             <div class="card-body">
             <h5 class="title border-bottom">Game ekleme</h5>
             
             <p class="card-text">
             <input type="file" name="dosya" /></p>
             <p class="card-text">
             </p>
             
             
             <p class="card-text text-left text-danger border-top">
             * İzin verilen formatlar : jpeg, png<br/>
             * izn verilen max. boyut : 5Mb
             </p>
             </div>
             </div>
             </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">platform</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="platform" class="form-control"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">category</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="category" class="form-control"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">title</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="title" class="form-control"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">slogan</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="slogan" class="form-control"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">text</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="text" class="form-control"   />
        </div>
        </div>
        </div>
        <!--ara--> 
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">trailer_link</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="trailer_link" class="form-control"   />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">download_link</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="download_link" class="form-control"  />
        </div>
        </div>
        </div>
        <!--ara--> 
        
       
        <div class="col-lg-8 mx-auto mt-2 border-bottom">
        
        <input type="submit" name="buton" class="btn btn-info m-1" value="Ekle" />
        </div>
        </div>
        </form>
        
            <?php
            endif;
            echo'
        ';
        
        echo '</div>';
    }//vt resimleri geldi

    function gamesil($vt)
    {
        $gelenid=$_GET["id"];
        $this->sorgum($vt,"delete from games where id=".$gelenid,0);
        echo '<div class="alert alert-success mt-5" role="alert">
            <strong>Game</strong> başarıyla silindi.
            </div>';
            header("refresh:2,url=".urlyon."control.php?sayfa=games");
    }


    function about($baglanti) {
        
        
        if($_POST):
            $gelenid=$_POST["sonid"];
            $about1_h3=htmlspecialchars($_POST["about1_h3"]);
            $about1_p=htmlspecialchars($_POST["about1_p"]);
            $about2_h3=htmlspecialchars($_POST["about2_h3"]);
            $about2_p=htmlspecialchars($_POST["about2_p"]);

            
            $guncelleme=$baglanti->prepare("update about set 
            about1_h3=?, about1_p=?, about2_h3=?, about2_p=? where id=".$gelenid);
            
            $guncelleme->bindParam(1,$about1_h3,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$about1_p,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$about2_h3,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$about2_p,PDO::PARAM_STR);

            
            
            $guncelleme->execute();
            echo '<div class="alert alert-success mt-5" role="alert">
            <strong>About ayarları</strong> başarıyla güncellendi.
            </div>';
            header("refresh:2,url=".urlyon."control.php?sayfa=about");
        else:
        ?><h3 class="text-info">About Ayarları </h3>
        <a class="text-success" href="<?php echo urlyon ?>control.php?sayfa=aboutekle">About Ekle</a>
         <?php $sonuc = $baglanti->prepare("select * from about"); $sonuc->execute(); while($son = $sonuc->fetch(PDO::FETCH_ASSOC)):
        ?>
      <form action="<?php echo urlyon ?>control.php?sayfa=about" method="post">
        
       
        <div class="row">
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <span id="siteayarfont">about section</span>
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about1_h3</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about1_h3" class="form-control" value="<?php echo $son['about1_h3'];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about1_p</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about1_p" class="form-control" value="<?php echo $son["about1_p"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about2_h3</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about2_h3" class="form-control" value="<?php echo $son["about2_h3"];?>" />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about2_p</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about2_p" class="form-control" value="<?php echo $son["about2_p"];?>" />
        </div>
        </div>
        </div>
         <!--ara-->
        
       
        <div class="col-lg-8 mx-auto mt-2 border">
        <input type="hidden" name="sonid" class="btn btn-info m-1" value="<?php echo $son["id"];?>" />
        <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
        <a href="<?php echo urlyon ?>control.php?sayfa=aboutsil&id=<?php echo $son["id"];?>" class="bg-dark text-white">About Sil</a>
        </div>
        </div>
        
        </form>
        <?php endwhile; ?>
        <?php
        
       
      endif;
      
    } //siteayar kısmı

    function aboutekle($baglanti) {
        
        
        if($_POST):
            
            $about1_h3=htmlspecialchars($_POST["about1_h3"]);
            $about1_p=htmlspecialchars($_POST["about1_p"]);
            $about2_h3=htmlspecialchars($_POST["about2_h3"]);
            $about2_p=htmlspecialchars($_POST["about2_p"]);

            
            $guncelleme=$baglanti->prepare("insert into about(about1_h3, about1_p, about2_h3, about2_p) values( ?, ?, ?, ?)");
            
            $guncelleme->bindParam(1,$about1_h3,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$about1_p,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$about2_h3,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$about2_p,PDO::PARAM_STR);

            
            
            $guncelleme->execute();
            echo '<div class="alert alert-success mt-5" role="alert">
            <strong>About ayarları</strong> başarıyla eklendi.
            </div>';
            header("refresh:2,url=".urlyon."control.php?sayfa=about");
        else:
        ?><h3 class="text-info">About Ayarları </h3>
        
        
      <form action="<?php echo urlyon ?>control.php?sayfa=aboutekle" method="post">
        
       
        <div class="row">
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <span id="siteayarfont">about section</span>
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about1_h3</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about1_h3" class="form-control"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about1_p</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about1_p" class="form-control"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about2_h3</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about2_h3" class="form-control"  />
        </div>
        </div>
        </div>
        <!--ara-->
        <div class="col-lg-8 mx-auto border">
        <div class="row">
        <div class="col-lg-3 border-right pt-3 text-left">
        <span id="siteayarfont">about2_p</span>
        </div>
        <div class="col-lg-9 p-1">
        <input type="text" name="about2_p" class="form-control"  />
        </div>
        </div>
        </div>
         <!--ara-->
        
       
        <div class="col-lg-8 mx-auto mt-2 border">
        
        <input type="submit" name="buton" class="btn btn-info m-1" value="Ekle" />
        </div>
        </div>
        
        </form>
        
        <?php
        
       
      endif;
      
    } //siteayar kısmı

    function aboutsil($vt)
    {   
        $songelenid=$_GET["id"];
        $this->sorgum($vt, "delete from about where id=".$songelenid, 0);
        echo '<div class="alert alert-success mt-5" role="alert">
        <strong>About</strong> başarıyla silindi.
        </div>';
        header("refresh:2,url=".urlyon."control.php?sayfa=about");
    }




    private function mailgetir($vt,$veriler){
        $sor=$vt->prepare("select * from $veriler[0] where  durum=$veriler[1]");
        $sor->execute();
        return $sor;
    }
    function gelenmesajlar($vt){
        echo '<div class="row">
        <div class="col-lg-12 mt-2">
        <div class="card">
        <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="gelen-tab" data-toggle="tab" href="#gelen" role="tab"
        aria-control="gelen" aria-selected="true">
        <kbd>'.$this->mailgetir($vt,array("gelenmail", 0))->rowCount().'</kbd>Gelen Mesajlar</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  id="okunmus-tab" data-toggle="tab" href="#okunmus" role="tab"
        aria-control="okunmus" aria-selected="false">
        <kbd>'.$this->mailgetir($vt,array("gelenmail", 1))->rowCount().'</kbd>Okunmus Mesajlar</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  id="arsiv-tab" data-toggle="tab" href="#arsiv" role="tab"
        aria-control="arsiv" aria-selected="false">
        <kbd>'.$this->mailgetir($vt,array("gelenmail", 2))->rowCount().'</kbd>Arsivlenmiş Mesajlar</a>
        </li>
        </ul>
        <div class="tab-content mt-3" id="benimTab">
        <div class="tab-pane fade show active" id="gelen" role="tabpanel" aria-labelbdy="gelen-tab">';
        $sonuc=$this->mailgetir($vt,array("gelenmail", 0));
        if($sonuc->rowCount()!=0):
            while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
                echo '<div class="row">
                <div class="col-lg-12 bg-light mt-2 font-weight-bold">
                <div class="row border-bottom">
                <div class="col-lg-1 p-1">Ad & Ünvan</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                <div class="col-lg-1 p-1">Mail Adresi</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                <div class="col-lg-1 p-1">Konu</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                <div class="col-lg-1 p-1">Tarih</div>
                <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                <div class="col-lg-1 p-1">
                <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
                <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
                <i class="fa fa-share border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
                <i class="fa fa-close  pr-2 text-dark"></i></a>
                </div></div></div>
                </div>';
            
                endwhile;
            else:
                echo '<div class="alert alert-info">Gelen mesaj yok</div>';
        endif;
        echo'</div>
        <div class="tab-pane fade" id="okunmus" role="tabpanel" aria-labelbdy="okunmus-tab">
        ';
        $sonuc=$this->mailgetir($vt,array("gelenmail", 1));
        if($sonuc->rowCount()!=0):
            while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
                echo '<div class="row">
                <div class="col-lg-12 bg-light mt-2 font-weight-bold">
                <div class="row border-bottom">
                <div class="col-lg-1 p-1">Ad & Ünvan</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                <div class="col-lg-1 p-1">Mail Adresi</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                <div class="col-lg-1 p-1">Konu</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                <div class="col-lg-1 p-1">Tarih</div>
                <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                <div class="col-lg-1 p-1">
                <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
                <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
                <i class="fa fa-share border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
                <i class="fa fa-close  pr-2 text-dark"></i></a>
                </div></div></div>
                </div>';
            
                endwhile;
            else:
                echo '<div class="alert alert-info">Okunmus mesaj yoktur.</div>';
        endif;
        echo'
        </div>
        <div class="tab-pane fade" id="arsiv" role="tabpanel" aria-labelbdy="arsiv-tab">
        ';
        $sonuc=$this->mailgetir($vt,array("gelenmail", 2));
        if($sonuc->rowCount()!=0):
            while($sonucson=$sonuc->fetch(PDO::FETCH_ASSOC)):
                echo '<div class="row">
                <div class="col-lg-12 bg-light mt-2 font-weight-bold">
                <div class="row border-bottom">
                <div class="col-lg-1 p-1">Ad & Ünvan</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                <div class="col-lg-1 p-1">Mail Adresi</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                <div class="col-lg-1 p-1">Konu</div>
                <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                <div class="col-lg-1 p-1">Tarih</div>
                <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                <div class="col-lg-1 p-1">
                <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'">
                <i class="fa fa-folder-open border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'">
                <i class="fa fa-share border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'">
                <i class="fa fa-close  pr-2 text-dark"></i></a>
                </div></div></div>
                </div>';
            
                endwhile;
            else:
                echo '<div class="alert alert-info">Arşivlenmiş mesaj yoktur.</div>';
        endif;
        echo'
        </div>
        </div></div></div></div></div>';
    }
    function mesajdetay($vt,$id){
        $mesajbilgi=$this->sorgum($vt,"select * from gelenmail where id=$id",1);
     
                echo '<div class="row mt-2">
                <div class="col-lg-12 bg-light mt-2 font-weight-bold">
                <div class="row border-bottom">
                <div class="col-lg-1 p-1">Ad & Ünvan</div>
                <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["ad"].'</div>
                <div class="col-lg-1 p-1">Mail Adresi</div>
                <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailadres"].'</div>
                <div class="col-lg-1 p-1">Konu</div>
                <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["konu"].'</div>
                <div class="col-lg-1 p-1">Tarih</div>
                <div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["zaman"].'</div>
                <div class="col-lg-1 p-1">
    
                <a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["id"].'">
                <i class="fa fa-share border-right pr-2 text-dark"></i></a>
                <a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["id"].'">
                <i class="fa fa-close  pr-2 text-dark"></i></a>
                </div></div>
                <div class="row text-left p-2">
                <div class="col-lg-12">
                '.$mesajbilgi["mesaj"].'
                </div>
                </div></div></div></div>';
                $this->sorgum($vt,"update gelenmail set durum=1 where id=$id",0);
                //durum guncellemesi bitti
    
    }
    function mesajarsivle($vt,$id){
                 echo '<div class="row mt-2">
                <div class="col-lg-12 mt-2 font-weight-bold">
                <div class="alert alert-info mt-2 mb-2">Mesaj arşivlendi.</div>
                </div></div>';
                header("refresh:2,url=".urlyon."control.php?sayfa=gelenmesaj");
                $this->sorgum($vt,"update gelenmail set durum=2 where id=$id",0);
    
    }
    function mesajsil($vt,$id){
        echo '<div class="row mt-2">
       <div class="col-lg-12 mt-2 font-weight-bold">
       <div class="alert alert-info mt-2 mb-2">Mesaj silindi.</div>
       </div></div>';
       header("refresh:2,url=".urlyon."control.php?sayfa=gelenmesaj");
       $this->sorgum($vt,"delete from gelenmail where id=$id",0);
    
    }



    function kullanici($baglanti)
    {
        $id=$this->coz($_COOKIE["kulbilgi2"]);
        $sorgu=$baglanti->prepare("select * from admins where id=$id");
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
                header("refresh:1,url=".urlyon."control.php?sayfa=kullanici");
            else:
            $sifrelihal=md5(sha1(md5($eskisif)));
            if($sonuc['sifre']!=$sifrelihal):
                echo '<div class="alert alert-danger mt-5">Eski şifre hatalı girildi.</div>';
                header("refresh:1,url=".urlyon."control.php?sayfa=kullanici");
            else:
                if($yenisif!=$yenisif2):
                    echo '<div class="alert alert-danger mt-5">Yeni şifreler eşleşmiyor.</div>';
                    header("refresh:1,url=".urlyon."control.php?sayfa=kullanici");
                else:
                    $yenisifson=md5(sha1(md5($yenisif)));
                    $guncelleme=$baglanti->prepare("update admins set 
                    sifre=? where id=$id");
                    $guncelleme->bindParam(1,$yenisifson,PDO::PARAM_STR);
                    $guncelleme->execute();
                    echo '<div class="alert alert-success mt-5">
                Bilgiler başarıyla güncellendi.
                    </div>';
                    header("refresh:1,url=".urlyon."control.php?sayfa=kullanici");
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
                <form action="control.php?sayfa=kullanici" method="post">
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



    function sifrele($veri){
        return base64_encode(gzdeflate(gzcompress(serialize($veri))));
        
    }

    function coz($veri){
        return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
    }

    function kuladial($vt){
        $cookid=$_COOKIE["kulbilgi2"];
        $cozduk=$this->coz($cookid);
        $sorgusonuc=$this->sorgum($vt,"select * from admins where id=$cozduk",1);
        return $sorgusonuc["kulad"];
    }//kullanıcı adı ayarla

    function giriskontrol($kulad,$sifre,$vt)  {
        $sifrelihal=md5(sha1(md5($sifre)));
        $sor=$vt->prepare("select * from admins where kulad='$kulad' and sifre='$sifrelihal'");
        $sor->execute();
       
        if($sor->rowCount()==0):
            echo '
            <div class="container-fluid bg-white">
            <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-danger font-14 font-weight-bold">
            Bilgiler hatalı!</div>
            </div>';
     
            header("refresh:2,url=".urlyon."index.php");
        else:
        $gelendeger=$sor->fetch();
        $sor=$vt->prepare("update admins set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
        $sor->execute();
        echo '
        <div class="container-fluid bg-white">
        <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auto p-3 text-success font-14 font-weight-bold">
        Giriş başarılı!</div>
        </div>';
      
        header("refresh:2,url=".urlyon."control.php");
        //cookie
        $id=$this->sifrele($gelendeger["id"]);
        setcookie("kulbilgi2",$id, time() + 60*60*24);
        endif;
    }///giris

    function cikis($vt){
        $cookid=$_COOKIE["kulbilgi2"];
        $cozduk=$this->coz($cookid);
        $this->sorgum($vt,"update admins set aktif=0 where id=$cozduk",0);
        setcookie("kulbilgi2",$cookid, time() - 5);
        echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">Cıkış başarılı!</div>';
        header("refresh:2,url=".urlyon."index.php");
    }//cikis

    function konrolet($sayfa){
        if(isset($_COOKIE["kulbilgi2"])):
            if($sayfa=="ind"):
                header("Location:".urlyon."control.php");
            endif;
        
        else:
            if($sayfa=="cot"):
                header("Location:".urlyon."index.php"); 
            endif;
        endif;

    }//cookie
}
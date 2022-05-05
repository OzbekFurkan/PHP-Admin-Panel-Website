<?php
include_once("config/config.php");
try 
{
    $baglanti=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_KULAD,DB_SIFRE."");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die($e->getMessage());
}

if($_POST)
{

$username = $_POST["log_username"];
$password = md5(sha1(md5($_POST["log_password"])));


if($username=="" && $password==""):
    echo 'Please fill the inputs';
else:
        
        $sor=$baglanti->prepare("select * from members where username='$username' and password='$password'");
        $sor->execute();
       
        if($sor->rowCount()==0):
            echo 'Unsuccesful!';
     
            
        else:
        $gelendeger=$sor->fetch();
        
        echo $gelendeger["username"];
        
        endif;
       
endif;

}

?>
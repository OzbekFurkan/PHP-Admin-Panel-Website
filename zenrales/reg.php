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

$mail = $_POST["reg_mail"];
$username = $_POST["reg_username"];
$password = md5(sha1(md5($_POST["reg_password"])));


if($mail=="" && $username=="" && $password==""):
    echo 'Please fill the inputs';
else:
    $sor=$baglanti->prepare("insert into members(mail, username, password) values('$mail','$username','$password')");
    $sor->execute();
    echo'Account has created';
       
endif;

}

?>
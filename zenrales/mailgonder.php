<?php
    
use PHPMailer\PHPMailer\PHPMailer;

        
class mailyolla
{
            
    function mailg($ad, $mailadres, $konu, $mesaj)
    {
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();


        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'mail.zenrales.net';
        $mail->Port = 465;
        $mail->SMTPAuth=true;
        $mail->Username="deneme@zenrales.net";
        $mail->Password="Furkan_2002!";
        //$mail->SMTPDebug = 2;

        $mail->isHTML(true);
        $mail->setFrom($mailadres, $ad);
        $mail->addAddress("zenrales@gmail.com","Furkan Ozbek");
        $mail->Subject=$konu;
        $mail->Body=$mesaj;

            if($mail->send()):
                //echo"Mail sent successfully";
            else:
                //echo"Mail sent failed: ".$mail->ErrorInfo;
                
            endif;
    }
}
        
?>
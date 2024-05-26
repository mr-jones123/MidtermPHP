<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Dotenv\Dotenv;
//Load Composer's autoloader
require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);


function welcomeEmail($email)
{
    $usn_email = getenv("EMAIL");
    $app_pwd = getenv("APP_PASSWORD");
    $smtp_host = getenv("SMTP_HOST");
    try {
        //Server settings
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;             
        $mail->isSMTP();                                         
        $mail->Host = $smtp_host;                     
        $mail->SMTPAuth = true;                                
        $mail->Username = $usn_email;                   
        $mail->Password = $app_pwd;                          
        $mail->Port = 465;                                   

        //Recipients
        $mail->setFrom($usn_email, 'Mailer');
        $mail->addAddress($email, 'The User');    

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Hey! Welcome Aboard!  ';
        $mail->Body = '<h1>Xy\'s Video Store</h1>
                    <p>
                        Dear User,<br>
                        Welcome to Xy\'s Video Store where you can rent any movie, series on-the-go without ever 
                        need to subscribe to any platform! Our website provides cheaper options for you to enjoy
                        watching!
                    </p>
                    <p>
                        If you have any questions, feel free to <a href="mailto:lacapxyniljhed@gmail.com?subject=Subject&body=Body%20message">email me here!</a>
                    </p>
                    <p>
                        Best Regards, <br>
                        The Developers
                    </p>
                        ';
        $mail->AltBody = 'tame impala';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
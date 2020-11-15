<?php
    namespace PHPMailer;
    use PHPMailer\PHPMailer\PHPMailer;
    require_once("./PHPMailer/PHPMailer.php");
    require_once("./PHPMailer/SMTP.php");
    require_once("./PHPMailer/Exception.php");
    use Models\User as User;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;
    use Models\Projection as Projection;

    class PHPMailerMP
    {
        public function SendEmail($user, $lastPurchase, $arrayTickets, $projection)
        {
            $mail = new PHPMailer(true);

            $bodyMail = "<b>Thank you for your purchase at MoviePass, ".$user->getFirstName() ."!
            <br>
            <p>Info:</p>
            <ul>
            <li>Movie: ".$projection->getMovie()->getTitle(). " </li>
            <li>Cinema: ".$projection->getAuditorium()->getCinema()->getName()." </li>
            <li>Address: ".$projection->getAuditorium()->getCinema()->getAdress()." </li>
            <li>Auditorium: ".$projection->getAuditorium()->getNameAuditorium()." </li>
            <li> Date and Time: ".$projection->getDate() ." at ".$projection->getStartTime() ." </li>
            <li>Total Price: $".$lastPurchase->getTotalPrice();" </li> </ul>";

            $mail->isSMTP();                                          
            $mail->SMTPAuth   = true;                                  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->Username   = "moviepassgrupo8@gmail.com";     
            $mail->Password   = "comision3";

            $mail->setFrom("moviepassgrupo8@gmail.com", "MoviePass Grupo8");
            $mail->addAddress($user->getEmail()); 

            $mail->isHTML(true);                                 
            $mail->Subject = 'Purchase';
            $mail->Body = $bodyMail;

            $mail->send();
        }
    }
    
?>
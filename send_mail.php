<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Function sendmail($subject,$message,$toAddress){
  require_once "PHPMailer/src/PHPMailer.php";
  require_once "PHPMailer/src/SMTP.php";
  require_once "PHPMailer/src/Exception.php";

  $mail = new PHPMailer(true);

  //Enable SMTP debugging.
  $mail->SMTPDebug = 0;

  //Set PHPMailer to use SMTP.
  $mail->isSMTP();

  //Set SMTP host name
  $mail->Host = "mail.sntradehub.com";

  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = true;

  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );

  //Provide username and password
  $mail->Username = "test@sntradehub.com";
  $mail->Password = "#_TxN%Dr.LZr";

  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "ssl";

  //Set TCP port to connect to
  $mail->Port = 465;

  $mail->From = "test@sntradehub.com";
  $mail->FromName = "SN TradeHub";

  $mail->addAddress($toAddress);

  $mail->isHTML(true);

  $mail->Subject = "$subject";

  $mail->Body = '
    <table style="width:100%;font-family:verdana;font-size: 10px;">
    <thead>
        <tr>
            <th>
                HTU-JMTC
            </th>
        </tr>
        <tr>
            <th style="font-weight:bold;text-align:center;font-size:1.2rem;color:#064B66">
                '.$subject.'
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="font-size:1em;padding:1em;text-align:center;">
                '.$message.'
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr style="padding:0 1rem;">
            <td style="font-size: 1em;padding:0 1em;">
                <span style="float:left;">
                    email: '.$rowSytem['ShortName'].'
                </span>
                <span style="float:right;">
                website: <a href="#" style="color:goldenrod;"></i> www.htujmtc.com</a>
                </span>
            </td>
        </tr>
        <tr>
            <td style="height: 0.1rem;"></td>
        </tr>
        <tr>
            <td style="background: #064B66;height: 1rem;"> </td>
        </tr>
    </tfoot>
    </table>
  ';

    try {
        $mail->send();
        $_SESSION['type'] = 'success';
        $_SESSION['message'] = 'Message sent successfullly';

    } catch (Exception $e) {
        $_SESSION['type'] = 'warning';
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }
}
?>
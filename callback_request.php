<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $fullname = htmlspecialchars( trim( $_POST[ 'fullName' ] ) );
    $mobile = htmlspecialchars( trim( $_POST[ 'mobileNumber' ] ) );

    $msg = '<html><body>';
    $msg .= '<h2>New Callback Request:</h2>';
    $msg .= "<p><strong>Full Name:</strong> $fullname</p>";
    $msg .= "<p><strong>Mobile:</strong> $mobile</p>";
    $msg .= '</body></html>';

    $mail = new PHPMailer( true );

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'apexitsolutionpvtltd@gmail.com';
        $mail->Password = 'souv ngst qqjz zndy';
        // Ensure this is a Google App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        // Use SSL
        $mail->Port = 465;
        // Secure port

        // Debugging ( Enable this to see SMTP errors )
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        // Email Headers
        $mail->setFrom( 'apexitsolutionpvtltd@gmail.com', 'Apex IT Solution' );
        $mail->addReplyTo( 'apexitsolutionpvtltd@gmail.com', 'Support' );
        $mail->addAddress( 'inquiry@apexitsolution.in', 'Callback Team' );

        // Email Content
        $mail->isHTML( true );
        $mail->Subject = 'New Callback Request Received';
        $mail->Body = $msg;
        $mail->AltBody = strip_tags( $msg );

        if ( $mail->send() ) {
            header( 'Location: callback_request.html?message=success' );
            exit();
        } else {
            die( 'Mailer Error: ' . $mail->ErrorInfo );
        }
    } catch ( Exception $e ) {
        die( 'Mailer Exception: ' . $mail->ErrorInfo );
    }
}
?>
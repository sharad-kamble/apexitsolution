<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    ob_start();
    // Start output buffering to prevent header errors

    $firstName = htmlspecialchars( trim( $_POST[ 'fname' ] ) );
    $lastName = htmlspecialchars( trim( $_POST[ 'lname' ] ) );
    $email = filter_var( $_POST[ 'email' ], FILTER_SANITIZE_EMAIL );
    $comment = htmlspecialchars( trim( $_POST[ 'comment' ] ) );

    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        exit( 'Invalid email address.' );
    }

    $msg = '<html><body>';
    $msg .= '<h2>New Inquiry:</h2>';
    $msg .= "<p><strong>First Name:</strong> $firstName</p>";
    $msg .= "<p><strong>Last Name:</strong> $lastName</p>";
    $msg .= "<p><strong>Email:</strong> $email</p>";
    $msg .= "<p><strong>Message:</strong> $comment</p>";
    $msg .= '</body></html>';

    $mail = new PHPMailer( true );

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'apexitsolutionpvtltd@gmail.com';

        $mail->Password = 'souv ngst qqjz zndy';
        // Use an app password, never hardcode in production!
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Headers
        $mail->setFrom( 'apexitsolutionpvtltd@gmail.com', 'Apex IT Solution' );
        $mail->addReplyTo( $email, "$firstName $lastName" );
        $mail->addAddress( 'inquiry@apexitsolution.in', 'Contact Inquiry Team' );

        // Email Content
        $mail->isHTML( true );
        $mail->Subject = 'New Contact Inquiry Received';
        $mail->Body = $msg;
        $mail->AltBody = strip_tags( $msg );

        if ( $mail->send() ) {
            ob_end_clean();
            // Clear output buffer
            header( 'Location: contact_inquiry.html?message=success' );
            exit();
        } else {
            ob_end_clean();
            header( 'Location: contact.html?message=error' );
            exit();
        }
    } catch ( Exception $e ) {
        ob_end_clean();
        header( 'Location: contact.html?message=error&reason=' . urlencode( $mail->ErrorInfo ) );
        exit();
    }
}
?>
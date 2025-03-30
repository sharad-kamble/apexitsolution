<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $fullname = htmlspecialchars( trim( $_POST[ 'fullName' ] ) );
    $mobile = htmlspecialchars( trim( $_POST[ 'mobileNumber' ] ) );
    $email = filter_var( $_POST[ 'emailId' ], FILTER_SANITIZE_EMAIL );
    $course = htmlspecialchars( trim( $_POST[ 'course' ] ) );
    $mode = htmlspecialchars( trim( $_POST[ 'mode' ] ) );

    if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        exit( 'Invalid email address.' );
    }

    $msg = '<html><body>';
    $msg .= '<h2>New Course Inquiry:</h2>';
    $msg .= "<p><strong>Full Name:</strong> $fullname</p>";
    $msg .= "<p><strong>Mobile:</strong> $mobile</p>";
    $msg .= "<p><strong>Email:</strong> $email</p>";
    $msg .= "<p><strong>Course Interested In:</strong> $course</p>";
    $msg .= "<p><strong>Mode:</strong> $mode</p>";
    $msg .= '</body></html>';

    $mail = new PHPMailer( true );

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'apexitsolutionpvtltd@gmail.com';
        $mail->Password = 'souv ngst qqjz zndy';
        // Use App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Headers
        $mail->setFrom( 'apexitsolutionpvtltd@gmail.com', 'Apex IT Solution' );
        $mail->addReplyTo( $email, $fullname );
        $mail->addAddress( 'inquiry@apexitsolution.in', 'Course Inquiry Team' );

        // Email Content
        $mail->isHTML( true );
        $mail->Subject = '"New Seat Booking Application Received"';
        $mail->Body = $msg;
        $mail->AltBody = strip_tags( $msg );

        if ( $mail->send() ) {
            // Redirect to book-seat.html with success message
            header( 'Location: book-seat.html?message=success' );
            exit();
        } else {
            header( 'Location: book-seat.html?message=error' );
            exit();
        }
    } catch ( Exception $e ) {
        header( 'Location: book-seat.html?message=error' );
        exit();
    }
}
?>
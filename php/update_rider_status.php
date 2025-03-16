<?php

include_once "dbConnection.php";
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = [
    'success' => false,
    'message' => 'An error occurred.'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $riderId = isset($_POST['rider_id']) ? $_POST['rider_id'] : null;
    $status = isset($_POST['status']) ? $_POST['status'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if (!$riderId || !$status || ($status === 'Approved' && !$password)) {
        $response['message'] = 'Invalid input data.';
        echo json_encode($response);
        exit;
    }

    $hashedPassword = $password ? password_hash($password, PASSWORD_BCRYPT) : null;

    $query = "UPDATE rider SET status = ?, password = ? WHERE rider_id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssi", $status, $hashedPassword, $riderId);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {

                $emailQuery = "SELECT email_address FROM rider WHERE rider_id = ?";
                $emailStmt = $conn->prepare($emailQuery);
                $emailStmt->bind_param("i", $riderId);
                $emailStmt->execute();
                $result = $emailStmt->get_result();
                $rider = $result->fetch_assoc();

                if ($rider && isset($rider['email_address'])) {
                    $email = $rider['email_address'];

                    if (sendPasswordEmail($email, $password)) {
                        $response['success'] = true;
                        $response['message'] = "Rider's status and password updated successfully. An email has been sent to the rider.";
                    } else {
                        $response['message'] = "Rider's status updated, but the email could not be sent.";
                    }
                } else {
                    $response['message'] = "Rider's status updated, but no email found for the rider.";
                }

                $emailStmt->close();
            } else {
                $response['message'] = "No changes made. Verify that the rider ID exists.";
            }
        } else {
            $response['message'] = 'Failed to execute the query: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['message'] = 'Failed to prepare the SQL statement: ' . $conn->error;
    }
} else {
    $response['message'] = 'Invalid request method.';
}

$conn->close();
echo json_encode($response);

/**
 * 
 *
 * @param string 
 * @param string
 * @return boolTrue 
 */
function sendPasswordEmail($email, $password)
{
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vaije2024@gmail.com';
        $mail->Password = 'xrkb fbvf zluz avqz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('no-reply@viaje.com', 'Viaje Support');
        $mail->addAddress($email);


        $mail->isHTML(true);
        $mail->Subject = 'Your Viaje Account Password';


        $mail->Body = "
            <html>
            <head>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }
                    body {
                        font-family: Arial, sans-serif;
                    }
                    .email-container {
                        max-width: 600px;
                        margin: 1rem;
                        padding: 1rem;
                        background-color: #ffffff;
                        border-radius: 2rem;
                        border: 2px solid #007300;
                        border-bottom: 8px solid #007300;
                        border-left: 8px solid #007300;
                    }
                    .email-header {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        background-color: #007300;
                        border-radius: 1rem;
                        padding: 1rem;
                        text-align: center;
                    }
                    .email-header p{
                        text-align: center;
                        color: #ffffff;
                        font-size: 1.5rem;
                        font-weight: 900;
                    }
                    .email-body {
                        padding: 1rem;
                        text-align: center;
                    }
                    .email-body p {
                        margin: 0.5rem;
                        font-size: 1.05rem;
                        color: #333333;
                    }
                    .email-body h3 {
                        font-size: 1.3rem;
                        font-weight: bolder;
                        color: #007300;
                        margin: 1rem;
                    }
                    .email-footer {
                        text-align: center;
                        margin-top: 20px;
                        font-size: 12px;
                        color: #666666;
                    }
                </style>
            </head>
            <body>
                <div class='email-container'>
                    <div class='email-header'>
                        <p>Welcome to Viaje!</p>
                    </div>
                    <div class='email-body'>
                        <p>Dear Rider,</p>
                        <p>Your account has been approved, and here is your login password:</p>
                        <h3 class='password'>$password</h3>
                        <p>
                            We recommend changing your password after your first login for
                            security purposes.
                        </p>
                        <p>Thank you for joining us!</p>
                        <div class='email-footer'>&copy; 2024 Viaje. All rights reserved.</div>
                    </div>
                </div>
            </body>
            </html>
        ";


        $mail->AltBody = "Welcome to Viaje!\n\nYour account has been approved, and here is your login password: $password\n\nWe recommend changing your password after your first login. Thank you for joining us!";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}

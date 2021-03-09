<?php 

if(isset($_POST['reset-request-submit'])) {

    $selector = bin2hex(random_bytes(8));
    
    //to authenticate the user
    $token = random_bytes(32);

    //the url of the web we will 
    $url = "www.allied.com/create-new-password.php?selector=". $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;
    
    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {

        echo 'There was an error';
        exit();
    
    } else {

        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);

    }

    //insert the token to the database
    $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {

        echo 'There was an error';
        exit();
    
    } else {

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);

    }

    mysqli_stmt_close($stmt);
    mysqli_close();

    //to send the email

    $to = $userEmail;
    
    $subject = "Reset your password from banks";
    
    $message = "<p>We received a password reset request. The link to reset your password if you did not make this request, Please ignore this mail";

    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="'.$url.'">'.$url.'</a></p>';

    $headers = "From: Allied e <info@allie.com>\r\n";
    $headers .= "Reply-To: info@allied.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");

} else {

    header('location: ../index.php');
}
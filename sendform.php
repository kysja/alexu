<?php
session_start();

// check if error messages are in the session
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// check if flash message are in the session
if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}


// check if the form has been submitted
if (!empty($_POST)) {
    
    // get the form fields
    $name = trim(stripslashes(htmlspecialchars($_POST['name'])));
    $email = trim(stripslashes(htmlspecialchars($_POST['email'])));
    $message = nl2br(trim(stripslashes(htmlspecialchars($_POST['message']))));
    $subject = "Message from alexu.dev";

    // validate the form fields
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email']  = "Invalid email address";
    if (empty($message)) $error['message'] = "Message is required";

    // if there are errors, save the error messages in the session
    if (isset($error)) {
        $_SESSION['error'] = $error;
        header('Location: /#contact');
        exit();
    }

    
    if (!isset($error)) {
    
        // load the config file
        $config = json_decode(file_get_contents('config.json'), true);
        if (!isset($config['SENDGRID_API_KEY'])) {
            echo 'Error';
            exit();
        }

        $body = "Name: $name <br>Email: $email <br><br> Message:<br>$message";


        // send the email using SendGrid
        require("./lib/sendgrid/sendgrid-php.php");
        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("info@pontique.com", "alexu.dev");
        $email->setSubject($subject);
        $email->addTo($config['EMAIL']);
        // $email->addContent("text/plain", "Hello!");
        $email->addContent("text/html", $body);

        $sendgrid = new \SendGrid($config['SENDGRID_API_KEY']);
        $sendgrid->send($email);

        // save success message in the session
        $_SESSION['flash'] = [ 'type' => 'success', 'message' => 'Your message sent successfully!' ];

        header('Location: /');
        exit();        

        // try {
        //     $response = $sendgrid->send($email);
        //     print $response->statusCode() . "\n";
        //     print_r($response->headers());
        //     print $response->body() . "\n";
        // } catch (Exception $e) {
        //     echo 'Caught exception: '. $e->getMessage() ."\n";
        // }

    }


}
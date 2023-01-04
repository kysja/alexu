<?php

if (!empty($_POST)) {
    
    function check_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $name = trim(stripslashes(htmlspecialchars($_POST['name'])));
    $email = trim(stripslashes(htmlspecialchars($_POST['email'])));
    $message = nl2br(trim(stripslashes(htmlspecialchars($_POST['message']))));
    $subject = "Message from alexu.dev";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $error['email']  = "Invalid email format";
    if (empty($message)) $error['message'] = "Message is required";

    if (!isset($error)) {
    
        $config = json_decode(file_get_contents('config.json'), true);
        if (!isset($config['SENDGRID_API_KEY'])) {
            echo 'Error';
            exit();
        }

        $body = "Name: $name <br> Email: $email <br> Message: $message";


        require("./lib/sendgrid/sendgrid-php.php");

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("info@pontique.com", "alexu.dev");
        $email->setSubject($subject);
        $email->addTo($config['EMAIL']);
        // $email->addContent("text/plain", "Hello!");
        $email->addContent("text/html", $body);

        $sendgrid = new \SendGrid($config['SENDGRID_API_KEY']);
        $sendgrid->send($email);

        header('Location: index.php');
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
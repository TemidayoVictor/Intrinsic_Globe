<?php
    session_start();
    include 'includes/connect.php';

    $_SESSION['payingFor'] = "freelanceemp";

    $email = $_SESSION['userEmail'];
    $name = $_SESSION['fullname'];
    $amount = 1000;
        
    $endpoint = "https://api.flutterwave.com/v3/payments";

    //required data

    $postdata = array(
        "tx_ref" => uniqid(),
        "currency" => "NGN",
        "amount" => "$amount",
        "customer" => array(
            "name" => "$name",
            "email" => "$email"
        ),

        "customizations" => array(
            "title" => "Payment for Freelancer Employer",
            "description" => "Intrinsic Globe"
        ),

        "meta" => array(
            "reason" => "Payment for Freelancer Employer's Details",
            "address" => "Lagos state"
        ),
        "redirect_url" => "https://intrinsicglobe.com/phpFiles/verify-freelanceemp.php"
    );

    // init cURL handler

    $ch = curl_init();

    //

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    //set endpoint 

    curl_setopt($ch, CURLOPT_URL, $endpoint);

    //turn on the cURL post method

    curl_setopt($ch, CURLOPT_POST, 1);//Change to 1 after deploying

    //encode the post Field

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));

    //return data 

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //set waiting timeout

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
    curl_setopt($ch, CURLOPT_TIMEOUT, 200);

    //SET the Headersfrom endpoint

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer FLWSECK_TEST-aaba981b1171d0ee091cb06d865dfa14-X",
        "Content-Type: Application/json",
        "Cache-Control: no-cache"
    ));

    $request = curl_exec($ch);

    $result = json_decode($request);
    header("location: ".$result->data->link);
    var_dump($result);
    //close cURL session
    curl_close($ch);
    
?>
<?php
session_start();
ob_start();
echo "Here and Now";

if(isset($_GET['transaction_id']) AND isset($_GET['status']) AND isset($_GET['tx_ref'])) {
    $trans_id = htmlspecialchars($_GET['transaction_id']);
    $trans_status = htmlspecialchars($_GET['status']);
    $trans_ref = htmlspecialchars($_GET['tx_ref']);

    //Verify Endpoint
    $url = "https://api.flutterwave.com/v3/transactions/".$trans_id."/verify";

    //initiate cURL session

    $curl = curl_init($url);

    //Turn off ssl checkers
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    // decide the request that you want
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    //set the Api Headers

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer FLWSECK_TEST-aaba981b1171d0ee091cb06d865dfa14-X",
        "Content-Type: Application/json"
    ]);
     //run cURL
     $run = curl_exec($curl);
     
     //check for errors
     $error = curl_error($curl);
    if($error) {
        die("Curl returned some errors: " .$error);
    }
    //echo "<pre>".$run."</pre>"; 

    $result = json_decode($run);

    echo $status = $result->status;
    echo $message = $result->message;
    echo $id = $result->data->id;
    echo $reference = $result->data->tx_ref;
    echo $amount = "1000"; // $result->data->amount;

    echo $charged_amount = $result->data->charged_amount;
    echo $fullname = $result->data->customer->name;
    echo $email = $result->data->customer->email;
    

    if(/*($status != $trans_status) OR*/ ($trans_id != $id)) {
        header("location: ../freemp-all-freelancers-view.php");
        ob_end_flush();
        //exit;
        echo "Yes";
        echo $status. " ";
        echo $trans_status. " ";
        echo $trans_id. " ";
        echo $id. " ";
    }

    else {
        header("location: pay.php");
        ob_end_flush();
        //echo "Yes Yes";
    }
    curl_close($curl);
}

else {
        header("location: ../freemp-all-freelancers-view.php");
        ob_end_flush();
    //echo "Yes Yes Yes";
    exit;
}


?>

<?php

$req_url = 'https://v3.exchangerate-api.com/bulk/9316cb86c3b06b2293f02aa3/GHS';
$response_json = file_get_contents($req_url);

if(false !== $response_json) {

    // Try/catch for json_decode operation
    try {

        // Decoding
        $response_object = json_decode($response_json);

        // Checking for errors
        if('success' === $response_object->result) {

            // YOUR APPLICATION CODE HERE, e.g.
            $base_price = 1; // Your price in USD
            $EUR_price = round(( $base_price * $response_object->rates->USD), 2);

            echo $am = ($EUR_price);
        } else {

            // Handling different error conditions
            switch($response_object->error) {
                case 'unknown-code':
                    // Handle error...
                    break;
                case 'invalid-key':
                    // Handle error...
                    break;
                case 'malformed-request':
                    // Handle error...
                    break;
                case 'quota-reached':
                    // Handle error...
                    break;
            }

        }

    }
    catch(Exception $e) {
        // Handle JSON parse error...
    }

}

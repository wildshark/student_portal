<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/03/2019
 * Time: 3:06 PM
 */

if (isset($_SESSION['studentID'])){
    $studentID = $_SESSION['studentID'];
}else{
    $studentID = null;
}

$sql = "SELECT * FROM `get_student_enrollment` where studentID = '$studentID' order by enrollID DESC LIMIT 0, 1";
$result = $conn->query($sql);
$r = $result->fetch_assoc();
$prefix = $r['prefix'];


if ($prefix == 'SPS'){
    $sql = "SELECT * FROM `get_hostel_billing` where types=1";
}else{
    $sql = "SELECT * FROM `get_hostel_billing` where types<>1";
}

$result = $conn->query($sql);
while ($r = $result->fetch_assoc()){
    $room = $r['hostel_type'];
    $details = $r['hostel_details'];
    $bill = $r['amount'];

    $ref =date('YmdHis');

    echo "
        <div class='col-md-4 grid-margin stretch-card'>
            <div class='card'>
                <div class='card-body'>
                    <h4 class='card-title'>{$room}-Ref:{$ref}</h4>
                    <div class='media'>
                        <i class='mdi mdi-hotel icon-md text-info d-flex align-self-start mr-3'></i>
                        <div class='media-body'>
                            <p class='card-text'>{$details}</p>
                           <form>
                                <script src='https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js'></script>
                                    <input type='text' name='customer_email' value='{$_COOKIE['st_email']}'>
                                    <input type='text' name='amount' value='{$bill}'>
                                    <input type='text' name='customer_phone' value='{$_COOKIE['st_mobile1']}'>
                                    <input type='text' name='currency' value='GHS'>
                                    <input type='text' name='txref' value='{$ref}'>                                  
                                <button type='button' onClick='payWithRave()'>Pay Now</button>
                           </form>
                                <script>
                                    const API_publicKey = 'FLWPUBK-24b72aebb821aea177483039677df9d3-X';
                                
                                    function payWithRave() {
                                        var x = getpaidSetup({
                                            PBFPubKey: API_publicKey,
                                            customer_email: '{$_COOKIE['st_email']}',
                                            amount: '{$bill}',
                                            customer_phone: '{$_COOKIE['st_mobile1']}',
                                            currency: 'NGN',
                                            payment_method: 'both',
                                            txref: 'rave-123456',
                                            payment_plan: 13,
                                            meta: [{
                                                metaname: 'flightID',
                                                metavalue: 'AP1234'
                                            }],
                                            onclose: function() {},
                                            callback: function(response) {
                                                var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                                                console.log('This is the response returned after a charge', response);
                                                if (
                                                    response.tx.chargeResponseCode == '00' ||
                                                    response.tx.chargeResponseCode == '0'
                                                ) {
                                                    // redirect to a success page
                                                } else {
                                                    // redirect to a failure page.
                                                }
                                
                                                x.close(); // use this to close the modal immediately after payment.
                                            }
                                        });
                                    }
                                </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
}
?>




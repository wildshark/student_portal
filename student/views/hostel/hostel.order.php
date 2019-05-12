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
//check for sps student and change their bill
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

    $ref ="HTL-".date('YmdHis');

    echo "
        <div class='col-md-4 grid-margin stretch-card'>
            <div class='card'>
                <div class='card-body'>
                    <h4 class='card-title'>{$room}-Ref:{$ref}</h4>
                    <div class='media'>
                        <i class='mdi mdi-hotel icon-md text-info d-flex align-self-start mr-3'></i>
                        <div class='media-body'>
                            <p class='card-text'>{$details}</p>
                               <form action='index.php' method='post' enctype='application/x-www-form-urlencoded'>
                                    <input type='text' class='form-control' name='customer_email' value='{$_COOKIE['st_email']}'>
                                    <input type='text' class='form-control' name='customer_phone' value='{$_COOKIE['st_mobile1']}'>
                                    <input type='text' class='form-control' name='customer_phone' value='GHS {$bill}'>
                                    <input type='text' class='form-control' name='txref' value='{$ref}'>
                                    <input type='hidden' class='form-control' name='currency' value='GHS'>
                                    <input type='hidden' class='form-control' name='amount' value='{$bill}'>      
                                    <hr>                            
                                    <button type='submit' name='submit' value='pay-hostel-fee' class='btn btn-danger btn-sm'>Pay GHS {$bill}.</button>
                               </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
}
?>




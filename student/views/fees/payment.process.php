<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 13/03/2019
 * Time: 12:58 AM
 */
if (isset($_SESSION['studentID'])) {
    $id = $_SESSION['studentID'];
    $sql = "SELECT * FROM `get_student_profile_detail` where `studentID` = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows === 0) {

        $date = "";
        $f_name = "";
        $l_name = "";
        $admission = "";
        $mobile = "";
        $mobile2 = "";
        $email = "";
        $categoryID = "";
        $statusID = "";
    } else {
        $r = $result->fetch_assoc();
        $f_name = $r['first_name'];
        $l_name = $r['surname'];
        $admission = $r['admissionNo'];
        $mobile = $r['mobile1'];
        $mobile2 = $r['mobile2'];
        $email = $r['email'];
        $yearID = $r['yearID'];
        $progID = $r['progID'];
        $categoryID = $r['categoryID'];
        $statusID = $r['statusID'];
    }
}

$date = $_SESSION['st-date'];
$receipt = $_SESSION['st-receipt'];
$studentID = $_SESSION['st-id'];
$name = $_SESSION['st-name'];
$surname = $_SESSION['st-surname'];
$admission = $_SESSION['st-admission'];
$academYr = $_SESSION['st-acadYr'];
$semester = $_SESSION['st-semester'];
$programme = $_SESSION['st-programme'];
$level = $_SESSION['st-level'];
$amount = $_SESSION['st-amount'];
$bill_amount=$_SESSION['st-bill'];
$currency =$_SESSION['st-currency'];
$bal = $bill_amount-$amount;

?>

<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">New Enrollment</h4>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-sample" enctype="multipart/form-data">
                <--/script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"/-->
                <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" readonly class="form-control" value="<?php echo date("Y-m-d")?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Receipt No</label>
                            <div class="col-sm-9">
                                <input type="text" name="receipt" id="ref" readonly value="<?php echo $receipt;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Index Number</label>
                            <div class="col-sm-9">
                                <input type="text" name="index" readonly id="index_number" value="<?php echo $admission;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="firstname" readonly class="form-control" value="<?php echo $f_name;?>" placeholder="dd/mm/yyyy" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Surname</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" id="lastname" readonly value="<?php echo $l_name;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Academy Year</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" readonly id="academy" value="<?php echo $academYr;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" id="semester" readonly value="<?php echo DASHBOARD::semester($semester);?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Programme</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" id="programme" readonly value="<?php echo DASHBOARD::programme($conn,$programme);?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" id="level" readonly value="<?php echo $level;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bill</label>
                            <div class="col-sm-9">
                                <input type="text" name="surname" id="bill" readonly value="<?php echo $bill_amount;?>" class="form-control" placeholder="Student Name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" id="amount" readonly class="form-control" value="<?php echo $amount;?>" placeholder="0.00" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                                <input type="text" name="amount" readonly class="form-control" value="<?php echo $bal;?>" placeholder="0.00" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <input type="hidden" name="currency" id="currency" readonly class="form-control" value="<?php echo $currency;?>"/>
                    <input type="hidden" name="email" id="email" readonly class="form-control" value="<?php echo $email;?>"/>
                    <input type="hidden" name="mobile" id="mobile" readonly class="form-control" value="<?php echo $mobile;?>"/>
                    <button type="button" name="submit" onClick="payWithRave()" class="btn btn-success mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const API_publicKey = "FLWPUBK-5e9fc24ef3018f495c27e22e602384c8-X";

    function payWithRave() {

        var user_ref =  document.getElementById('ref').value;
        var user_index =  document.getElementById('index_number').value;
        var user_firstname = document.getElementById('firstname').value;
        var user_lastname = document.getElementById('lastname').value;
        var user_academy = document.getElementById('academy').value;
        var user_semester = document.getElementById('semester').value;
        var user_programme = document.getElementById('programme').value;
        var user_level = document.getElementById('level').value;
        var user_email = document.getElementById('email').value;
        var user_amount = document.getElementById('amount').value;
        var user_currency = document.getElementById('currency').value;
        var user_mobile = document.getElementById('mobile').value;


        var x = getpaidSetup({
            PBFPubKey: API_publicKey,
            custom_description: user_index +"sem "+ user_semester +" aca " + user_academy +" progID "+ user_programme+" lev "+ user_level,
            customer_firstname: user_firstname,
            customer_lastname: user_lastname,
            customer_phone: user_mobile,
            customer_email: user_email,
            amount: user_amount,
            currency: user_currency,
            custom_logo:"https://www.ghanacu.com/wp-content/uploads/2018/06/logo.png",
            custom_title:"GhanaCUC Pay Portal",
            txref: user_ref,
            subaccounts: [
                {
                    id: "RS_0BA4212A177547B92A3EFD7866AD309A" // This assumes you have setup your commission on the dashboard.
                }
            ],
            meta: [{
                metaname: "flightID",
                metavalue: "AP1234"
            }],
            onclose: function() {},
            callback: function(response) {
                var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                console.log("This is the response returned after a charge", response);
                if (
                    response.tx.chargeResponseCode == "00" ||
                    response.tx.chargeResponseCode == "0"
                ) {
                    // redirect to a success page
                    window.location.assign("http://localhost/student_portal/index.php?submit=payment.portal&status=payment.verification&e=125&txref=" + user_ref);
                } else {
                    // redirect to a failure page.
                    window.location.assign("http://localhost/student_portal/index.php?_route=student&p=payment.failed&e=124&txref=" +user_ref );
                }

                x.close(); // use this to close the modal immediately after payment.
            }
        });
    }
</script>
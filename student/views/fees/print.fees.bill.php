<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 19/03/2019
 * Time: 8:23 PM
 */

    if(!isset($_POST['academic-year'])){
        $academic = null;
    }else{
        $academic =$_POST['academic-year'];
    }

    if (!isset($_POST['programme'])){
        $programmeID = null;
    }else{
        $programmeID = $_POST['programme'];
    }

    if (!isset($_POST['semester'])){
        $semesterID = null;
    }else{
        $semesterID = $_POST['semester'];
    }

    if(!isset($_SESSION['studentID'])){
        $studentID = null;
    }else{
        $studentID = $_SESSION['studentID'];
    }

    $profileSQL = "SELECT * FROM `get_student_profile_detail` LIMIT 0, 1";
    $result = mysqli_query($conn,$profileSQL);
    if ($result->num_rows > 0){
        $r=$result->fetch_assoc();
        $name = $r['first_name'] ." ". $r['surname'];
        $index = $r['admissionNo'];
        $programme = $r['programme'];
        $school = $r['school'];


        $date = date("d-m-Y");
        $ref = date("yHmids");

    }

    function  school_fees_bill_details($conn,$academic,$programmeID,$semesterID){

        $categoryID = $_SESSION['studentCatID'];

        $sql="SELECT * FROM `get_programme` where `progID`='$programmeID' LIMIT 0, 1";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0){
            $r=$result->fetch_assoc();
            $schoolID = $r['schoolID'];
        }else{
            $schoolID =null;
        }

        $billSQL= "SELECT * FROM `get_fees_bill` where `semesterID`='$semesterID' and `school_ID`='$schoolID' and `catID`='$categoryID ' LIMIT 0, 1";
        $result = $conn->query($billSQL);
        if ($result->num_rows == 0) {
            echo "
                 <tr>
                    <td class='no'>Null</td>
                    <td class='text-left'>Null</td>
                    <td class='unit'>Null</td>
                    <td class='qty'>Null</td>
                    <td class='total'>Null</td>
                 </tr>";
        }else{
            while ($r=$result->fetch_assoc()){

                $tf = $r['tf'];
                $fuf =  $r['fuf'];
                $src = $r['src'];
                $fdf = $r['fdf'];
                $af = $r['af'];
                $rv = $r['rv'];
                $mat = $r['matr'];
                $med = $r['medi'];
                $shb = $r['shb'];
                $other = $r['other'];
                $semester = $r['semesterID'];
                $amount = $r['amount'];

                if(!isset($n)){
                    $n ="1";
                }else{
                    $n = $n + 1;
                }
                echo "
                    <tr>
                        <td class='no'>1</td>
                        <td class='text-left'>Tuition Fees</td>
                        <td class='unit'>{$tf}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$tf}</td>
                    </tr>
                    <tr>
                        <td class='no'>2</td>
                        <td class='text-left'>Facility User Fees</td>
                        <td class='unit'>{$fuf}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$fuf}</td>
                    </tr>
                    <tr>
                        <td class='no'>3</td>
                        <td class='text-left'>SRC - Fees</td>
                        <td class='unit'>{$src}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$tf}</td>
                    </tr>
                    <tr>
                        <td class='no'>4</td>
                        <td class='text-left'>Facility Due Fees</td>
                        <td class='unit'>{$fdf}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$fdf}</td>
                    </tr>
                    <tr>
                        <td class='no'>5</td>
                        <td class='text-left'>Acceptance Fees</td>
                        <td class='unit'>{$af}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$af}</td>
                    </tr>
                    <tr>
                        <td class='no'>6</td>
                        <td class='text-left'>Result Verification</td>
                        <td class='unit'>{$rv}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$rv}</td>
                    </tr>
                    <tr>
                        <td class='no'>7</td>
                        <td class='text-left'>Matriculation</td>
                        <td class='unit'>{$mat}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$mat}</td>
                    </tr>
                    <tr>
                        <td class='no'>8</td>
                        <td class='text-left'>Medical Examination</td>
                        <td class='unit'>{$med}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$med}</td>
                    </tr>
                    <tr>
                        <td class='no'>9</td>
                        <td class='text-left'>Student Handbook</td>
                        <td class='unit'>{$rv}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$rv}</td>
                    </tr>
                    <tr>
                        <td class='no'>10</td>
                        <td class='text-left'>Other Fees</td>
                        <td class='unit'>{$other}</td>
                        <td class='qty'>1</td>
                        <td class='total'>{$other}</td>
                    </tr>
                ";
            }
        }

    }

    function print_fees_total($conn,$studentID,$academic,$programmeID,$semesterID){

        $categoryID = $_SESSION['studentCatID'];
        $paid = '0.00';

        $sql="SELECT * FROM `get_programme` where `progID`='$programmeID' LIMIT 0, 1";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0){
            $r=$result->fetch_assoc();
            $schoolID = $r['schoolID'];
        }else{
            $schoolID =null;
        }

        $billSQL = "SELECT * FROM `get_fees_bill` where `semesterID`='$semesterID' and `school_ID`='$schoolID' and `catID`='$categoryID ' LIMIT 0, 1";
        $result = $conn->query($billSQL);
        if ($result->num_rows == 0) {
            $bill = '0.00';
        }else{
            while ($r=$result->fetch_assoc()){
               $bill = $r['amount'];
            }
        }

        $balSQL = "SELECT `Balance` FROM `get_fees_payment_total` where studentID='$studentID' LIMIT 0, 1";
        $result = $conn->query($balSQL);
        if ($result->num_rows == 0) {
            $balance = '0.00';
            $previousBAL ="0.00";
        }else{
            while ($r=$result->fetch_assoc()) {
                $balance = $r['Balance'];
                $previousBAL = $r['Balance'];
            }
        }
            $grand = $bill + $balance;

        $previousBAL = number_format($previousBAL,2);
        $paid = number_format($paid,2);
        //$balance = number_format($balance,2);
        $grandTOTAL = number_format($grand,2);

        echo"
            <tr>
                <td colspan='2'></td>
                <td colspan='2'>SUBTOTAL</td>
                <td>{$bill}</td>
            </tr>
            
            <tr>
                <td colspan='2'></td>
                <td colspan='2'>PREVIOUS BAL</td>
                <td>{$previousBAL}</td>
            </tr>
            
            <tr>
                <td colspan='2'></td>
                <td colspan='2'>PAID</td>
                <td>{$paid}</td>
            </tr>
            
            <tr>
                <td colspan='2'></td>
                <td colspan='2'>GRAND TOTAL</td>
                <td>{$grandTOTAL}</td>
            </tr>
        ";
    }

?>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <style>
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->

    <!--Author      : @arboshiki-->
</head>
<body>
<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto" id="printJS-form" >
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="#">
                            <img src="https://www.ghanacu.com/wp-content/uploads/2018/06/logo.png" data-holder-rendered="true" />
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                                Ghana Christian University College
                            </a>
                        </h2>
                        <div>PO.Box AF 919 Adenta</div>
                        <div>Armahia, Near Adenta, Accra - Dodowa Road</div>
                        <div>+233243523456 +233276984145</div>
                        <div>admissions@ghanacu.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">FEES BILL TO:</div>
                        <h2 class="to"><?php echo $name;?></h2>
                        <div class="address">Index: <?php echo $index;?></div>
                        <div class="address">Programme: <?php echo $programme;?></div>
                        <div class="address">School: <?php echo $school;?></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"><?php echo $ref;?></h1>
                        <div class="date">Date : <?php echo $date;?></div>
                        <div class="date">Stamp: <?php echo md5($studentID)?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-left">DESCRIPTION</th>
                        <th class="text-right">PRICE</th>
                        <th class="text-right">UNIT</th>
                        <th class="text-right">TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  school_fees_bill_details($conn,$academic,$programmeID,$semesterID);?>
                    </tbody>
                    <tfoot>
                    <?php print_fees_total($conn,$studentID,$academic,$programmeID,$semesterID);?>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
<script type="text/javascript">
    $('#printInvoice').click(function(){
        Popup($('.invoice')[0].outerHTML);
        function Popup(data){

            window.print();
            return true;
        }
    });
</script>


</html>

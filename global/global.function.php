<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 15/10/2018
 * Time: 8:57 AM
 */

function logout(){
    session_unset();
    session_destroy();

    unset($_COOKIE['token']);

    setcookie('token', '', time() - (86400 * 30), '/');

    include "global.label.php";
    include "template/login.php";
}

function student_index(){
    if (isset($_SESSION['student_name'])){
        $name = ucwords($_SESSION['student_name']);
    }else{
        $name ="No Name";
    }

    return $name;
}

function student_stream($streamID){

    if ($streamID == 1){
        $stream = "Regular";
    } elseif ($streamID == 2){
        $stream = "weekend";
    }else{
        $stream = "unknown";
    }
    return $stream;
}

function marital_status($maritalID){

    if($maritalID == 1){
        $marital ="Single";
    }elseif ($maritalID == 2){
        $marital ="Married";
    }elseif ($maritalID == 3){
        $marital ="Divorce";
    }elseif ($maritalID == 4){
        $marital ="Windowed";
    }else{
        $marital = "unknown";
    }
    return $marital;
}

function student_application_mode($entryID){

    if($entryID == 1){
        $entry="Direct Entry";
    }elseif ($entryID == 2){
        $entry="Mature Entry";
    }else{
        $entry="unknown";
    }
    return $entry;
}

function gender($genderID){

    if ($genderID == 1){
        $gender = "Male";
    }elseif($genderID == 2){
        $gender = "Female";
    }else{
        $gender = "unknown";
    }
    return $gender;
}

function student_category_type($categoryID){

    if($categoryID == 1){
        $category = "Am a local Student";
    }elseif ($categoryID == 2){
        $category = "Am a Foreign Student";
    }else{
        $category = "unknown";
    }
    return $category;

}

function student_hostel_status($hostelID){

    if($hostelID == 1){
        $hostel = "I live on campus";
    }elseif($hostelID == 2){
        $hostel = "I live off campus";
    }else{
        $hostel = "unknown";
    }
    return $hostel;
}

function generate_academic_session(){

    $date = date("Y");
    $prev_date =  $date - 1;

    return $prev_date."/".$date;
}

function cmb_new_student_serial_index($conn){

    $sql='SELECT * FROM `get_new_student`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['admissionID']}'>{$r['serial_no']}->{$r['f_name']} {$r['l_name']}</option>";
    }
}

function cmb_student_entry_list($conn){

    $sql='SELECT * FROM `get_day_list`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['dayID']}'>{$r['day_type']}</option>";
    }
}

function cmb_day_list($conn){

    $sql='SELECT * FROM `get_day_list`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['dayID']}'>{$r['day_type']}</option>";
    }
}


function cmb_gender_status($conn){

    $sql='SELECT * FROM `get_gender`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['genderID']}'>{$r['gender_type']}</option>";
    }
}

function cmb_marital_status($conn){

    $sql='SELECT * FROM `get_category_list` WHERE classificationID = 3';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['categoryID']}'>{$r['category_name']}</option>";
    }

}

function cmb_staff_category($conn){

    $sql="SELECT * FROM category_list WHERE classificationID = 2";
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['categoryID']}'>{$r['category_name']}</option>";
    }
}

function cmb_working_status($conn){

    $sql="SELECT * FROM category_list WHERE classificationID = 5";
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['categoryID']}'>{$r['category_name']}</option>";
    }
}

function cmb_staff_status($conn){
    //Terminated

    $sql="SELECT * FROM category_list WHERE classificationID = 4";
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['categoryID']}'>{$r['category_name']}</option>";
    }
}
function Staff_access($conn){

    $access = $_GET['ui'];
    $user = "SELECT * from get_staff_profile_summary WHERE access='$access'";
    $result = $conn->query($user);
    $u = $result->fetch_assoc();

    return $u['staff_profile_ID'];
}
function cmb_access_id($conn){

    $user = "SELECT * from get_position";
    $result = $conn->query($user);
    while ($u = $result->fetch_assoc()){

        $positionID = $u['positionID'];
        $positionID =md5($positionID);
        echo "<option value='{$positionID}'>{$u['position']}</option>";
    }

}

function cmb_school_data($conn){

    $sql='SELECT * FROM `get_school`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['schoolID']}'>{$r['school']}</option>";
    }
}

function cmb_administration_data($conn){

    $sql='SELECT * FROM `get_school` WHERE catID = 2';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['schoolID']}'>{$r['school']}</option>";
    }
}

function cmb_programme_data($conn){

    $sql='SELECT * FROM `get_programme`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['progID']}'>{$r['programme']}</option>";
    }
}

function cmd_course_list($conn){

    $sql='SELECT * FROM `get_course`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['courseID']}'>{$r['course']}/{$r['prefix']}/{$r['programme']}</option>";
    }
}

function cmb_course($conn){

    $sql='SELECT * FROM `get_course`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['courseID']}'>{$r['course_code']} - {$r['course']}</option>";
    }
}

function cmb_academic_session($conn){
    //get_academic_session
    $sql='SELECT * FROM `get_academic_session`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['academic_yr']}'>{$r['academic_yr']}</option>";
    }
}

function cmb_year($conn){
    //get_academic_session
    $sql='SELECT * FROM `get_academic_session`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['year']}'>{$r['year']}</option>";
    }
}

function student_category($conn){

    $sql='SELECT * FROM `get_student_index_list`';
    $result=$conn->query($sql);
    while ($r=$result->fetch_assoc()){

    }
}

function cmb_nationality($conn){

    $sql="SELECT * from get_countries";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['countryID']}'>{$r['nationality']}</option>";
    }
}

function position($conn){

    $sql="SELECT * from get_position";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['positionID']}'>{$r['position']}</option>";
    }
}

function department($conn){

    $sql="SELECT * from get_department";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['departID']}'>{$r['department']}</option>";
    }
}

function department_unit($conn){

    $sql="SELECT * from get_category_list where classificationID = 6";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['categoryID']}'>{$r['category_name']}</option>";
    }
}


function stock_list($conn){
    //get_stock_list

    $sql="SELECT * from get_stock_list";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['stockID']}'>{$r['stock']}->{$r['category_name']}</option>";
    }

}

function cmb_stock_issused_list($conn){
    //get_stock_list

    $sql="SELECT * from get_total_issused";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['stockID']}'>{$r['stock']}->{$r['category_name']}</option>";
    }

}


function cmb_stock_category($conn){

    $sql="SELECT * from get_stock_category";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['categoryID']}'>{$r['category_name']}</option>";
    }
}

function cmb_supplier_name_list($conn){

    $sql="SELECT * FROM get_supplier_contact";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['supplyID']}'>{$r['supplier_name']}</option>";
    }
}

function student_index_list($conn){
    //get_stock_list

    $sql="SELECT * from get_student_index_list";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        if (empty($r['admissionNo'])){
            $admission = "No Index Number";
        }else{
            $admission = $r['admissionNo'];
        }
        echo"<option value='{$r['studentID']}'>{$admission} - {$r['first_name']} {$r['surname']}</option>";
    }

}

function hostel_block_list($conn){
    //get_stock_list

    $sql="SELECT * from get_hostel_block";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['blockID']}'>{$r['block_name']}</option>";
    }

}

function get_list_semester($conn){
    //get_list_semester

    $sql="SELECT * from get_list_semester";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['semesterID']}'>{$r['semester']}</option>";
    }
}

function get_staff_lecturer($conn){

    $sql="SELECT * from get_staff_lecture";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['staff_profile_ID']}'>{$r['f_name']} {$r['l_name']}</option>";
    }
}

function cmb_all_staff_name_list($conn){
    //get_staff_name_list

    $sql="SELECT * from get_staff_name_list";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['staff_profile_ID']}'>{$r['f_name']} {$r['l_name']}</option>";
    }
}

function get_rental_list($conn){

    $sql="SELECT * FROM list_rental";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['rental_typeID']}'>{$r['rental_type']}</option>";
    }
}

function cmb_room_list($conn){

    $sql="SELECT * FROM get_hostel_room";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['roomID']}'>{$r['room']}->{$r['block_name']}</option>";
    }
}

function cmb_affliate($conn){
    $sql="SELECT * FROM get_affliate_school";
    $result = $conn->query($sql);
    while($r=$result->fetch_assoc()){
        echo"<option value='{$r['affliateID']}'>{$r['affliate']}</option>";
    }
}

function total_course_registration($conn,$studentID){
    
    $sql ="SELECT Count(course_registration.regID) AS total, course_registration.studentID FROM course_registration where studentID ='$studentID'  GROUP BY course_registration.studentID";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0){
        $r=$result->fetch_assoc();
        $total = $r['total'];
    }else{
        $total = "0";
    }
    
    return $total;
}
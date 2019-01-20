<?php


function get_room_list_for_student($conn){

    $studentID = $_SESSION['student_index_id'];

    $sql="SELECT * FROM `get_hostel_booking_details` where studentID='$studentID' LIMIT 0, 1";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0){
        $r=$result->fetch_assoc();
        echo $block = $r['block'];
    }

    $sql ="SELECT * FROM `get_hostel_room` where  blockID ='$block'LIMIT 0, 100";
    $result = mysqli_query($conn,$sql);
    while ($r=$result->fetch_assoc()){
        echo"<option value='{$r['roomID']}'>{$r['room']}</option>";
    }
}





$sql ="SELECT * FROM `get_hostel_room` where  blockID ='$block'LIMIT 0, 100";
$result = mysqli_query($conn,$sql);
while ($r=$result->fetch_assoc()){
    echo"<option value='{$r['roomID']}'>{$r['room']}</option>";
}







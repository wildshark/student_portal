<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 18/12/2018
 * Time: 7:56 AM
 */

class HOSTEL{

    function add_booking($conn){

        $now = date('Y-m-d');
        $date = $_POST['date'];
        $newDate = date("Y-m-d",strtotime($date));
        $pin = $_POST['pin'];
        $room = $_POST['room'];
        $year = $_POST['year'];

        $sql = "SELECT * FROM `get_hostel_booking` where pin_index='$pin' and yearID='$year' ";
        $booking_result = mysqli_query($conn,$sql);
        if($booking_result == FALSE){
            header("location: index.php?_route=student&p=hostel&e=107");
        }else{

           // $_SESSION['room'] = $room;
           // $_SESSION['year'] = $year;

            $sql = "SELECT * FROM `get_hostel_total_bed` where roomID='$room' and yearID='$year'";
            $result = mysqli_query($conn,$sql);
            if ($result->num_rows == 0){
                // Add new record
                $sql ="UPDATE `hostel_detail` SET 
              `date` = '$now', 
              `roomID` = '$room', 
              `bed_no` = '1', 
              `yearID` = '$year', 
              `book_in` = '$newDate', 
              `status` = '2' WHERE `pin_index` = '$pin'";
                $result = mysqli_query($conn,$sql);
                if ($result == TRUE){
                    header("location: index.php?_route=student&p=hostel&e=104");
                }else{
                    header("location: index.php?_route=student&p=hostel&e=103");
                }
            }else{

                $r = $result->fetch_assoc();
                //add new record + 1 + ..
                if(!isset($r['bal_user']) || $r['bal_user'] == 0){
                    header("location: index.php?_route=student&p=hostel&e=106");
                }else{

                    $bed = $r['total_user'] +1;

                    $sql ="UPDATE `hostel_detail` SET 
                      `date` = '$now', 
                      `roomID` = '$room', 
                      `bed_no` = '$bed', 
                      `yearID` = '$year',
                      `book_in` = '$newDate', 
                      `status` = '2' WHERE `pin_index` = '$pin'";
                    $result = mysqli_query($conn,$sql);
                    if ($result == TRUE){
                        header("location: index.php?_route=student&p=hostel&e=104");
                    }else{
                        header("location: index.php?_route=student&p=hostel&e=103");
                    }
                }

            }
        }

    }

    function get_random_block_name($conn){

        $sql = "SELECT * FROM get_hostel_block where statusID ='1' ORDER BY RAND() LIMIT 1";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0){
            $r = $result->fetch_assoc();

            $block = $r['block_name'];
        }
        return $block;
    }
}